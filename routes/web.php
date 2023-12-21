<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentEmailVerificationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\Affiliate\AffiliateController;
use App\Http\Controllers\UserMembershipController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GoogleAuth;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\DetailsController;

 

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
Route::middleware(['auth'])->group(function () {
    Route::get('/api-favorites', [favoriteController::class, 'index']);
});


Route::post('/favorites/toggleFavorite/{companyId}', [favoriteController::class, 'toggleFavorite'])
->name('favorites.toggleFavorite');



Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'show'])->middleware('auth')->name('contact.show');
Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'store'])->middleware('auth')->name('contact.store');

Route::get('/payouts', [PaymentMethodController::class, 'index'])->name('payouts')->middleware('auth');
Route::post('/account-details', [PaymentEmailVerificationController::class, 'index'])->name('email.save')->middleware('auth');
Route::post('/account-details/send', [PaymentEmailVerificationController::class, 'send'])->name('email.send');
Route::get('/payouts/verify', [PaymentEmailVerificationController::class, 'verifyEmail'])->name('payouts.verify')->middleware('auth');
Route::post('/account-settings/change-user-name', [PaymentEmailVerificationController::class, 'changeUserName'])
->name('account-details.change-user-name');


         // Paypal   
         
Route::get('/paypal/authenticate', [PaypalController::class, 'initiatePaypalAuthentication']);
Route::get('/paypal/callback', [PaypalController::class, 'handlePaypalCallback']);




Route::post('/account-settings/add-password', [PaymentEmailVerificationController::class, 'addPassword'])
->name('account.password');
Route::post('/account-details/update-password', [PaymentEmailVerificationController::class, 'updatePassword'])
->name('password.update0');
Route::post('/account-details/add-number', [PaymentEmailVerificationController::class, 'addNumber'])
->name('number.add');
Route::get('/favorites', [CompanyController::class, 'favorite'])
->middleware('auth');


Route::get('/privacy-policy', function () { return view('legal/privacy-policy');});
Route::get('/terms-conditions', function () { return view('legal/terms-conditions');});
Route::get('/about-us', function () { return view('legal/About Us');});
Route::get('/contact-us', function () { return view('legal/Contact Us');});
Route::get('/how-it-works', function () { return view('legal/how-it-works');});
// Route::get('/membership-plans', function () { return view('memberships');});


Route::get('/user-profile', function () {
    return view('user-profile');
})->middleware('auth');

Route::get('/account-details', [DetailsController::class, 'index'])->middleware('auth');




Route::get('/stores', [CompanyController::class, 'index']);

// Route::get('/brands', function () {
//     return view('brands');
// });

Route::get('/coupons', function () {
    return view('coupons');
});



Route::get('/deals', function () {
    return view('deals');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
// after log in
Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/stores/name/{name}', function (Request $request, $name) {
    $store = Company::where('name',$name)->get();
    return view('/store',compact('store'));
});

Route::get('/stores/category/{category}', function (Request $request, $category) {
    $store = Company::where('category',$category)->get();
    return view('/category',compact('store'));
});





// compact('result')


    Route::get('/sign-in/google', [GoogleAuth::class, 'googleSignin']);
    Route::get('/sign-in/google/redirect', [GoogleAuth::class, 'googleRedirect']);



Route::get('/auth/facebook', [GoogleAuth::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [GoogleAuth::class, 'handleFacebookCallback']);

// AffiliateController view : Affiliate route :Affiliate
// Route::get('/Affiliate', [AffiliateController::class, 'index']);


Route::get('/billing', [PaymentController::class, 'index']);



Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/1/cou', function () {
        return view('cou');
    });
    Route::get('users', [UserController::class, 'index']);
});

// Route::get('/blog', function () {
//     return view('blog/blog');
// });


// Route::get('/blog/best-ways-to-save-money-at-walmart', function () { return view('/blog/best-ways-to-save-money-at-walmart');});
// Route::get('/blog/save-money-at-dollar-tree', function () { return view('/blog/save-money-at-dollar-tree');});
// Route::get('/blog/how-to-save-at-amazon', function () { return view('/blog/how-to-save-at-amazon');});
// Route::get('/blog/save-money-at-target', function () { return view('/blog/save-money-at-target');});
// Route::get('/blog/save-money-at-aldi', function () { return view('/blog/save-money-at-aldi');});
// Route::get('/blog/save-money-at-home-depot', function () { return view('/blog/save-money-at-home-depot');});
// Route::get('/blog/post6', function () { return view('/blog/post6');});
// Route::get('/blog/save-money-at-nike', function () { return view('/blog/save-money-at-nike');});
// Route::get('/blog/post8', function () { return view('/blog/post8');});
// Route::get('/blog/post9', function () { return view('/blog/post9');});
// Route::get('/blog/smart-ways-to-save-money-at-costco', function () { return view('/blog/smart-ways-to-save-money-at-costco');});
// Route::get('/blog/post11', function () { return view('/blog/post11');});