<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::post('/registros/elecciones/json', [RegistrationController::class, 'listRegistrationsJsonDt'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_registration_elections_list_json_dt')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

