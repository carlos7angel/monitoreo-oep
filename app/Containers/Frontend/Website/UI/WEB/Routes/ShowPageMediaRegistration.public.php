<?php

use App\Containers\Frontend\Website\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('registro-medios', [Controller::class, 'showFormMedia'])
    ->name('web_form_media');
