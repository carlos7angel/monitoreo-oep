<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AnalysisReportController;
use Illuminate\Support\Facades\Route;

Route::post('monitoreo/analisis/{id}/rechazar', [AnalysisReportController::class, 'rejectAnalysis'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_analysis_report_reject')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
