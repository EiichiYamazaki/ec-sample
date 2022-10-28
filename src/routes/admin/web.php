<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('/', function () {
return view('admin.welcome');
});

Route::get('/dashboard', function () {
return view('admin.dashboard');
})->middleware(['auth:admins'])->name('dashboard');

require __DIR__ . '/auth.php';
