<?php

use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfilesController::class, 'index'])->name('index');

Route::get('/upload', [ProfilesController::class, 'upload'])->name('upload');

Route::post('/upload', [ProfilesController::class, 'store'])->name('store');
