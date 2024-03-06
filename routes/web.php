<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\SettingsController;
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

Route::redirect('/', '/blogpost', 308);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/blogpost', [BlogpostController::class, 'index'])->name('blogpost.index');
    Route::get('/blogpost/create', [BlogpostController::class, 'create'])->name('blogpost.create');
    Route::get('/blogpost/{id}', [BlogpostController::class, 'show'])->name('blogpost.show');
    Route::post('/blogpost/store', [BlogpostController::class, 'store'])->name('blogpost.store');
    Route::post('/upload/{id}', [UploadController::class, 'store'])->name('upload.store');
    Route::delete('/blogpost/delete/{id}', [BlogpostController::class, 'delete'])->name('blogpost.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::patch('/settings/password', [SettingsController::class, 'changePassword'])->name('settings.password');
    Route::patch('/settings/oauth/password', [SettingsController::class, 'createOAuthPassword'])
        ->name('settings.oauth');
    Route::delete('/settings', [SettingsController::class, 'destroy'])->name('settings.delete');
});

Auth::routes([
    'verify' => true,
]);

Route::get('/auth/{provider}/redirect', [OAuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [OAuthController::class, 'callback']);
