<?php

namespace App\Listeners;

use App\Events\PaymentCreated;
use App\Models\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class ProcessPaymentStatus implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PaymentCreated  $event
     * @return void
     */
    public function handle(PaymentCreated $event)
    {
        // Retrieve the newly created payment instance
        $payment = $event->payment;

        // Retrieve payments with status 'PENDING'
        $pendingPayments = Payment::where('status', 'PENDING')->get();

        foreach ($pendingPayments as $pendingPayment) {
            // Get the payoutBatchId from account_info
            $payoutBatchId = $pendingPayment->payout_batch_id;

            // Retrieve PayPal client ID and client secret from config
            $clientId = config('services.paypal.client_id');
            $clientSecret = config('services.paypal.client_secret');

            // Make the GET request to PayPal API
            $response = Http::withToken($this->getPayPalAccessToken($clientId, $clientSecret))
             ->get("https://api-m.sandbox.paypal.com/v1/payments/payouts/{$payoutBatchId}");

            // Check if the request was successful
            if ($response->successful()) {
                // Extract relevant information from the response
                $responseData = $response->json();
                $batchStatus = $responseData['batch_header']['batch_status'];
                Log::info('listener response : ' . json_encode($responseData));
                // Update the Payment record in the database
                $pendingPayment->status = $batchStatus;
                $pendingPayment->save();
            } else {
                // Log or handle unsuccessful response
                Log::error('listener Failed to retrieve payment status' . $payoutBatchId);
            }
        }

        // Log success message
        Log::info('listener Payment statuses updated successfully .');
    }

    /**
     * Get the access token for PayPal API.
     *
     * @return string|null
     */
    private function getPayPalAccessToken($clientId, $clientSecret)
    {
        // Create a GuzzleHTTP client for getting access token
        $client = new Client([
            'base_uri' => 'https://api-m.sandbox.paypal.com/v1/',
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret)
            ],
            'timeout' => 60,
        ]);
        try {
            // Make the POST request to get access token
            $response = $client->post('oauth2/token', [
                'form_params' => [
                    'grant_type' => 'client_credentials'
                ]
            ]);
            // Decode the JSON response
            $responseData = json_decode($response->getBody()->getContents(), true);

            // Return the access token
            return $responseData['access_token'];
        } catch (RequestException $e) {
            // Handle GuzzleHTTP exceptions
            Log::error('listener Error getting PayPal access token: ' . $e->getMessage());
            return null;
        }
    }

}
