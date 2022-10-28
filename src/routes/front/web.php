<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.welcome');
});

Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__ . '/auth.php';
