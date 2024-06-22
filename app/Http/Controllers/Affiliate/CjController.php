<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Services\CJService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class CjController extends Controller
{
    protected $cjService;

    public function __construct(CJService $cjService)
    {
        $this->cjService = $cjService;
    }

    public function updateTripsFromCJAPI(Request $request)
    {
        // Define date range for fetching pending commissions
        $sincePostingDate = Carbon::now()->subDays(7)->toIso8601String();
        $beforePostingDate = Carbon::now()->toIso8601String();

        // Fetch pending commissions from CJ API
        $commissions = $this->cjService->fetchPendingCommissions($sincePostingDate, $beforePostingDate);

        $oneMonthAgo = Carbon::now()->subMonth();

        foreach ($commissions as $commission) {
            $trip = Trip::where('trip_id', $commission['commissionId'])
                        ->where('payable', false)
                        ->where('paid_amount', 0)
                        ->where('created_at', '>=', $oneMonthAgo) 
                        ->first();

            if ($trip) {
                $trip->update([
                    'trip_cashback' => $commission['pubCommissionAmountUsd'] * 0.90,
                    'trip_status' => $commission['validationStatus'],
                ]);

                // Update trip status based on validation status
                switch ($commission['validationStatus']) {
                    case 'PENDING':
                        $trip->update(['pending' => true, 'verified' => false]);
                        break;
                    case 'ACCEPTED':
                        $trip->update(['pending' => false, 'verified' => true]);
                        break;
                    case 'DECLINED':
                        $trip->update(['pending' => false, 'verified' => false]);
                        break;
                    case 'AUTOMATED':
                        // Handle automated status if necessary
                        break;
                }
            }
        }

        return response()->json(['message' => 'Trips updated successfully.'], 200);
    }

    public function convertPendingToVerified(Request $request)
    {
        $tripIds = $request->input('trip_ids');

        try {
            Trip::whereIn('id', $tripIds)
                ->where('pending', true)
                ->update(['pending' => false, 'verified' => true]);

            return response()->json(['message' => 'Trips converted to verified successfully.'], 200);
        } catch (\Exception $e) {
            Log::error('Failed to update trips: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to convert trips to verified.'], 500);
        }
    }
}
