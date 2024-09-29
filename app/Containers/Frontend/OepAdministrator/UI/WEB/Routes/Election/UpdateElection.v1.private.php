<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::post('elecciones/{id}/update', [ElectionController::class, 'update'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_elections_update')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

