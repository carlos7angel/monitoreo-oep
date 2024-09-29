<?php

use App\Containers\CoreMonitoring\FileManager\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('file-managers/{id}', [Controller::class, 'destroy'])
    ->middleware(['auth:web']);

