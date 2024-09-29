<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/home', HomePageController::class)
    ->name('home-page');
