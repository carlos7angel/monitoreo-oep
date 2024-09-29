<?php

use App\Containers\CoreMonitoring\FileManager\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('file-managers/store', [Controller::class, 'store'])
    ->middleware(['auth:web']);

