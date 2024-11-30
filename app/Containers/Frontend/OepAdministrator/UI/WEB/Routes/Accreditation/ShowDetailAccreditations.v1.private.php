<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('medios/acreditaciones/{id}', [AccreditationController::class, 'detailAccreditation'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_accreditation_detail')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
