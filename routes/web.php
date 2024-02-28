<?php

use App\Http\Controllers\BlogpostController;
use Illuminate\Support\Facades\Route;

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
Route::get('/blogpost/all', [BlogpostController::class, 'all'])->name('blogpost.all');
