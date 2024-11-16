<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.admin_external_prefix'))->group(function () {
    Route::post('/actualizar-usuario', [AuthController::class, 'updateUsernameProfile'])
        ->name('ext_admin_media_update_username_profile')
        ->middleware(['auth:external'])
        ->domain(parse_url(config('app.admin_ext_url'))['host']);
});
