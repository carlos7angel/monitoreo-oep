<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\PoliticalGroupProfileController;
use Illuminate\Support\Facades\Route;

Route::post('partidos-politicos/{id}/registro/eleccion', [PoliticalGroupProfileController::class, 'registerElection'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_political_group_register_election')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
