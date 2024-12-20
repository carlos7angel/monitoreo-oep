<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\FormBuilderController;
use Illuminate\Support\Facades\Route;

Route::get('formularios', [FormBuilderController::class, 'list'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_forms')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
