<?php

use App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers\FindRegistrationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('registrations/{id}', [FindRegistrationByIdController::class, 'show'])
    ->middleware(['auth:web']);
