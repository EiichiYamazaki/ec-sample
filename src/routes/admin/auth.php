<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::middleware('guest')->group(function () {
    Route::get('login', [Admin\Auth\AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [Admin\Auth\AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [Admin\Auth\PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [Admin\Auth\PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [Admin\Auth\NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [Admin\Auth\NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth:admins')->group(function () {
    Route::get('register', [Admin\Auth\RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [Admin\Auth\RegisteredUserController::class, 'store']);

    Route::get('verify-email', [Admin\Auth\EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [Admin\Auth\VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [Admin\Auth\EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [Admin\Auth\ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [Admin\Auth\ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [Admin\Auth\AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
