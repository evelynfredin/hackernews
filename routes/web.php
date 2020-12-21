<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [UserController::class, 'index'])->name('register');

Route::get('/', function () {
    return view('news.index');
});
