<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/reporte/{id}/pdf', [MonitoringController::class, 'pdfMonitoring'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_monitoring_generate_pdf')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
