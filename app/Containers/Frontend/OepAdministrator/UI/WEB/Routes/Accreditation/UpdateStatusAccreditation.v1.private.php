<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::post('medios/acreditaciones/{id}/cambiar-estado', [AccreditationController::class, 'updateStatusAccreditation'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_accreditation_update_status')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
