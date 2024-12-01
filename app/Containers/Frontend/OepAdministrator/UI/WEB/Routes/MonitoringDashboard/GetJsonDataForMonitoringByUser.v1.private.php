<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/dashboard/json/monitoreo-usuarios/{id}',
    [MonitoringDashboardController::class, 'jsonMonitoringByUser'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_dashboard_json_monitoring_user')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
