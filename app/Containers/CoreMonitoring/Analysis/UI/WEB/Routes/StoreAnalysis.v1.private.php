<?php

use App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers\CreateAnalysisController;
use Illuminate\Support\Facades\Route;

Route::post('analyses/store', [CreateAnalysisController::class, 'store'])
    ->middleware(['auth:web']);

