<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
         public function handlePaypalWebhook(Request $request)
        {
        $payload = $request->getContent();
        $secret = env('PAYPAL_WEBHOOK_SECRET');
        $generatedHash = hash_hmac('sha256', $payload, $secret, true);

        Log::info('this is webhook'. $payload );
        $this->processWebhookData($payload);
        if ($generatedHash === $request->header('transmission_signature')) {
            // Process verified webhook data
            // $this->processWebhookData($payload);
        } else {
            Log::error('Invalid webhook signature from PayPal.');
        }
        }
        private function processWebhookData($payload)
        {
            $data = json_decode($payload, true);

            // Check if the 'batch_header' key exists in the $data array
            if (isset($data['resource']['batch_header'])) {
                $batchHeader = $data['resource']['batch_header'];
                $payoutBatchId = $batchHeader['payout_batch_id'];
                $newStatus = $batchHeader['batch_status'];

                // Now you can proceed with your logic using $payoutBatchId and $newStatus
                $payment = Payment::where('payout_batch_id', $payoutBatchId)->first();

                if ($payment) {
                    $payment->status = $newStatus;
                    $payment->save();

                    // Send notification to user based on new status (optional)
                } else {
                    $newPayment = Payment::create([
                        'payout_batch_id' => $payoutBatchId,
                        'status' => $newStatus,
                        // Add other fields as needed
                    ]);
                    Log::info('No payment found for payout batch id: ' . $payoutBatchId);
                }
            } else {
                Log::info('No batch header found in the webhook payload.');
            }
        }


}
