<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringReportController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/reportes/{id}/elecciones/{election_id}/available-items', [MonitoringReportController::class, 'listAvailableMonitoringItems'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_monitoring_report_list_available_items')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
