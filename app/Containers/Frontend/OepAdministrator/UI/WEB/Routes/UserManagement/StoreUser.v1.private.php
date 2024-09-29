<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::post('usuarios', [UserManagementController::class, 'store'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_users_store')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

