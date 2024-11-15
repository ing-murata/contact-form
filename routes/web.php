<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/contact', function () {
    return view('contact.form');
})->name('contact.form');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // ログイン画面
Route::post('/login', [AuthController::class, 'login']); // ログイン処理
