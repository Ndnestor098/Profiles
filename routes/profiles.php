<?php

use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfilesController::class, 'index'])->name('index');

Route::post('/create', [ProfilesController::class, 'store'])->name('store');

Route::post('/update', [ProfilesController::class, 'update'])->name('update');

Route::get('/upload', [ProfilesController::class, 'upload'])->name('upload');

Route::post('/upload', [ProfilesController::class, 'store'])->name('store');
