<?php

use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers\UpdateAccreditationController;
use Illuminate\Support\Facades\Route;

Route::patch('accreditations/{id}', [UpdateAccreditationController::class, 'update'])
    ->middleware(['auth:web']);

