<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('/acreditaciones/', [AccreditationController::class, 'listAccreditations'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_accreditations_list')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);
