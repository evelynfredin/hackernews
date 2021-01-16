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

Route::get('/settings/{user:id}', [SettingsController::class, 'edit'])->name('settings');
Route::put('/settings/{user:id}/edit', [SettingsController::class, 'update'])->name('user.update');
Route::get('/changepassword/{user:id}', [SettingsController::class, 'passwordedit'])->name('password.update');
Route::put('/changepassword/{user:id}', [SettingsController::class, 'passwordupdate']);

Route::delete('/delete/{user:id}', [SettingsController::class, 'destroy'])->name('user.destroy');

Route::get('/submit', [PostController::class, 'submit'])->name('submit');
Route::post('/submit', [PostController::class, 'store']);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/latest', [PostController::class, 'latest'])->name('latest');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}/edit', [PostController::class, 'update'])->name('posts.update');

Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('posts.comments');
Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}/edit', [CommentController::class, 'update'])->name('comments.update');

Route::post('/comments/{comment}/vote', [CommentController::class, 'vote'])->name('comments.vote');
Route::delete('/comments/{comment}/vote', [CommentController::class, 'deleteVote'])->name('comments.vote.delete');



Route::post('/post/{post}/votes', [PostVoteController::class, 'store'])->name('posts.votes');

Route::delete('/post/{post}/votes', [PostVoteController::class, 'destroy']);

Route::get('/user/{user:username}', [UserProfileController::class, 'index'])->name('user.profile');
