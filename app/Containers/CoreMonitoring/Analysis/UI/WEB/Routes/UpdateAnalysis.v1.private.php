<?php

use App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers\UpdateAnalysisController;
use Illuminate\Support\Facades\Route;

Route::patch('analyses/{id}', [UpdateAnalysisController::class, 'update'])
    ->middleware(['auth:web']);

