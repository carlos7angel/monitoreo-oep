<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\PropagandaMaterialController;
use Illuminate\Support\Facades\Route;

Route::post('/registros/elecciones/{registration_id}/material-propaganda/{id}/eliminar', [PropagandaMaterialController::class, 'deleteMaterial'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_propaganda_material_delete')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

