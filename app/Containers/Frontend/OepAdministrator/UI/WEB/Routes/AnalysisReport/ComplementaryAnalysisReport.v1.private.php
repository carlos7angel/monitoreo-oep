<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AnalysisReportController;
use Illuminate\Support\Facades\Route;

Route::post('monitoreo/analisis/{id}/informe-complementario',
    [AnalysisReportController::class, 'complementaryAnalysis'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_analysis_report_complementary')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
