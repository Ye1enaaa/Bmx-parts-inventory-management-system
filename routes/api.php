<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/reg' , [AdminController::class, 'registeradmin']);

Route::post('/login-mobile', [LoginController::class, 'loginMobile']);

Route::get('/get-user-mobile', [UserController::class, 'userAllMobile']);
//Route::get('/user', [UserController::class, 'user'])->middleware('auth:sanctum');
Route::group(['middleware' => ['auth:sanctum']], function(){
    //User
    Route::get('/user',[UserController::class, 'user']);
    Route::post('/logoutMobile', [LoginController::class, 'logoutMobile']);
    Route::post('/addproduct' , [StaffController::class, 'addData']);
});

//admin
Route::get('/dashboard-datas', [AdminController::class, 'returnDashboardMobileView']);
Route::get('/purchase-order' , [AdminController::class, 'returnPurchases']);
Route::get('/show-stocks' , [ProductController::class, 'showStocksMobile']);

//Staff
Route::get('/product-id/{product_code}' , [StaffController::class, 'returnBarcodeData']);

//Route::get('/sales' , [CustomerController::class, 'returnSalesByData']);

Route::get('/overstocks' , [ProductController::class, 'checkOverstock']);
Route::post('/storestock' , [ProductController::class,'storeStock']);

Route::get('/supply/{id}' , [ProductController::class, 'getSupplier']);
Route::get('/alldataaa' , [ProductController::class, 'getsupp']);

Route::get('/trydatas', [ProductController::class, 'tryDatas']);

//-----------------------FOR STOCK IN AND OUT------------------------\\
Route::post('/stockin' , [StaffController::class,'stockIn']);
Route::post('/stockout' , [StaffController::class,'stockOut']);
//-----------------------FETCH BARCODE DATA----------------------------\\
Route::get('/qrcode/{product_code}' , [StaffController::class, 'readQrCode']);





//-------------------------EXPERIMENTATION API-------------------------\\
Route::get('/stockcard/{id}' , [ProductController::class,'fetchStocksWithCard']);