<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/', function () {
    return view('news.index');
});
