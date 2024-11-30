<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/actualizar-contrasena', [AuthController::class, 'updatePasswordProfile'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_update_password_profile')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
