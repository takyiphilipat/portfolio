<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
