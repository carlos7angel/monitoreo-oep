<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/logout', [AuthController::class, 'postLogout'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_post_logout')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

