<?php

use App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers\DeleteCatalogController;
use Illuminate\Support\Facades\Route;

Route::delete('catalogs/{id}', [DeleteCatalogController::class, 'destroy'])
    ->middleware(['auth:web']);
