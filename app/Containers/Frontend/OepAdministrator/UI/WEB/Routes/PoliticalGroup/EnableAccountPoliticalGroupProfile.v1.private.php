<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\PoliticalGroupProfileController;
use Illuminate\Support\Facades\Route;

Route::post('partidos-politicos/{id}/cuenta/habilitar', [PoliticalGroupProfileController::class, 'enableAccount'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_political_group_profile_enable_account')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);