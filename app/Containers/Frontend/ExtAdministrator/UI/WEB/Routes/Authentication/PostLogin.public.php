<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.admin_external_prefix'))->group(function () {
    Route::post('ingreso', [AuthController::class, 'postLogin'])
        ->name('ext_admin_post_login')
        ->domain(parse_url(config('app.url'))['host']);
});
