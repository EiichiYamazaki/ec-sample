<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;

Route::middleware('guest')->group(function () {
    Route::get('register', [Front\Auth\RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [Front\Auth\RegisteredUserController::class, 'store']);

    Route::get('login', [Front\Auth\AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [Front\Auth\AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [Front\Auth\PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [Front\Auth\PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [Front\Auth\NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [Front\Auth\NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth:users')->group(function () {
    Route::get('verify-email', [Front\Auth\EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [Front\Auth\VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [Front\Auth\EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [Front\Auth\ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [Front\Auth\ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [Front\Auth\AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
