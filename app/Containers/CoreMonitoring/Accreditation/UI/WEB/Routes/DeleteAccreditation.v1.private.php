<?php

use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers\DeleteAccreditationController;
use Illuminate\Support\Facades\Route;

Route::delete('accreditations/{id}', [DeleteAccreditationController::class, 'destroy'])
    ->middleware(['auth:web']);
