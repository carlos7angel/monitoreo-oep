<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::post('medios/procesos-electorales/json',
    [AccreditationController::class, 'listElectionsForAccreditationJsonDt'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_elections_list_for_accreditation_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
