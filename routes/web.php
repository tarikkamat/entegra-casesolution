<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('postLogin');

Route::get('/get-product',[ProductController::class, 'getProduct'])->name('getProduct');

Route::get('/', [ProductController::class, 'index'])->name('product');
Route::get('product/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('product/{id}',[ProductController::class, 'update'])->name('product.update');
Route::get('product-destroy/{id}',[ProductController::class, 'destroy'])->name('product.destroy');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
