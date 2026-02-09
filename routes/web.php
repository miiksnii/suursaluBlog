<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

use App\Http\Controllers\CategoryController;

Route::get('/category/{category}', [CategoryController::class, 'show'])
    ->name('category');


Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');

Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');

Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes/web.php
require __DIR__ . '/auth.php';
