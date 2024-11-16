<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', [IndexController::class, 'index'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_index')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);

Route::get(config('app.admin_oep_prefix'), function() { return redirect()->route('oep_admin_index'); })
    ->middleware(['auth:external'])
    ->domain(parse_url(config('app.url'))['host']);
