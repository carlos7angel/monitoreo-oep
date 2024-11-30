<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/ingreso', [AuthController::class, 'postLogin'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_post_login')
    ->domain(parse_url(config('app.url'))['host']);
