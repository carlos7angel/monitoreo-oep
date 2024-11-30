<?php

use App\Containers\Frontend\Website\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/procesos-electorales/{id}/{slug}', [Controller::class, 'showElectionPage'])
    ->name('web_show_election');
