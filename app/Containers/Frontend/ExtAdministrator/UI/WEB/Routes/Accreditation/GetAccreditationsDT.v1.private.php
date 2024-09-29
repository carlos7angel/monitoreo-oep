<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::post('/acreditaciones/json', [AccreditationController::class, 'listAccreditationsJsonDt'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_accreditations_list_json_dt')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.admin_ext_url'))['host']);

