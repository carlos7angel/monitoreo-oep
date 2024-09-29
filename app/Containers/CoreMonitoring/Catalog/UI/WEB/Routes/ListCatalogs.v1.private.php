<?php

use App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers\ListCatalogsController;
use Illuminate\Support\Facades\Route;

Route::get('catalogs', [ListCatalogsController::class, 'index'])
    ->middleware(['auth:web']);

