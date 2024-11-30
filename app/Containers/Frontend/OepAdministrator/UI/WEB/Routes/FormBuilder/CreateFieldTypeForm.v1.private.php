<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\FormBuilderController;
use Illuminate\Support\Facades\Route;

Route::post('formularios/{id}/field', [FormBuilderController::class, 'createFieldType'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_form_builder_create_field_type')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
