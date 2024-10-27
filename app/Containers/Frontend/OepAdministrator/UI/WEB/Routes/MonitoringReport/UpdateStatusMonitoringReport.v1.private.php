<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringReportController;
use Illuminate\Support\Facades\Route;

Route::post('monitoreo/reportes/{id}/cambiar-estado', [MonitoringReportController::class, 'changeStatus'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_monitoring_report_change_status')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

