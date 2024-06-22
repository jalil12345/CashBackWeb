<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Company;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Log;

class FetchCjData extends Command
{
    protected $signature = 'fetch:cj-data';
    protected $description = 'Fetch data from CJ Network API and store it in the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $apiUrl = 'https://api.cj.com/v3/advertiser-lookup';
        $apiKey = env('CJ_API_KEY');

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer $apiKey",
                'Accept' => 'application/xml'
            ])->get($apiUrl);

            if ($response->successful()) {
                $xml = simplexml_load_string($response->body());

                // Log the raw XML response for debugging purposes
                Log::info('CJCommand API Response:', ['xml' => $xml->asXML()]);

                foreach ($xml->advertisers->advertiser as $advertiser) {
                    // Extract relevant data from XML
                    $cjCId = (string) $advertiser->{'advertiser-id'};
                    $cjAccountStatus = (string) $advertiser->{'account-status'};
                    $cjRelationshipStatus = (string) $advertiser->{'relationship-status'};
                    $cjCName = (string) $advertiser->{'advertiser-name'};
                    $cjUrl = (string) $advertiser->{'program-url'};
                    $cjRate = isset($advertiser->{'seven-day-epc'}) ? (float) $advertiser->{'seven-day-epc'} : null;
                    $cjFixAmount = isset($advertiser->{'three-month-epc'}) ? (float) $advertiser->{'three-month-epc'} : null;
                    $cjCategory = isset($advertiser->{'primary-category'}->parent) ? (string) $advertiser->{'primary-category'}->parent : null;
                    $cjSubCategory = isset($advertiser->{'primary-category'}->child) ? (string) $advertiser->{'primary-category'}->child : null;

                    // Update or create the record in the database 
                    $company = Company::updateOrCreate(
                        [
                            'affiliate_networks' => 'cj',
                            'advertiser_id' => $cjCId
                        ],
                        [
                            'account_status' => $cjAccountStatus,
                            'relationship_status' => $cjRelationshipStatus,
                            'name' => $cjCName,
                            'affiliate_url' => $cjUrl,
                            'rate' => $cjRate,
                            'fix_amount' => $cjFixAmount,
                            'category' => $cjCategory,
                            'sub_category' => $cjSubCategory ? true : false,
                            'image' => null,
                            'terms_exclutions' => null
                        ]
                    );
                    // If there is a sub-category, update or create it in the SubCategory model
                    if ($cjSubCategory) {
                        SubCategory::updateOrCreate(
                            [
                                'company_id' => $company->id,
                                'sub_name' => $cjSubCategory
                            ],
                            ['sub_rate' => $cjRate]
                        );
                    }
                }

                $this->info('CJCommand data fetched and saved successfully.');
            } else {
                $this->error('CJCommand Failed to fetch data from the API.');
            }
        } catch (\Exception $e) {
            $this->error('CJCommand An error occurred: ' . $e->getMessage());
            Log::error('CJCommand FetchCjData Error: ' . $e->getMessage());
        }
    }
}
