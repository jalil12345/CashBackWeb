<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Coupon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Limit the number of stores to 8
        $stores = Company::orderBy('rate', 'desc')->take(8)->get();

        // Limit the number of coupons to 8
        $coupons = Coupon::take(8)->get();
        
        return view('home', ['stores' => $stores, 'coupons' => $coupons]);
    }
}
