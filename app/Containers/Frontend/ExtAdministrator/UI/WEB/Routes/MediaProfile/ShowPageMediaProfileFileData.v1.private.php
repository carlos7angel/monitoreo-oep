<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/medio-comunicacion/archivos', [MediaProfileController::class, 'showFileData'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_media_profile_file_data_show')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.admin_ext_url'))['host']);

