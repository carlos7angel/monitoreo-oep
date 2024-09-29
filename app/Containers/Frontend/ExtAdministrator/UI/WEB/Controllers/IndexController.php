<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\IndexRequest;
use App\Ship\Parents\Controllers\WebController;

class IndexController extends WebController
{
    public function index(IndexRequest $request)
    {
        return redirect()->route('ext_admin_media_profile_general_data_show');
        // $page_title = "Inicio";
        // return view('frontend@extAdministrator::index', [], compact('page_title'));
    }
}
