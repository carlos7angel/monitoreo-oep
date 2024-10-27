<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringReportController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/reportes/eleccions-habilitadas', [MonitoringReportController::class, 'showElections'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('ext_admin_monitoring_report_show_active_elections_partial')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

