<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;

Route::post('monitoreo/procesos-electorales/{id}/registros/json', [MonitoringController::class, 'listMonitoringByElectionJsonDt'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_monitoring_by_election_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

