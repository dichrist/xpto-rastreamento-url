<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, UrlController};

Route::get('/', function () {
    return view('login.login');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/url', [UrlController::class, 'index'])->name('url.view');
Route::get('/admin/url/create', [UrlController::class, 'create'])->name('url.create');
Route::get('/admin/url/{id}', [UrlController::class, 'show'])->name('url.details');

Route::post('/submit', [UrlController::class, 'store'])->name('url.store');

Route::delete('/admin/url/delete/{id}', [UrlController::class, 'destroy'])->name('url.delete');