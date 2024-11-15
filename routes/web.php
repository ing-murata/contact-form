<?php

use Illuminate\Support\Facades\Route;

Route::get('/contact', function () {
    return view('contact.form');
})->name('contact.form');
