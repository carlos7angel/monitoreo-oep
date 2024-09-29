<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::post('medios/nuevos/dt', [MediaProfileController::class, 'listNewJsonDt'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_profiles_json_dt_new')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);


