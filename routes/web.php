<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\PostVoteController;
use App\Http\Controllers\Post\SubmitController;

Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/submit', [SubmitController::class, 'index'])->name('submit');
Route::post('/submit', [SubmitController::class, 'store']);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/latest', [PostController::class, 'latest'])->name('latest');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('post/{post}/votes', [PostVoteController::class, 'store'])->name('posts.votes');
Route::delete('post/{post}/votes', [PostVoteController::class, 'destroy'])->name('posts.votes');
