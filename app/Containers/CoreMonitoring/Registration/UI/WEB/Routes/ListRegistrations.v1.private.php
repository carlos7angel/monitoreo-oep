<?php

use App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers\ListRegistrationsController;
use Illuminate\Support\Facades\Route;

Route::get('registrations', [ListRegistrationsController::class, 'index'])
    ->middleware(['auth:web']);
