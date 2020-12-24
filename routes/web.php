<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'store']);

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/', function () {
    return view('news.index');
});
