<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.admin_external_prefix'))->group(function () {
    Route::post('logout', [AuthController::class, 'postLogout'])
        ->name('ext_admin_post_logout')
        ->middleware(['auth:external'])
        ->domain(parse_url(config('app.url'))['host']);
});
