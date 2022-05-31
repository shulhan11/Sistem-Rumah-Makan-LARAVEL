<?php

use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Clockwork\Support\Lumen\Controller;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\menuController;
use App\Http\Controllers\myProfileController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\registerController;

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

Route::resource('/', HomeController::class);
Route::resource('allmenu', MenuController::class)->middleware('auth');
Route::resource('product', ProductController::class)->middleware('admin');
Route::resource('pesanan', PesananController::class);
Route::resource('cart-detail', CartDetailController::class);
Route::resource('myprofile', myProfileController::class)->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('admin');

Route::get('/keranjang/{id}', [PesananController::class, 'do_tambah_keranjang']);
Route::get('/hapus/{id}', [PesananController::class, 'do_hapus_keranjang']);
Route::get('/transaksi', [PesananController::class, 'do_tambah_transaksi']);

// Auntefication
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginControler::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginControler::class, 'auth']);
Route::post('/logout', [LoginControler::class, 'logout']);
