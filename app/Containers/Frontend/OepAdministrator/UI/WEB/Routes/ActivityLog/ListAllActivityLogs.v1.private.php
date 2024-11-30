<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;

Route::get('logs', [ActivityLogController::class, 'list'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_activity_logs')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
