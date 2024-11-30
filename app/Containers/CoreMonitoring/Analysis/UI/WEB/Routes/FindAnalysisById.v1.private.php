<?php

use App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers\FindAnalysisByIdController;
use Illuminate\Support\Facades\Route;

Route::get('analyses/{id}', [FindAnalysisByIdController::class, 'show'])
    ->middleware(['auth:web']);
