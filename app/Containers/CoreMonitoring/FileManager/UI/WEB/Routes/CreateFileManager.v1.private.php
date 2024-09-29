<?php

use App\Containers\CoreMonitoring\FileManager\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('file-managers/create', [Controller::class, 'create'])
    ->middleware(['auth:web']);

