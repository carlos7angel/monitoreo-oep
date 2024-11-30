<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MonitoringDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/dashboard', [MonitoringDashboardController::class, 'showDashboardPage'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_dashboard_for_monitoring')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
