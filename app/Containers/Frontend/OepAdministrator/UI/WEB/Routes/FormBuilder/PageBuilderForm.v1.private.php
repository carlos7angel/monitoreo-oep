<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\FormBuilderController;
use Illuminate\Support\Facades\Route;

Route::get('formularios/{id}/constructor', [FormBuilderController::class, 'showBuilderPage'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_form_builder')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
