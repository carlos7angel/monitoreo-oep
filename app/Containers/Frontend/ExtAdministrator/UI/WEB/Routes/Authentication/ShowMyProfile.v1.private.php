<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.admin_external_prefix'))->group(function () {
    Route::get('/perfil', [AuthController::class, 'showMyProfile'])
        ->name('ext_admin_media_my_profile')
        ->middleware(['auth:external'])
        ->domain(parse_url(config('app.url'))['host']);
});