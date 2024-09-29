<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('/acreditaciones/nuevo', [AccreditationController::class, 'newAccreditation'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_accreditations_new')
    ->middleware(['auth:external', 'checkProfile'])
    ->domain(parse_url(config('app.url'))['host']);

