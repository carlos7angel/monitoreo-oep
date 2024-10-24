<?php

use App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers\DeleteRegistrationController;
use Illuminate\Support\Facades\Route;

Route::delete('registrations/{id}', [DeleteRegistrationController::class, 'destroy'])
    ->middleware(['auth:web']);

