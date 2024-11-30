<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/olvidaste-tu-contrasena', [AuthController::class, 'showForgotPasswordPage'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_login_forgot_password')
    ->domain(parse_url(config('app.url'))['host']);
