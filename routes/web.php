<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
//return view for creating user
Route::get('/createuser', [UserController::class,'returnCreateAndShowUserView']);

//return views/page for posting liquor
Route::get('/index' , [ProductController::class, 'index']);
Route::get('/create', [ProductController::class,'returnCreateDataView']);

//return views/page for login admin
Route::get('/admin' , [AdminController::class,'returnAdminLoginView']);

//return view for admin dashboard
Route::get('/dashboard' , [AdminController::class, 'returnAdminDashboardView']);

//post methods for Liquor Adding forms
Route::post('/post' , [ProductController::class, 'storeData'])->name('post');

//post method for admin auth
Route::post('/admin', [AdminController::class, 'loginAdmin'])->name('login.admin');

//post method for creating user
Route::post('/createuser' , [UserController::class, 'registerUser'])->name('create.user');

//delete method for user
Route::delete('/createuser/{id}',[UserController::class, 'softDelete'])->name('softdel.user');

//Disabling the account
Route::patch('/createuser/{id}/disable', [UserController::class, 'disable'])->name('disable.user');
