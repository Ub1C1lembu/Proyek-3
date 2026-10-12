<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CartController;

Route::get('/', [KeranjangController::class, 'index']);
Route::get('/tambah/{id}', [KeranjangController::class, 'tambah']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::get('/update/{id}', [KeranjangController::class, 'update']);
Route::get('/hapus/{id}', [KeranjangController::class, 'hapus']);
Route::get('/kosongkan', [KeranjangController::class, 'kosongkan']);

Route::get('/shop', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
