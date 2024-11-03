<?php

use App\Containers\Frontend\Website\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/proceso-electoral/{id}/{slug}/medios', [Controller::class, 'listAccreditationRatesPage'])
    ->name('web_show_list_accreditation_rates');

