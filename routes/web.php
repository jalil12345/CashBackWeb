<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Affiliate\AffiliateController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GoogleAuth;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/privacy-policy', function () {
    return view('legal/privacy-policy');
});

Route::get('/terms-conditions', function () {
    return view('legal/terms-conditions');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/account-details', function () {
    return view('account/account-settings');
})->middleware('auth');

Route::get('/payouts', function () {
    return view('account/payouts');
})->middleware('auth');

Route::get('/stores', [CompanyController::class, 'index']);

// Route::get('/brands', function () {
//     return view('brands');
// });

Route::get('/coupons', function () {
    return view('coupons');
});

Route::get('/blog', function () {
    return view('blog/blog');
});

Route::get('/deals', function () {
    return view('deals');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// after log in
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/search', function () {
//     $q = Input::get('q');
//     dd($q);
// //    return view('/search',compact('result'));
// });

Route::get('users', [UserController::class, 'index']);
Route::post('update-account', [UserController::class, 'update']);

Route::get('/update-account', function () {
    return view('account/update-account');
});

Route::get('search', function (Request $request) {
     $results = User::search($request->search)->get();
     return view('/search',compact('results'));
});



// compact('result')

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// GoogleAuth view :    route :/sign-in/google  /sign-in/google/redirect  
Route::get('/sign-in/google', [GoogleAuth::class, 'googleSignin']);
Route::get('/sign-in/google/redirect', [GoogleAuth::class, 'googleRedirect']);

// AffiliateController view : Affiliate route :Affiliate
Route::get('/Affiliate', [AffiliateController::class, 'index']);











Route::get('/blog/post0', function () { return view('/blog/post0');});
Route::get('/blog/post1', function () { return view('/blog/post1');});