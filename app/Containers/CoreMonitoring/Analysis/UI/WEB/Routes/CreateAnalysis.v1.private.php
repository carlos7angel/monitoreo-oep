<?php

use App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers\CreateAnalysisController;
use Illuminate\Support\Facades\Route;

Route::get('analyses/create', [CreateAnalysisController::class, 'create'])
    ->middleware(['auth:web']);

