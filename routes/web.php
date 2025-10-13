<?php

use Illuminate\Support\Facades\Route;

// default route
Route::get('/', function () {
    return view('pages.beranda');
})->name('beranda');

// about route
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// barang route
Route::get('/barang', function () {
    return view('pages.barang');
})->name('barang');