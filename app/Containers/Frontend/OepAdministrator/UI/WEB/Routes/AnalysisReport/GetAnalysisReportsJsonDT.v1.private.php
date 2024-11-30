<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AnalysisReportController;
use Illuminate\Support\Facades\Route;

Route::post('monitoreo/analisis/json', [AnalysisReportController::class, 'listJsonDt'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_analysis_report_list_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
