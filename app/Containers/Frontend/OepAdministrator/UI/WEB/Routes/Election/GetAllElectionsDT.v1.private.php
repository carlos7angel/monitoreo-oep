<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::post('elecciones/dt', [ElectionController::class, 'listJsonDt'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_elections_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);


