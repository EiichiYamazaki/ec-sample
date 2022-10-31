<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('front.welcome'));

Route::get('/dashboard', fn () => view('front.dashboard'))->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
