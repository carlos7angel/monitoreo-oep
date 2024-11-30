<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/procesos-electorales/{id}/registros', [MonitoringController::class, 'listMonitoringByElection'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_monitoring_by_election')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
