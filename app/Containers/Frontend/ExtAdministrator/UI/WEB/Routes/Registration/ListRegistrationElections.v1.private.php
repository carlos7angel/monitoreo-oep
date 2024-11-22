<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/registros/elecciones', [RegistrationController::class, 'listRegistrations'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_registration_elections_list')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

