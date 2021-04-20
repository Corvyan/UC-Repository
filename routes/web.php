<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CancelController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostViewController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostDspaceController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConfirmUploadController;


Route::get('/', function() {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
 
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

Route::get('/posts/{post}', [PostViewController::class, 'show'])->name('posts.view');
Route::post('/posts/{post}', [PostViewController::class, 'store'])->name('posts.view');
// Route::post('/posts/{post}', [PostViewController::class, 'upload'])->name('posts.upload');

Route::get('/list', [ListController::class, 'index'])->name('list');

Route::get('/dspace', [PostDspaceController::class, 'index'])->name('dspace');
Route::post('/dspace', [PostDspaceController::class, 'store']);

Route::get('/confirm_upload/{post}', [ConfirmUploadController::class, 'index'])->name('upload');
Route::post('/confirm_upload/{post}', [ConfirmUploadController::class, 'store']);

Route::get('/cancel_upload/{post}', [CancelController::class, 'index'])->name('cancel');
Route::post('/cancel_upload/{post}', [CancelController::class, 'store']);
