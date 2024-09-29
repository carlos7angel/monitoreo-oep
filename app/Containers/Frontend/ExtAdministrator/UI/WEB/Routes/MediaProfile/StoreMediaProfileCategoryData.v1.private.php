<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/medio-comunicacion/categoria', [MediaProfileController::class, 'storeCategoryData'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_media_profile_category_data_store')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.admin_ext_url'))['host']);

