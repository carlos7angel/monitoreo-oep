<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('/acreditaciones/elecciones/activos', [ElectionController::class, 'listActiveElections'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_election_accreditations_active_elections_list_partial')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);
