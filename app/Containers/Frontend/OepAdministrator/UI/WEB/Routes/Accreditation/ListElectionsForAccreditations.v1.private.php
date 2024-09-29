<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('medios/procesos-electorales', [AccreditationController::class, 'listElectionsForAccreditation'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_elections_list_for_accreditation')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

