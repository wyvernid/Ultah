<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WishController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');
Route::get('/about', [WishController::class, 'index'])->name('about');
Route::post('/wish', [WishController::class, 'store'])->name('wish.store');