<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.admin_external_prefix'))->group(function () {
    Route::get('restablecer-contrasena', [AuthController::class, 'showResetPasswordPage'])
        ->name('ext_admin_reset_password')
        ->domain(parse_url(config('app.url'))['host']);
});
