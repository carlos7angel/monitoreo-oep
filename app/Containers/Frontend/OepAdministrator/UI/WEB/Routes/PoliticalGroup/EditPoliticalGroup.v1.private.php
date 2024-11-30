<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\PoliticalGroupProfileController;
use Illuminate\Support\Facades\Route;

Route::get('partidos-politicos/{id}/editar', [PoliticalGroupProfileController::class, 'edit'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_political_group_edit')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
