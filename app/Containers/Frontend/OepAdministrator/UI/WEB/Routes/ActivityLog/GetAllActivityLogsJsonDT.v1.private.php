<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;

Route::post('logs/json', [ActivityLogController::class, 'listJsonDT'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_activity_logs_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
