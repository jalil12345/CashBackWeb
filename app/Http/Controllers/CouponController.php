<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coupons= Coupon::get();
        return view('coupons',compact('coupons'));
    }

    public function couponCreatePage(Request $request)
    {
        return view('crud/add-coupon');
    }
    public function adminCouponPage(Request $request)
    {
        return view('admin/admin-add-coupon');
    }
    public function addCoupon(Request $request)
        {
            $request->validate([
                'store_website' => 'required|string',
                'offer_type' => 'required|string',
                'code' => 'required|string|max:20',
                'description' => 'required|string|max:100',
                'expiration_date' => 'nullable|date',
            ]);
            // Check if the coupon code already exists
            $existingCoupon = Coupon::where('code', $request->input('code'))->first();
            $existingStore = Company::where('name',$request->input('store_website'))->first();
            if ($existingCoupon) {
                return back()->with('couponExist', 'Thank you for your submission! However,
                 this coupon already exists in our database.');
            }
            if (!$existingStore) {
                return back()->with('couponExist', 'This store does not exist in our database.');
            }

            else{
            Coupon::create([
                'store' => $request->input('store_website'),
                'type' => $request->input('offer_type'),
                'code' => $request->input('code'),
                'c_title' => $request->input('description'),
                'expire' => $request->input('expiration_date'),
                'c_status' => false,
                'added_by' => Auth::id(),
            ]);
            
    
            return back()->with('success', 'Thank you for your submission, Coupon submitted successfully!');
            }
        }
    
        public function adminAddCoupon(Request $request)
        {
            $request->validate([
                'store_website' => 'required|string',
                'offer_type' => 'required|string',
                'code' => 'required|string|max:20',
                'description' => 'required|string|max:100',
                'expiration_date' => 'nullable|date',
            ]);
            // Check if the coupon code already exists
            $existingCoupon = Coupon::where('code', $request->input('code'))->first();
            $existingStore = Company::where('name',$request->input('store_website'))->first();
            if ($existingCoupon) {
                return back()->with('couponExist', 'Thank you for your submission! However,
                 this coupon already exists in our database.');
            }
            if (!$existingStore) {
                return back()->with('couponExist', 'This store does not exist in our database.');
            }

            else{
                $userIds = [ 4, 5, 6]; 

                // Randomly select a user ID from the array
                $randomUserId = $userIds[array_rand($userIds)];
            Coupon::create([
                'store' => $request->input('store_website'),
                'type' => $request->input('offer_type'),
                'code' => $request->input('code'),
                'c_title' => $request->input('description'),
                'expire' => $request->input('expiration_date'),
                'c_status' => true,
                'added_by' => $randomUserId,
            ]);
            
    
            return back()->with('success', 'Thank you for your submission, Coupon submitted successfully!');
            }
        }
        public function searchStores(Request $request)
        {
            
            if ($request->filled('search')) {
                $stores = Company::search($request->search)->get();
            }else {
                $stores = Company::get();
            }
            return response()->json($stores);
        }
}
