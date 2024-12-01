<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;

Route::get(
    'monitoreo/procesos-electorales/{election_id}/registro-monitoreo/{id}/editar',
    [MonitoringController::class, 'editMonitoring']
)
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_monitoring_edit')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
