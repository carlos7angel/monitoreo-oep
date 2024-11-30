<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/restablecer-contrasena', [AuthController::class, 'showResetPasswordPage'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_login_reset_password')
    ->domain(parse_url(config('app.url'))['host']);
