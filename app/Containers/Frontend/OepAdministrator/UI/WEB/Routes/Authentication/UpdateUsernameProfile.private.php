<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/actualizar-usuario', [AuthController::class, 'updateUsernameProfile'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_update_username_profile')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

