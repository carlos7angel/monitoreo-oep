<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/procesos-electorales', [MonitoringController::class, 'listElectionsForMonitoring'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_elections_list_for_monitoring')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

