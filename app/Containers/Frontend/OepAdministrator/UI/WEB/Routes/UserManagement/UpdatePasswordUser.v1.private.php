<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::post('usuarios/{id}/password', [UserManagementController::class, 'updatePassword'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_users_update_password')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
