<?php

use App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers\ListAnalysesController;
use Illuminate\Support\Facades\Route;

Route::get('analyses', [ListAnalysesController::class, 'index'])
    ->middleware(['auth:web']);

