<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Company;
use App\Models\SubCategory;
use App\Models\Coupon;
use Illuminate\Support\Facades\Log;

class FetchImpactData extends Command
{
    protected $signature = 'fetch:impact-data';
    protected $description = 'Fetch brands and promo codes from Impact API and update companies in the database';

    public function handle()
    {
        $apiKey = env('IMPACT_API_KEY');
        $accountSid = env('IMPACT_ACCOUNT_SID');
        $campaignsUrl = "https://api.impact.com/Mediapartners/{$accountSid}/Campaigns.json";
        $promoCodesUrl = "https://api.impact.com/Mediapartners/{$accountSid}/PromoCodes.json";

        try {
            $response = Http::withBasicAuth($accountSid, $apiKey)->get($campaignsUrl);

            if ($response->successful()) {
                $brands = $response->json()['Campaigns'];

                foreach ($brands as $brandData) {
                    $impactCId = $brandData['CampaignId'];
                    $impactAccountStatus = $brandData['AccountStatus'];
                    $impactRelationshipStatus = $brandData['RelationshipStatus'];
                    $impactCName = $brandData['CampaignName'];
                    $impactUrl = $brandData['TrackingLink'];
                    $impactRate = $brandData['CommissionRate'] ?? null;
                    $impactCategory = $brandData['CategoryName'] ?? null;
                    $impactSubCategory = $brandData['SubCategoryName'] ?? null;

                    // Update or create the record in the database 
                    $company = Company::updateOrCreate(
                        [
                            'affiliate_networks' => 'impact',
                            'name' => $impactCName
                        ],
                        [
                            'account_status' => $impactAccountStatus,
                            'relationship_status' => $impactRelationshipStatus,
                            'affiliate_url' => $impactUrl,
                            'rate' => $impactRate,
                            'category' => $impactCategory,
                            'sub_category' => $impactSubCategory ? true : false,
                            'image' => null,
                            'terms_exclutions' => null
                        ]
                    );

                    // If there is a sub-category, update or create it in the SubCategory model
                    if ($impactSubCategory) {
                        SubCategory::updateOrCreate(
                            [
                                'company_id' => $company->id,
                                'sub_name' => $impactSubCategory
                            ],
                            ['sub_rate' => $impactRate]
                        );
                    }

                    // Fetch and store promo codes for active advertisers
                    if ($impactRelationshipStatus === 'active') {
                        $promoCodeResponse = Http::withBasicAuth($accountSid, $apiKey)->get($promoCodesUrl, [
                            'CampaignId' => $impactCId
                        ]);

                        if ($promoCodeResponse->successful()) {
                            $promoCodes = $promoCodeResponse->json()['PromoCodes'];

                            foreach ($promoCodes as $promoCodeData) {
                                $promoCode = $promoCodeData['Code'];
                                $promoCodeType = $promoCodeData['Type'];
                                $promoCodeStartDate = $promoCodeData['StartDate'];
                                $promoCodeEndDate = $promoCodeData['EndDate'] ?? null;
                                $promoCodeState = $promoCodeData['State'];

                                // Check if the promo code already exists in the database
                                $existingCoupon = Coupon::where('company_id', $company->id)
                                                        ->where('code', $promoCode)
                                                        ->where('added_by', null)
                                                        ->first();

                                if (!$existingCoupon) {
                                    Coupon::create([
                                        'company_id' => $company->id,
                                        'code' => $promoCode,
                                        'expire' => $promoCodeEndDate,
                                        'c_status' => true,
                                    ]);
                                }
                            }
                        } else {
                            Log::error("FetchImpactData Failed to fetch promo codes for Campaign ID: $impactCId");
                        }
                    } 
                }

                $this->info('FetchImpactData data and promo codes fetched and saved successfully.');
            } else {
                $this->error('FetchImpactData Failed to fetch data from the API.');
            }
        } catch (\Exception $e) {
            $this->error('FetchImpactData An error occurred: ' . $e->getMessage());
            Log::error('FetchImpactData Error: ' . $e->getMessage());
        }
    }
}
