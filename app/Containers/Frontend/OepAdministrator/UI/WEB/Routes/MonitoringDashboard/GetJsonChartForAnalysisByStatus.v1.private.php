<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringDashboardController;
use Illuminate\Support\Facades\Route;

Route::get(
    'monitoreo/dashboard/json/analisis-estado/{id}',
    [MonitoringDashboardController::class, 'jsonAnalysisByStatus']
)
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_dashboard_json_analysis_status')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
