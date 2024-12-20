<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\FormBuilderController;
use Illuminate\Support\Facades\Route;

Route::post('formularios/{id}/field/{field_id}/editar', [FormBuilderController::class, 'updateFormField'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_form_builder_update_form_field')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
