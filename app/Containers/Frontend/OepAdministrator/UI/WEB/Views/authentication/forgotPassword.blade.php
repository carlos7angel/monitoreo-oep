@extends('vendor@template::admin.layouts.auth')

@section('content')

    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
        <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('oep_admin_login_forgot_password_post') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="reseturl" value="{{ $reseturl }}">
                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">¿Olvidaste tu contraseña?</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Ingresa tu correo para restablecer tu contraseña</div>
                </div>
                <div class="fv-row mb-8">
                    <input type="text" placeholder="Ingrese su correo electrónico" name="email" value="{{ old('email') }}" autocomplete="off" class="form-control bg-transparent"  />
                </div>
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                        <span class="indicator-label">Enviar</span>
                        <span class="indicator-progress">Espere por favor...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <a href="{{ route('oep_admin_login') }}" class="btn btn-light">Cancelar</a>
                </div>

            </form>
        </div>
        <div class="px-lg-10">
            <div class="fw-semibold text-primary text-center fs-base gap-5">
                <a href="#" target="_blank" rel="noopener">¿Tienes problemas? Contáctate con soporte</a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/auth/forgot-password.js') }}"></script>
@endsection
