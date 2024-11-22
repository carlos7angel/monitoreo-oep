<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/medio-comunicacion/general', [MediaProfileController::class, 'storeGeneralData'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_media_profile_general_data_store')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

