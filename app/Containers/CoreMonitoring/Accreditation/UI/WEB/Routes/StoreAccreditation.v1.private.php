<?php

use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers\CreateAccreditationController;
use Illuminate\Support\Facades\Route;

Route::post('accreditations/store', [CreateAccreditationController::class, 'store'])
    ->middleware(['auth:web']);

