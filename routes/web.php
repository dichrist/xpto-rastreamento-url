<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{HomeController, UrlController, UserController};

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::get('/login', [UserController::class, 'index'])->name('login');

Route::post('/create/user', [UserController::class, 'store'])->name('user.store');
Route::post('/login', [UserController::class, 'login'])->name('user.auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/url', [UrlController::class, 'index'])->name('urls.view');
    Route::get('/admin/url/create', [UrlController::class, 'create'])->name('url.create');
    Route::get('/admin/url/request', [UrlController::class, 'getUpdatedDataUrl'])->name('url.request');
    Route::get('/admin/url/{id}', [UrlController::class, 'show'])->name('url.details');

    Route::post('/admin/url/submit', [UrlController::class, 'store'])->name('url.store');
});
