<?php

use App\Containers\CoreMonitoring\FileManager\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('file-managers/{id}', [Controller::class, 'update'])
    ->middleware(['auth:web']);
