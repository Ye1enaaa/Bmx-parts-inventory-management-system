<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//return views/page for posting liquor
Route::get('/dashboard/index', [ProductController::class, 'index'])->middleware('admin');
Route::get('/create', [ProductController::class,'returnCreateDataView']);

Route::get('/dashboard/admin', [ProductController::class, 'showAdminDashboard'])->middleware('admin');
Route::get('/dashboard/create', [ProductController::class, 'showCreateViewInDashboard'])->middleware('admin');



//post methods for Liquor Adding forms
Route::post('/post' , [ProductController::class, 'storeData'])->name('post');

//post method for admin auth
Route::post('/admin', [AdminController::class, 'loginAdmin'])->name('login.admin');

Auth::routes();

//you are
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//return views/page for login admin
//Route::get('/admins' , [AdminController::class,'returnAdminLoginView']);

//return view for admin dashboard
Route::get('/dashboard' , [AdminController::class, 'returnAdminDashboardView'])->middleware('admin');

//return view for creating user
Route::get('/createuser', [UserController::class,'returnCreateAndShowUserView'])->middleware('superadmin');
//post method for creating user
Route::post('/createuser' , [UserController::class, 'registerUser'])->name('create.user')->middleware('superadmin');
//edit method for user
Route::patch('/edituser/{id}', [UserController::class,'editUser'])->name('edit.user')->middleware('superadmin');
//delete method for user
Route::delete('/createuser/{id}',[UserController::class, 'softDelete'])->name('softdel.user')->middleware('superadmin');

//Disabling the account
Route::patch('/createuser/{id}/disable', [UserController::class, 'disable'])->name('disable.user')->middleware('superadmin');

Route::get('/login',function(){
    return view('auth.login');
});

Route::post('login', [LoginController::class, 'login'])->name('login.role');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Customer
Route::get('/customer', [CustomerController::class, 'returnCustomerViewPage'])->middleware('customer');
Route::post('/post-customer', [CustomerController::class, 'postCustomerOrder'])->name('customer.order');
//supplier

//Route::get('/supplier', [SupplierController::class, 'returnSupplierViewPage']);

Route::get('/supplier', [SupplierController::class, 'returnSupplierViewPage']);
Route::post('supplier' , [SupplierController::class, 'addSupplier'])->name('supplier.add');

Route::get('/customers/{id}', [CustomerController::class,'returnRecentOrderPage']);

//Purchase
Route::get('/purchase', [AdminController::class,'returnPurchaseView']);

//Route::get('/get-price/{selectedValue}', function ($selectedValue) {
  //  $price = DB::table('products')->where('name', $selectedValue)->pluck('unit_price')->first();
   // return response()->json(['unit_price' => $price]);
//});

//Route::get('/get-price/{selectedValue}', function ($selectedValue) {
 //   $unit_price = DB::table('products')->where('name', $selectedValue)->value('unit_price');
  //  return response()->json(['unit_price' => $unit_price]);
//});

Route::get('/get-price/{selectedValue}', [ProductController::class,'getPrice']);