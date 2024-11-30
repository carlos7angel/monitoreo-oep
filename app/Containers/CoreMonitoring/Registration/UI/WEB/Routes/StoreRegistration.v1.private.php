<?php

use App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers\CreateRegistrationController;
use Illuminate\Support\Facades\Route;

Route::post('registrations/store', [CreateRegistrationController::class, 'store'])
    ->middleware(['auth:web']);
