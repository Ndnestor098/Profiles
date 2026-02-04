<?php

use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfilesController::class, 'index'])->name('profiles.index');
