<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/blogpost');

Route::get('/blogpost', [BlogpostController::class, 'index'])->name('blogpost.index');
Route::get('/blogpost/create', [BlogpostController::class, 'create'])->name('blogpost.create');
Route::post('/blogpost/store', [BlogpostController::class, 'store'])->name('blogpost.store');
Route::post('/upload/{id}', [UploadController::class, 'store'])->name('upload.store');
Route::delete('/blogpost/delete/{id}', [BlogpostController::class, 'delete'])->name('blogpost.delete');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/auth/{provider}/redirect', [OAuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [OAuthController::class, 'callback']);
