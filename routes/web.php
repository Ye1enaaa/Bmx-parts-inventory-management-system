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

//return views/page for posting liquor
Route::get('/index', [ProductController::class, 'index'])->middleware('admin');
Route::get('/create', [ProductController::class,'returnCreateDataView']);
Route::get('/stockcard/{id}' , [ProductController::class, 'returnStockCard']);
Route::get('/dashboard/admin', [ProductController::class, 'showAdminDashboard'])->middleware('admin');
Route::get('/dashboard/create', [ProductController::class, 'showCreateViewInDashboard'])->middleware('admin');

//UnderStock
Route::get('/index/understocks',[UnderStockController::class,'returnUnderStocks']);

//post methods for Liquor Adding forms
Route::post('/post' , [ProductController::class, 'storeData'])->name('post');

//post method for admin auth
Route::post('/admin', [AdminController::class, 'loginAdmin'])->name('login.admin');

Auth::routes();

//you are
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//return views/page for login admin
//Route::get('/admins' , [AdminController::class,'returnAdminLoginView']);

//return view for admin dashboard
Route::get('/dashboard' , [AdminController::class, 'returnAdminDashboardView'])->middleware('admin');

//return view for creating user
Route::get('/createuser', [UserController::class,'returnCreateAndShowUserView'])->middleware('superadmin');
//post method for creating user
Route::post('/createuser' , [UserController::class, 'registerUser'])->name('create.user')->middleware('superadmin');
//edit method for user
Route::put('/edituser/{id}', [UserController::class,'editUser'])->name('edit.user')->middleware('superadmin');
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

Route::get('/customers/{id}', [CustomerController::class,'returnRecentOrderPage']);


//supplier
// Route::get('/supplier', [SupplierController::class, 'returnSupplierViewPage']);
// Route::post('supplier' , [SupplierController::class, 'addSupplier'])->name('supplier.add');

//gi tandog ni jopin
Route::get('/supplier-information', [SupplierController::class, 'showSupplierInformation']);
Route::get('/add-supplier', [SupplierController::class, 'showAddSupplierForm']);
Route::post('/supplier', [SupplierController::class, 'addSupplier'])->name('supplier.add');


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


//Graphs
Route::get('/graphs' , [CustomerController::class, 'returnSalesByData'])->middleware('admin');


Route::put('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');




// Define the route for generating and downloading the PDF
Route::get('/convert-to-pdf/{id}', [StockCardController::class, 'convertToPDF'])->name('convertToPDF');


//gitandog ni jopin
Route::get('/inventory/print', 'ProductController@showPrintView')->name('inventory.print');
