<?php

use App\Http\Controllers\PeritikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\TransaksiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//method GET
//route untuk get table overall
Route::get('transaksi', [TransaksiController::class, 'index']);
//route untuk get table overall
Route::get('produksi', [ProduksiController::class, 'index']);
//route untuk get table overall
Route::get('peritikan', [PeritikanController::class, 'index']);
//route untuk get table overall
Route::get('stok', [ProduksiController::class, 'stok']);


//route untuk get table overall
Route::post('add/peritikan', [PeritikanController::class, 'store']);
//route untuk get table overall
Route::post('add/transaksi', [TransaksiController::class, 'store']);
//route untuk get table overall
Route::post('add/produksi', [ProduksiController::class, 'store']);

//route untuk get table overall
Route::put('update/transaksi/{id}', [TransaksiController::class, 'update']);
//route untuk get table overall
Route::put('update/peritikan/{id}', [PeritikanController::class, 'update']);
//route untuk get table overall
Route::put('update/produksi/{id}', [ProduksiController::class, 'update']);

Route::delete('delete/transaksi/{id}', [TransaksiController::class, 'destroy']);
//route untuk get table overall
Route::delete('delete/peritikan/{id}', [PeritikanController::class, 'destroy']);
//route untuk get table overall
Route::delete('delete/produksi/{id}', [ProduksiController::class, 'destroy']);
