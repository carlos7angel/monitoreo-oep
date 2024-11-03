<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AnalysisReportController;
use Illuminate\Support\Facades\Route;

Route::post('monitoreo/reportes/{id}/analisis/nuevo', [AnalysisReportController::class, 'createAnalysis'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_analysis_report_create')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

