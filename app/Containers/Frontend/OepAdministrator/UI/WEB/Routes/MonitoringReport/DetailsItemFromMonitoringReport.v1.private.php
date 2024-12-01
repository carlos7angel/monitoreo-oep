<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringReportController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/reportes/{id}/item/{monitoring_item_id}/detalle',
    [MonitoringReportController::class, 'detailItem'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_monitoring_report_details_item')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
