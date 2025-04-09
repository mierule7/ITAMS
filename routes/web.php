<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwoFactorAuthController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // 2FA Routes
    Route::get('/2fa/setup', [TwoFactorAuthController::class, 'setup'])->name('2fa.setup');
    Route::post('/2fa/enable', [TwoFactorAuthController::class, 'enable'])->name('2fa.enable');
    Route::post('/2fa/disable', [TwoFactorAuthController::class, 'disable'])->name('2fa.disable');

    // 2FA Verification
    Route::get('/2fa/verify', [TwoFactorAuthController::class, 'verify'])->name('2fa.verify');
    Route::post('/2fa/authenticate', [TwoFactorAuthController::class, 'authenticate'])->name('2fa.authenticate');
});

Route::get('/', function () {
    return view('welcome');
});
