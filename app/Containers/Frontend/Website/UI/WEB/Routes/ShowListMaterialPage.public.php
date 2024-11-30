<?php

use App\Containers\Frontend\Website\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/proceso-electoral/{id}/{slug}/material', [Controller::class, 'listMaterialPage'])
    ->name('web_show_list_material');
