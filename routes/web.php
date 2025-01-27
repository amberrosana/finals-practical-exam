<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Post CRUD 
    Route::get('post/create', [PostController::class, 'showPost'])->name('post.create'); 
    Route::post('post/store', [PostController::class, 'storePost'])->name('post.store'); 

    Route::get('post/{post}/edit', [PostController::class, 'editPost'])->name('post.edit'); 
    Route::put('post/{post}/update', [PostController::class, 'update'])->name('post.update'); 

    Route::delete('/{post}', [PostController::class, 'deletePost'])->name('post.delete'); 

});
