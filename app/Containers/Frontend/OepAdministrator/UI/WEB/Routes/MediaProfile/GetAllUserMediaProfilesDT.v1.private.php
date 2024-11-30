<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::post('medios/dt', [MediaProfileController::class, 'listJsonDt'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_profiles_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
