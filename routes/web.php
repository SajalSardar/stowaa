<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ProductsizeController;
use App\Http\Controllers\Backend\ProductcolorController;
use App\Http\Controllers\Backend\ProductController;

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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

Auth::routes();

Route::name('backend.')->group(function(){
    Route::get('/dashboard', [BackendController::class, 'index'])->name('home');

    Route::resource('/category', CategoryController::class)->except(['show','create']);
    Route::resource('/productsize', ProductsizeController::class)->except(['show','create']);
    Route::resource('/productcolor', ProductcolorController::class)->except(['show','create']);
    Route::resource('/product', ProductController::class);
});
