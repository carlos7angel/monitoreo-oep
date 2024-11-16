@php
    if(! isset($page)) {
        $page = null;
    }
@endphp
<!--begin::Header-->
<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                <i class="ki-outline ki-abstract-14 fs-2"></i>
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <a>
                <img alt="Logo" src="{{ asset('themes/common/media/logos/logo_oep_h.png') }}" class="h-20px d-lg-none" />
                <img alt="Logo" src="{{ asset('themes/common/media/logos/logo_oep_h.png') }}" class="h-35px d-none d-lg-inline app-sidebar-logo-default theme-light-show" />
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">

                    @hasrole('user_media')
                    <a href="{{ route('ext_admin_media_profile_general_data_show') }}" class="menu-item {{ in_array($page, ['media_data']) ? 'here' : '' }} menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Medio de Comunicación</span>
                        </span>
                    </a>

                    <a href="{{ route('ext_admin_accreditations_list') }}" class="menu-item {{ in_array($page, ['media_accreditations']) ? 'here' : '' }} menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Acreditaciones Procesos Electorales</span>
                        </span>
                    </a>
                    @endhasrole
                    @hasrole('user_political')
                    <a href="{{ route('ext_admin_registration_elections_list') }}" class="menu-item {{ in_array($page, ['political_group_registrations']) ? 'here' : '' }} menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Propaganda Electoral</span>
                        </span>
                    </a>
                    @endhasrole
                </div>
            </div>
            <div class="app-navbar flex-shrink-0">
                <div class="app-navbar-item ms-3 ms-lg-5" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-circle symbol-35px symbol-md-45px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        @if(Auth::guard('external')->user()->profile_data->logo)
                            <img class="symbol symbol-circle symbol-35px symbol-md-45px" src="{{ asset('/themes/common/media/images/user_blank.png')  }}" alt="Usuario" />
                        @else
                            <div class="symbol symbol-35px me-3">
                                <div class="symbol-label bg-light-info border-1 border-dashed border-primary">
                                    <span class="text-primary">{{ strtoupper(substr(Auth::guard('external')->user()->profile_data->name, 0, 1)) }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">

                                @if(Auth::guard('external')->user()->profile_data->logo)
                                    <div class="symbol symbol-50px me-5">
                                        <div class="w-50px h-50px" style="background-image: url({{ asset('storage') . Auth::guard('external')->user()->profile_data->logo}});
                                                background-size: cover; background-position: center"></div>
                                        {{--<img alt="Logo Medio" src="{{ asset('storage') . Auth::guard('external')->user()->profile_data->logo}}" />--}}
                                    </div>
                                @else
                                    <div class="symbol symbol-50px me-5">
                                        <div class="symbol-label bg-light-info">
                                            <span class="text-primary">{{ strtoupper(substr(Auth::guard('external')->user()->name, 0, 1)) }}</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-start flex-column fs-5">
                                        <span>{{ Auth::guard('external')->user()->name }}</span>
                                        <div class="d-block badge badge-info fw-bold fs-8 px-2 py-1">{{ Auth::guard('external')->user()->roles->first()->display_name }}</div>
                                    </div>
                                    <a class="fw-semibold text-muted text-hover-primary fs-7 mt-2">{{ Auth::guard('external')->user()->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="{{ route('ext_admin_media_my_profile') }}" class="menu-link px-5">Mi Perfil</a>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link px-5">Salir</a>
                            <form id="logout-form" action="{{ route('ext_admin_post_logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Header-->