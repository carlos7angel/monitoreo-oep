<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('elecciones', [ElectionController::class, 'list'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_elections_list')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

