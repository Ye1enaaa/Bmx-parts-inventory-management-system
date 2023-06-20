<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\StockCardController;
use App\Http\Controllers\UnderStockController;


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

Route::get('/login',function(){
  return view('auth.login');
});

Route::post('/loginRoles', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('superadmin')->group(function () {
  // Return view for creating user
  Route::get('/createuser', [UserController::class, 'returnCreateAndShowUserView']);
  // Post method for creating user
  Route::post('/createuser', [UserController::class, 'registerUser'])->name('create.user');
  // Edit method for user
  Route::put('/edituser/{id}', [UserController::class, 'editUser'])->name('edit.user');
  // Delete method for user
  Route::delete('/createuser/{id}', [UserController::class, 'softDelete'])->name('softdel.user');
  // Disabling the account
  Route::patch('/createuser/{id}/disable', [UserController::class, 'disable'])->name('disable.user');
  Route::patch('/createuser/{id}/enable', [UserController::class, 'enable'])->name('enable.user');
});


Route::group(['middleware' => 'admin'], function () {
  Route::get('/index', [ProductController::class, 'index']);
  Route::get('/create', [ProductController::class, 'returnCreateDataView']);
  Route::get('/stockcard/{id}', [ProductController::class, 'returnStockCard']);

  //post methods for Liquor Adding forms
  Route::post('/post' , [ProductController::class, 'storeData'])->name('post');
  Route::put('/editprod/{id}', [ProductController::class, 'edit']);
  //->name('products.edit')
});

Route::group(['middleware' => 'admin'], function () {
  Route::get('/dashboard/admin', [ProductController::class, 'showAdminDashboard']);
  Route::get('/dashboard/create', [ProductController::class, 'showCreateViewInDashboard']);
});

//return view for admin dashboard
Route::get('/dashboard' , [AdminController::class, 'returnAdminDashboardView'])->middleware('admin');
Route::get('/graphs' , [AdminController::class, 'returnStocksOutByData'])->middleware('admin');
//UnderStock
Route::get('/index/understocks',[UnderStockController::class,'returnUnderStocks']);

Route::middleware('admin')->group(function () {
  Route::get('/supplier-information', [SupplierController::class, 'showSupplierInformation']);
  Route::get('/add-supplier', [SupplierController::class, 'showAddSupplierForm']);
  Route::post('/suppliers', [SupplierController::class, 'addSupplier'])->name('supplier.add');
});

// Define the route for generating and downloading the PDF
Route::get('/convert-to-pdf/{id}', [StockCardController::class, 'convertToPDF'])->name('convertToPDF');

//gitandog ni jopin
Route::get('/inventory/print', 'ProductController@showPrintView')->name('inventory.print');

Route::post('/resetDamage/{id}', [StockCardController::class, 'resetReturnValue']);








//Auth::routes();






