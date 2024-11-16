@extends('vendor@template::admin.layouts.master', ['page' => 'my_profile'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">Mi Perfil</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-500">Mi Perfil</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">

                    <div class="card-body">

                        <div class="d-flex flex-center flex-column py-5">
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="{{ asset('themes/common/media/images/blank-user.jpg') }}" alt="Usuario" />
                            </div>
                            <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $user->name }}</a>
                            <div class="mb-9">
                                <span class="text-muted">Rol:</span> <div class="badge badge-lg badge-light-primary d-inline">{{ $user->roles->first()->display_name }}</div>
                            </div>

                            <div class="py-5__ fs-6 text-center w-100">
                                <div class="fw-bold mt-5">Estado:</div>
                                <div>
                                    @if($user->active)
                                        <div class="badge badge-lg badge-success d-inline">Activo</div>
                                    @else
                                        <div class="badge badge-lg badge-danger d-inline">Inactivo</div>
                                    @endif
                                </div>
                                <div class="fw-bold mt-5">Alta:</div>
                                <div class="text-gray-600">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d/m/Y H:i A') }}</div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="flex-lg-row-fluid ms-lg-15">

                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Cuenta de Usuario</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                <tr>
                                    <td>Nombre de usuario</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" id="kt_handle_modal_update_username">
                                            <i class="ki-duotone ki-pencil fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Correo</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-end">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contraseña</td>
                                    <td>*******</td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" id="kt_handle_modal_update_password">
                                            <i class="ki-duotone ki-pencil fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rol</td>
                                    <td>{{ $user->roles->first()->display_name }}</td>
                                    <td class="text-end">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title flex-column">
                            <h2>Notificaciones</h2>
                            <div class="fs-6 fw-semibold text-muted"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" id="kt_users_email_notification_form">
                            <div class="d-flex mb-7">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" name="email_notification_0" type="checkbox" value="0" id="kt_modal_update_email_notification_0" checked='checked'
                                    disabled readonly/>
                                    <label class="form-check-label" for="kt_modal_update_email_notification_0">
                                        <div class="fw-bold">Recibir correos</div>
                                        <div class="text-gray-600">Recibir notificaciones mediante correo electrónico.</div>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content" id="kt_wrapper_modal_content_update_password">
                <div class="modal-header">
                    <h2 class="fw-bold">Actualizar Contraseña</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_update_password_form" class="form" method="post" action="{{ route('oep_admin_update_password_profile') }}" autocomplete="off">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-semibold fs-6 mb-2">Nueva Contraseña</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control" type="password" placeholder="" name="password" autocomplete="off" />
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="ki-duotone ki-eye-slash fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                        <i class="ki-duotone ki-eye d-none fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                            <div class="text-muted">Use 8 o más caracteres con una mezcla de letras, números y símbolos.</div>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Confirmar Contraseña</label>
                            <input class="form-control" type="password" placeholder="" name="confirm_password" autocomplete="off" />
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cerrar</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_update_username" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content" id="kt_wrapper_modal_content_update_username">
                <div class="modal-header">
                    <h2 class="fw-bold">Actualizar Nombre de Usuario</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_update_username_form" class="form" method="post" action="{{ route('oep_admin_update_username_profile') }}" autocomplete="off">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Nombre de Usuario</label>
                            <input class="form-control" type="text" placeholder="" name="username" autocomplete="off" />
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cerrar</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/users/my-profile.js') }}"></script>
@endsection