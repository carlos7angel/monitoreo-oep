<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/perfil', [AuthController::class, 'showMyProfile'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_my_profile')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
