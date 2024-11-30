<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\PropagandaMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/registros/elecciones/{registration_id}/material-propaganda/{id}/editar', [PropagandaMaterialController::class, 'editMaterial'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_propaganda_material_edit')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);
