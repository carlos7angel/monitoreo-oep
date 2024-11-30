<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\PropagandaMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/registros/elecciones/{id}/material-propaganda/nuevo', [PropagandaMaterialController::class, 'createMaterial'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_propaganda_material_create')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);
