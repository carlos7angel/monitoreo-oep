<?php

use App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers\UpdateCatalogController;
use Illuminate\Support\Facades\Route;

Route::get('catalogs/{id}/edit', [UpdateCatalogController::class, 'edit'])
    ->middleware(['auth:web']);
