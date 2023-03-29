<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
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

//return views/page for login admin
Route::get('/admin' , [AdminController::class,'returnAdminLoginView']);

//post methods for Liquor Adding forms
Route::post('/post' , [ProductController::class, 'storeData'])->name('post');

//post method for admin auth
Route::post('/admin', [AdminController::class, 'loginAdmin'])->name('login.admin');