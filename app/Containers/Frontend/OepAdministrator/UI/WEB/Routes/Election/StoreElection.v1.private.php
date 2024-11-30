<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::post('elecciones/guardar', [ElectionController::class, 'store'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_elections_store')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
