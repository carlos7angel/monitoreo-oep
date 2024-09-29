<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('/acreditaciones/detalle/{id}', [AccreditationController::class, 'detailAccreditation'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_accreditations_detail')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

