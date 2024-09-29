<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\IndexRequest;
use App\Ship\Parents\Controllers\WebController;

class IndexController extends WebController
{
    public function index(IndexRequest $request)
    {
        $page_title = "Inicio";
        return view('frontend@oepAdministrator::index', [], compact('page_title'));
    }
}
