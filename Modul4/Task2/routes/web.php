<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeranjangController;

Route::get('/', [KeranjangController::class, 'index']);
Route::get('/tambah/{id}', [KeranjangController::class, 'tambah']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::get('/update/{id}', [KeranjangController::class, 'update']);
Route::get('/hapus/{id}', [KeranjangController::class, 'hapus']);
Route::get('/kosongkan', [KeranjangController::class, 'kosongkan']);