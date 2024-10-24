<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\PropagandaMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/registros/elecciones/{id}/material-propaganda', [PropagandaMaterialController::class, 'listMaterial'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_propaganda_material_by_election_list')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.admin_ext_url'))['host']);

