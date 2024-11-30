<?php

use App\Containers\Frontend\Website\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('registro-medios', [Controller::class, 'storeFormMedia'])
    ->name('web_form_media_store');
