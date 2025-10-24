<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasokController;
use Illuminate\Support\Facades\Route;

// default route
Route::get('/', function () {
    return view('pages.beranda');
})->name('beranda');

// barang routes
Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::patch('/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/{id}/destroy', [BarangController::class, 'destroy'])->name('barang.destroy');
});


// kategori routes
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/{id}/destroy', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});


// pemasok routes
Route::prefix('pemasok')->group(function () {
    Route::get('/', [PemasokController::class, 'index'])->name('pemasok.index');
    Route::get('/create', [PemasokController::class, 'create'])->name('pemasok.create');
    Route::post('/', [PemasokController::class, 'store'])->name('pemasok.store');
    Route::get('/{id}/edit', [PemasokController::class, 'edit'])->name('pemasok.edit');
    Route::patch('/{id}', [PemasokController::class, 'update'])->name('pemasok.update');
    Route::delete('/{id}/destroy', [PemasokController::class, 'destroy'])->name('pemasok.destroy');
});
