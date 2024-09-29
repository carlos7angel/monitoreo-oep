<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\FormBuilder\Actions\CreateFormAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\GetAllFormsJsonDataTableAction;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\GetAllFormsDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\ListFormsRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\StoreFormRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class FormBuilderController extends WebController
{
    public function list(ListFormsRequest $request)
    {
        $page_title = "Formularios Dinámicos";
        return view('frontend@oepAdministrator::formBuilder.list', [], compact('page_title'));
    }

    public function listJsonDt(GetAllFormsDataTableRequest $request)
    {
        try {
            $data = app(GetAllFormsJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function store(StoreFormRequest $request)
    {
        try {
            $form = app(CreateFormAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('oep_admin_forms')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
