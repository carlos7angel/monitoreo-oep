@extends('vendor@template::admin.layouts.master', ['page' => 'form_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">{{ $form->name }}</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Formularios</li>
            <li class="breadcrumb-item text-gray-500">FormBuilder</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
{{--        <a href="javascript:void(0)" class="btn btn-primary px-5" id="kt_button_new_form"><i class="ki-outline ki-add-files me-2 fs-3"></i> Guardar</a>--}}
    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="d-flex flex-column flex-lg-row">


            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <h3 class="mb-8">Componentes</h3>

                        @foreach($field_types as $field)
                        <button type="button" class="btn btn-primary btn-sm fw-semibold w-100 mb-2 d-flex justify-content-start text-start kt_add_field_type_form"
                                data-url="{{ route('oep_admin_form_builder_create_field_type', ['id' => $form->id]) }}" data-field-id="{{ $field->id }}">
                            <div class="w-25px me-2 text-center">
                                <i class="fa {{ $field->icon }} fs-4"></i>
                            </div>
                            <span>{{ $field->name }}</span>
                        </button>
                        @endforeach

                    </div>
                </div>
            </div>

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-body px-lg-18__ py-lg-15__">

                        <div class="dragula-container kt_wrapper_form_builder_fields p-10 border-dashed rounded-2"
                             data-form-id="{{ $form->id }}" data-url="{{ route('oep_admin_form_sort', ['id' => $form->id]) }}">
                            @include('frontend@oepAdministrator::formBuilder.partials.listFields')
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Content-->

        </div>

    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_edit_form_field" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" id="kt_content_form_field_form">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/dragula/dragula.min.css') }}" media="all" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('themes/common/plugins/custom/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/forms/builder.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/forms/builder-draggable.js') }}"></script>
@endsection