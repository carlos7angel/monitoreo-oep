<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.admin_external_prefix'))->group(function () {
    Route::get('ingreso', [AuthController::class, 'showLoginPage'])
        ->name('ext_admin_login')
        ->domain(parse_url(config('app.url'))['host']);
});
