<?php

use App\Containers\CoreMonitoring\FileManager\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('file-managers/{id}/edit', [Controller::class, 'edit'])
    ->middleware(['auth:web']);
