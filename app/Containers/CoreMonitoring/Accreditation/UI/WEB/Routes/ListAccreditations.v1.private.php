<?php

use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers\ListAccreditationsController;
use Illuminate\Support\Facades\Route;

Route::get('accreditations', [ListAccreditationsController::class, 'index'])
    ->middleware(['auth:web']);

