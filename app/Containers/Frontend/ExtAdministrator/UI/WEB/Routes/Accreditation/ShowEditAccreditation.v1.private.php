<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('/acreditaciones/editar/{id}', [AccreditationController::class, 'editAccreditation'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_accreditations_edit')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

