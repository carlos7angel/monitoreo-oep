<?php

use App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers\DeleteAnalysisController;
use Illuminate\Support\Facades\Route;

Route::delete('analyses/{id}', [DeleteAnalysisController::class, 'destroy'])
    ->middleware(['auth:web']);
