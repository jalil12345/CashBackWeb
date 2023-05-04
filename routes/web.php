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

Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'show'])->middleware('auth')->name('contact.show');
Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'store'])->middleware('auth')->name('contact.store');


Route::get('/privacy-policy', function () { return view('legal/privacy-policy');});
Route::get('/terms-conditions', function () { return view('legal/terms-conditions');});
Route::get('/about-us', function () { return view('legal/About Us');});
Route::get('/contact-us', function () { return view('legal/Contact Us');});

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

Route::get('/stores/{name}', function (Request $request, $name) {
    $store = Company::where('name',$name)->get();
    return view('/store',compact('store'));
});

// compact('result')

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// GoogleAuth view :    route :/sign-in/google  /sign-in/google/redirect  
Route::get('/sign-in/google', [GoogleAuth::class, 'googleSignin']);
Route::get('/sign-in/google/redirect', [GoogleAuth::class, 'googleRedirect']);

Route::get('/auth/facebook', [GoogleAuth::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [GoogleAuth::class, 'handleFacebookCallback']);

// AffiliateController view : Affiliate route :Affiliate
Route::get('/Affiliate', [AffiliateController::class, 'index']);











Route::get('/blog/post0', function () { return view('/blog/post0');});
Route::get('/blog/post1', function () { return view('/blog/post1');});
Route::get('/blog/post2', function () { return view('/blog/post2');});
Route::get('/blog/post3', function () { return view('/blog/post3');});
Route::get('/blog/post4', function () { return view('/blog/post4');});
Route::get('/blog/post5', function () { return view('/blog/post5');});
Route::get('/blog/post6', function () { return view('/blog/post6');});
Route::get('/blog/post7', function () { return view('/blog/post7');});
Route::get('/blog/post8', function () { return view('/blog/post8');});
Route::get('/blog/post9', function () { return view('/blog/post9');});
Route::get('/blog/post10', function () { return view('/blog/post10');});
Route::get('/blog/post11', function () { return view('/blog/post11');});