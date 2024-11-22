<?php

use App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/medio-comunicacion/contacto', [MediaProfileController::class, 'showContactData'])
    ->prefix(config('app.admin_external_prefix'))
    ->name('ext_admin_media_profile_contact_data_show')
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);

