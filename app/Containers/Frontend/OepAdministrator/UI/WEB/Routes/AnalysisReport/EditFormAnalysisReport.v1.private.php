<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AnalysisReportController;
use Illuminate\Support\Facades\Route;

Route::get('monitoreo/analisis/{id}/formulario', [AnalysisReportController::class, 'editFormAnalysis'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_analysis_report_form_edit')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
