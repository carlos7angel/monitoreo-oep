<?php

use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers\UpdateAccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('accreditations/{id}/edit', [UpdateAccreditationController::class, 'edit'])
    ->middleware(['auth:web']);
