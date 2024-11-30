<?php

use App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers\UpdateRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('registrations/{id}/edit', [UpdateRegistrationController::class, 'edit'])
    ->middleware(['auth:web']);
