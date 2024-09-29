<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::post('elecciones/{id}/cambiar-estado', [ElectionController::class, 'updateStatus'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_elections_update_status')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);