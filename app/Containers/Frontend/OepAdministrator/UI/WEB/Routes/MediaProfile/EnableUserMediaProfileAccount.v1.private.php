<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\MediaProfileController;
use Illuminate\Support\Facades\Route;

Route::post('medios/habilitar/{id}', [MediaProfileController::class, 'enableAccount'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_profiles_enable_account')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
