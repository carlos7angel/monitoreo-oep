<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::post('/acreditaciones/enviar/{id}', [AccreditationController::class, 'submit'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_accreditations_submit')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);
