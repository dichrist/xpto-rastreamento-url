<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, UrlController};

Route::get('/', function () {
    return view('login.login');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/url', [UrlController::class, 'index']);
Route::get('/admin/url/create', [UrlController::class, 'create']);
