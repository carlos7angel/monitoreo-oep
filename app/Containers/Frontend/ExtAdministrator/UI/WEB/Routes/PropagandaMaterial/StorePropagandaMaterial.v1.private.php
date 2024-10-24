<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\PropagandaMaterialController;
use Illuminate\Support\Facades\Route;

Route::post('/registros/elecciones/{id}/material-propaganda/guardar', [PropagandaMaterialController::class, 'storeMaterial'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_propaganda_material_store')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

