<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.admin_external_prefix'))->group(function () {
    Route::get('inicio', [IndexController::class, 'index'])
        ->name('ext_admin_index')
        ->middleware(['auth:external'])
        ->domain(parse_url(config('app.url'))['host']);
});
