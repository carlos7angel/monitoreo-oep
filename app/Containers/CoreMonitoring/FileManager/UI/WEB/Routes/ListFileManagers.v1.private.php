<?php

use App\Containers\CoreMonitoring\FileManager\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('file-managers', [Controller::class, 'index'])
    ->middleware(['auth:web']);

