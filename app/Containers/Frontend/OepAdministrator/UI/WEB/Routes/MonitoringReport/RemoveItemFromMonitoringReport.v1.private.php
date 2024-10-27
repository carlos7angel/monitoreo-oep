<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringReportController;
use Illuminate\Support\Facades\Route;

Route::post('monitoreo/reportes/{id}/item/{monitoring_item_id}/remover', [MonitoringReportController::class, 'removeItem'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_monitoring_report_remove_item')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

