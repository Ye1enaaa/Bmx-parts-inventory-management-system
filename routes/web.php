<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

//return views
Route::get('/index' , [ProductController::class, 'index']);
Route::get('/create', [ProductController::class,'returnCreateDataView']);

//post methods for forms
Route::post('/post' , [ProductController::class, 'storeData'])->name('post');
