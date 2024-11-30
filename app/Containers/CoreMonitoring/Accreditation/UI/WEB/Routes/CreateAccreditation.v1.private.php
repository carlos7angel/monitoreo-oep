<?php

use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers\CreateAccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('accreditations/create', [CreateAccreditationController::class, 'create'])
    ->middleware(['auth:web']);
