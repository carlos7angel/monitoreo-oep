<?php

use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers\FindAccreditationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('accreditations/{id}', [FindAccreditationByIdController::class, 'show'])
    ->middleware(['auth:web']);
