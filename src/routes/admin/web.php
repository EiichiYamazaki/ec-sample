<?php

declare(strict_types=1);

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admins')->group(function (): void {
    Route::get('/', fn () => view('admin.welcome'));
    Route::get('login', [Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [Admin\Auth\AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [Admin\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [Admin\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [Admin\Auth\NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [Admin\Auth\NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth:admins')->group(function (): void {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    Route::get('register', [Admin\Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [Admin\Auth\RegisteredUserController::class, 'store']);
//    Route::get('verify-email', [Admin\Auth\EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
//    Route::get('verify-email/{id}/{hash}', [Admin\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify')->name('verification.send');
    Route::get('confirm-password', [Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [Admin\Auth\ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('item', [Admin\ItemController::class, 'index'])->name('item.index');
    Route::get('item/create', [Admin\ItemController::class, 'create'])->name('item.create');
    Route::post('item/create', [Admin\ItemController::class, 'store'])->name('item.store');
    Route::get('item/edit/{id}', [Admin\ItemController::class, 'edit'])->name('item.edit');
    Route::post('item/update/{id}', [Admin\ItemController::class, 'update'])->name('item.update');
});
