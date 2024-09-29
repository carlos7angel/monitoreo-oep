@extends('vendor@template::admin.layouts.auth')

@section('content')

    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
        <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('oep_admin_post_login') }}" method="post">
                {{ csrf_field() }}
                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">ADMINISTRADOR</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Ingreso al Sistema</div>
                </div>
                <div class="fv-row mb-8">
                    <input type="text" placeholder="Correo electrónico" name="email" value="admin@oep.com" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <div class="fv-row mb-3">
                    <input type="password" placeholder="Contraseña" name="password" autocomplete="off" value="admin" class="form-control bg-transparent" />
                </div>
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8 mt-5">
                    <div></div>
                    <a href="#" class="link-primary">¿Olvidó su contraseña?</a>
                </div>
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        <span class="indicator-label">Ingresar</span>
                        <span class="indicator-progress">Espere por favor...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="px-lg-10">
            <div class="fw-semibold text-primary text-center fs-base gap-5">
                <a href="#" target="_blank">¿Tienes problemas? Contáctate con soporte</a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/auth/login.js') }}"></script>
@endsection
