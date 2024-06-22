<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CJService
{
    protected $client;
    protected $apiUrl;
    protected $apiToken; 

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = env('CJ_API_URL', 'https://commissions.api.cj.com/query');
        $this->apiToken = env('CJ_API_TOKEN');
        $this->publisherId = env('CJ_PUBLISHER_ID');
    }

    public function fetchPendingCommissions($sincePostingDate, $beforePostingDate)
    {
        $query = <<<'GRAPHQL'
        {
        publisherCommissions(
            forPublishers: ["{$this->publisherId}"],
            sincePostingDate: "{$sincePostingDate}",
            beforePostingDate: "{$beforePostingDate}"
        ) {
            count
            payloadComplete
            records {
            commissionId
            pubCommissionAmountUsd
            validationStatus
            postingDate
            }
        }
        }
        GRAPHQL;

        $query = sprintf($query, $sincePostingDate, $beforePostingDate);

        try {
            $response = $this->client->post($this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiToken,
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode(['query' => $query])
            ]);

            $responseBody = json_decode($response->getBody(), true);

            return $responseBody['data']['publisherCommissions']['records'];
        } catch (\Exception $e) {
            Log::error('Failed to fetch commissions from CJ API: ' . $e->getMessage());
            return [];
        }
    }
}
