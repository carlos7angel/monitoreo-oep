<?php

use App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers\CreateRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('registrations/create', [CreateRegistrationController::class, 'create'])
    ->middleware(['auth:web']);

