<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\PostVoteController;
use App\Http\Controllers\UserProfileController;

Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/submit', [PostController::class, 'submit'])->name('submit');
Route::post('/submit', [PostController::class, 'store']);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/latest', [PostController::class, 'latest'])->name('latest');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('posts.comments');
Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/post/{post}/votes', [PostVoteController::class, 'store'])->name('posts.votes');
Route::delete('/post/{post}/votes', [PostVoteController::class, 'destroy'])->name('posts.votes');

Route::get('/user/{user:username}', [UserProfileController::class, 'index'])->name('user.profile');
