<?php

use App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers\UpdateRegistrationController;
use Illuminate\Support\Facades\Route;

Route::patch('registrations/{id}', [UpdateRegistrationController::class, 'update'])
    ->middleware(['auth:web']);

