<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('elecciones/{id}/detalle', [ElectionController::class, 'detail'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_elections_detail')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
