<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('elecciones/{id}/editar', [ElectionController::class, 'edit'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_elections_edit')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
