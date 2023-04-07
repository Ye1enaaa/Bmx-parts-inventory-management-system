<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Auth\LoginController;
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
Route::get('/index' , [ProductController::class, 'index']);
Route::get('/create', [ProductController::class,'returnCreateDataView']);

//post methods for Liquor Adding forms
Route::post('/post' , [ProductController::class, 'storeData'])->name('post');

//post method for admin auth
Route::post('/admin', [AdminController::class, 'loginAdmin'])->name('login.admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//return views/page for login admin
//Route::get('/admins' , [AdminController::class,'returnAdminLoginView']);

//return view for admin dashboard
Route::get('/dashboard' , [AdminController::class, 'returnAdminDashboardView'])->middleware('admin');

//return view for creating user
Route::get('/createuser', [UserController::class,'returnCreateAndShowUserView'])->middleware('superadmin');
//post method for creating user
Route::post('/createuser' , [UserController::class, 'registerUser'])->name('create.user')->middleware('superadmin');

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

//supplier
Route::get('/supplier', [SupplierController::class, 'returnSupplierViewPage']);
Route::post('supplier' , [SupplierController::class, 'addSupplier'])->name('supplier.add');