<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Catalog\Tasks\ListCatalogsTask;
use App\Containers\CoreMonitoring\FormBuilder\Actions\CreateFieldFormAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\CreateFormAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\DeleteFieldFormAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\FindFormByIdAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\GetAllFieldTypesAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\GetAllFormsJsonDataTableAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\SortFieldsByFormAction;
use App\Containers\CoreMonitoring\FormBuilder\Actions\UpdateFieldFormAction;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFieldByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GetFieldsByFormTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\CreateFieldTypeFormRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\DeleteFieldFormRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\EditFormFieldRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\GetAllFormsDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\ListFormsRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\ShowBuilderPageRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\SortFieldFormRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\StoreFormRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder\UpdateFieldFormRequest;
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
            return response()->json(['success' => true, 'redirect' => route('oep_admin_form_builder', ['id' => $form->id])]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showBuilderPage(ShowBuilderPageRequest $request)
    {
        $page_title = "Constructor de Formularios";
        $form = app(FindFormByIdAction::class)->run($request);
        $field_types = app(GetAllFieldTypesAction::class)->run($request);
        $form_fields = app(GetFieldsByFormTask::class)->run($form->id);
        return view('frontend@oepAdministrator::formBuilder.builder', ['form' => $form, 'field_types' => $field_types, 'fields' => $form_fields], compact('page_title'));
    }

    public function createFieldType(CreateFieldTypeFormRequest $request)
    {
        try {
            $field = app(CreateFieldFormAction::class)->run($request);
            $form_fields = app(GetFieldsByFormTask::class)->run($field->fid_form);
            $render = view('frontend@oepAdministrator::formBuilder.partials.listFields')->with([
                'fields' => $form_fields,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function editFormField(EditFormFieldRequest $request)
    {
        try {
            $field = app(FindFieldByIdTask::class)->run($request->field_id);
            $catalogs = app(ListCatalogsTask::class)->run(true);
            $render = view('frontend@oepAdministrator::formBuilder.partials.editField')->with([
                'field' => $field,
                'catalogs' => $catalogs
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updateFormField(UpdateFieldFormRequest $request)
    {
        try {
            $field = app(UpdateFieldFormAction::class)->run($request);
            $form_fields = app(GetFieldsByFormTask::class)->run($field->fid_form);
            $render = view('frontend@oepAdministrator::formBuilder.partials.listFields')->with([
                'fields' => $form_fields,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function deleteFormField(DeleteFieldFormRequest $request)
    {
        try {
            app(DeleteFieldFormAction::class)->run($request);
            $form_fields = app(GetFieldsByFormTask::class)->run($request->id);
            $render = view('frontend@oepAdministrator::formBuilder.partials.listFields')->with([
                'fields' => $form_fields,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function sortFormFields(SortFieldFormRequest $request)
    {
        try {
            app(SortFieldsByFormAction::class)->run($request);
            return response()->json(['success' => true, 'data' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
