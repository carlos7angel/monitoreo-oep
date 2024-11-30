<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::post('usuarios/dt', [UserManagementController::class, 'listJsonDt'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_users_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
