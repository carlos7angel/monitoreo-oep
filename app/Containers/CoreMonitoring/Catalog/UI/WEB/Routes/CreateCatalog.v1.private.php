<?php

use App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers\CreateCatalogController;
use Illuminate\Support\Facades\Route;

Route::get('catalogs/create', [CreateCatalogController::class, 'create'])
    ->middleware(['auth:web']);

