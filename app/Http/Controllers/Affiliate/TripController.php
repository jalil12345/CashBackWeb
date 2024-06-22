<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;
use App\Models\Company;
use App\Models\Deal;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class TripController extends Controller
{  
    public function tripsData(Request $request)
    {
        // Validate the month and year parameters
        $request->validate([
            'month' => 'nullable|integer|min:1|max:12',
            'year' => 'nullable|integer|min:2020', // Assuming you want to limit the year to 2020 or later
        ]);

        // Get the month and year from the request or default to the current month and year
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        try {
            // Get trips for the specified month and year
            $trips = Trip::whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->get();
        } catch (\Exception $e) {
            // Handle any database query errors
            return response()->json(['error' => 'Failed to fetch trips.'], 500);
        }

        return response()->json($trips);
    }

    public function index(Request $request)
    {
        // Get the authenticated user's ID
        $user_id = Auth::id();

        // Get trips for the authenticated user
        $trips = Trip::where('user_id', $user_id)->get();

        return view('account.trips', ['trips' => $trips]);
    }
    
    public function store(Request $request, $id)
    {
        // Retrieve the authenticated user
        $user_id = Auth::id();

        $company_id = $id;
        $company = Company::find($id);
        $trip_id = str_pad(rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
        // Store the Trip with user_id and company_id
        $trip = Trip::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'trip_id' => $trip_id,

        ]);
        // Retrieve the company URL based on the company_id
        $company = Company::find($company_id);
        if ($company) {
            // Redirect the user to the company's URL
            return view('redirectPage', compact('user_id', 'company_id','company','trip_id'));
        } else {
            abort(404);
        }
    }

    public function storeDeals(Request $request, $id)
    {
        // Retrieve the authenticated user
        $user_id = Auth::id();

        $deal_id = $id;
        $deal = Deal::find($id);
        $company_id = $deal->company_id;
        $trip_id = str_pad(rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
        // Store the Trip with user_id and company_id
        $trip = Trip::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'trip_id' => $trip_id,

        ]);
        // Retrieve the company URL based on the company_id
        $company = Company::find($company_id);
        if ($company) {
            // Redirect the user to the company's URL
            return view('redirectPage', compact('user_id', 'company_id','company','trip_id'));
        } else {
            abort(404);
        }
    }

    public function storeCoupons(Request $request, $id)
    {
        // Retrieve the authenticated user
        $user_id = Auth::id();

        $coupon_id = $id;
        $coupon = Coupon::find($id);
        $company_id = $coupon->company_id;
        $trip_id = str_pad(rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
        // Store the Trip with user_id and company_id
        $trip = Trip::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'trip_id' => $trip_id,

        ]);
        // Retrieve the company URL based on the company_id
        $company = Company::find($company_id);
        if ($company) {
            // Redirect the user to the company's URL
            return view('redirectPage', compact('user_id', 'company_id','company','trip_id'));
        } else {
            abort(404);
        }
    }
    public function  tripsAdmin(){
        $trips =Trip::where('verified',1)->get();

        return view('admin.trips-admin', ['trips' => $trips]);
    }
    public function filterTripsAdmin(Request $request){
        $date = $request->get('date');
       
        $trips = Trip::whereDate('created_at', '<=', $date)
                  ->where('created_at', '<=', Carbon::parse($date)->endOfDay())
                  ->where('verified',1)
                  ->get();
        return view('admin.trips-admin', ['trips' => $trips]);
    }
    public function verifiedToPayableAdmin(Request $request){
        log::info($request);
        $tripIds = $request->input('trips');
        $tripIdsArray = explode(',', $tripIds);
        
        log::info('trips: ' . $tripIds);
        Trip::whereIn('id', $tripIdsArray)->update([
            'verified' => 0,
            'payable' => 1,
        ]);
        return back()->with('success', 'Trip statuses updated successfully!');
    }




 


    public function searchAdmin(Request $request)
    {
        $search = $request->input('search');
        $users =[];
        if ($search) {
            $trips = Trip::where('user_id', 'like', "%$search%")
                         ->orWhere('trip_id', 'like', "%$search%")
                         ->get();
        } else {
            $trips = [];
        }

        return view('admin.trips-user', ['trips' => $trips,'users'=>$users]);
    }

    public function searchAdminDestroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();
        return redirect()->back()->with('success', 'Trip deleted successfully.');
    }

    public function searchAdminUpdate(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->update($request->all());
        log::info($trip);
        return redirect()->back()->with('success', 'Trip updated successfully.');
    }

   
}


