<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::get('medios/nuevos', [MediaProfileController::class, 'listNew'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_profiles_list_new')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
