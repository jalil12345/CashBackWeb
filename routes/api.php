<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Company;
use App\Models\Favorite;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (Request $request) {
    if($request->filled('search')){
        $users = User::search($request->search)->get();
    }else{
         $users = User::get();
        
    }
    return response()->json($users);
});

Route::get('/companies',  [CompanyController::class, 'searchStores']);
Route::get('/1/companies',  [CompanyController::class, 'searchStoresSecond']);
Route::get('/2/companies',  [CouponController::class, 'searchStores']);
Route::get('/stores',  [CompanyController::class, 'search']);

// middleware('last.modified')->
Route::middleware('last.modified')->get('/extension-list', function (Request $request) {
    if($request->filled('search')){
        $companies = Company::search($request->search)->get();
    }else{
        $companies = Company::get();
        
    }
    return response()->json($companies);
});




Route::post('/record-click', [HistoryController::class, 'recordClick']);

