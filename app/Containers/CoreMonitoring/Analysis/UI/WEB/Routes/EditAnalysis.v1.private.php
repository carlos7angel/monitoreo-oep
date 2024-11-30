<?php

use App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers\UpdateAnalysisController;
use Illuminate\Support\Facades\Route;

Route::get('analyses/{id}/edit', [UpdateAnalysisController::class, 'edit'])
    ->middleware(['auth:web']);
