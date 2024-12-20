@php
    if(! isset($page)) {
        $page = null;
    }
@endphp
<div id="kt_header" class="header">
    <div class="header-top d-flex align-items-stretch flex-grow-1">
        <div class="d-flex container-xxl align-items-stretch">
            <div class="d-flex align-items-center align-items-lg-stretch me-5 flex-row-fluid">
                <button class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n3 me-2" id="kt_header_navs_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
                <a href="{{ route('oep_admin_index') }}" class="d-flex align-items-center">
                    <img alt="Logo" src="{{ asset('themes/common/media/logos/logo_oep_h.png') }}" class="h-25px h-lg-30px" />
                </a>
                <div class="align-self-end overflow-auto" id="kt_brand_tabs">
                    <div class="header-tabs overflow-auto mx-4 ms-lg-10 mb-5 mb-lg-0" id="kt_header_tabs" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
                        <ul class="nav flex-nowrap text-nowrap">
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($page, ['dashboard']) ? 'active' : ''  }}" data-bs-toggle="tab" href="#kt_header_navs_tab_1">Inicio</a>
                            </li>
                            @hasanyrole('media|admin|super')
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($page, ['media_list_news', 'media_list_all', 'media_accreditations']) ? 'active' : ''  }}" data-bs-toggle="tab" href="#kt_header_navs_tab_2">Medios</a>
                            </li>
                            @endhasanyrole
                            @hasanyrole('monitor|analyst|secretariat|plenary|admin|super')
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($page, ['monitoring_list', 'monitoring_report_list', 'analysis_report_list', 'monitoring_dashboard']) ? 'active' : ''  }}" data-bs-toggle="tab" href="#kt_header_navs_tab_3">Monitoreo y Análisis</a>
                            </li>
                            @endhasanyrole
                            @hasanyrole('admin|super')
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($page, ['election_list', 'election_create']) ? 'active' : ''  }}" data-bs-toggle="tab" href="#kt_header_navs_tab_4">Procesos Electorales</a>
                            </li>
                            @endhasanyrole
                            @hasanyrole('admin|super')
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($page, ['political_group_list', 'political_group_create']) ? 'active' : ''  }}" data-bs-toggle="tab" href="#kt_header_navs_tab_5">Partidos Políticos</a>
                            </li>
                            @endhasanyrole
                            @hasanyrole('super')
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($page, ['form_list', 'user_list', 'log_list']) ? 'active' : ''  }}" data-bs-toggle="tab" href="#kt_header_navs_tab_6">Preferencias</a>
                            </li>
                            @endhasanyrole
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center flex-row-auto">
                <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
                    <div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 ps-2 pe-2 me-n2" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-2 ms-2">
                            <span class="text-white opacity-75 fs-8 fw-semibold lh-1 mb-1">{{ Auth::guard('web')->user()->name }}</span>
                            <span class="text-white fs-8 fw-bold lh-1">{{ Auth::guard('web')->user()->roles->first()->display_name }}</span>
                        </div>
                        <div class="symbol symbol-30px symbol-md-40px">
                            <img src="{{ asset('themes/common/media/images/user_blank.png') }}" alt="" />
                        </div>



                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px overflow-hidden me-5">
                                    <div class="symbol-label fs-3 bg-light-info text-info">
                                        {{ strtoupper(substr(Auth::guard('web')->user()->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ Auth::guard('web')->user()->name }}
                                        {{--<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>--}}
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::guard('web')->user()->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="{{ route('oep_admin_my_profile') }}" class="menu-link px-5">Mi Perfil</a>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link px-5">Salir</a>
                            <form id="logout-form" action="{{ route('oep_admin_post_logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0 overflow-hidden overflow-lg-visible" id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true" data-kt-swapper-mode="append" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
        <div class="d-lg-flex container-xxl w-100">
            <div class="d-lg-flex flex-column justify-content-lg-center w-100" id="kt_header_navs_wrapper">
                <div class="tab-content" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: false}" data-kt-scroll-height="auto" data-kt-scroll-offset="70px">

                    <div class="tab-pane fade {{ in_array($page, ['dashboard']) ? 'active show' : ''  }}" id="kt_header_navs_tab_1">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu flex-column align-items-stretch flex-lg-row">
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
                                <a href="{{ route('oep_admin_index') }}" class="menu-item {{ $page === 'dashboard' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Dashboard</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    @hasanyrole('media|admin|super')
                    <div class="tab-pane fade {{ in_array($page, ['media_list_news', 'media_list_all', 'media_accreditations']) ? 'active show' : ''  }}" id="kt_header_navs_tab_2">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu flex-column align-items-stretch flex-lg-row">
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
                                <a href="{{ route('oep_admin_media_profiles_list') }}" class="menu-item {{ $page === 'media_list_all' ? 'here' : '' }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Todos los Medios</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                <a href="{{ route('oep_admin_media_profiles_list_new') }}" class="menu-item {{ $page === 'media_list_news' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Nuevos Registros</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                <a href="{{ route('oep_admin_media_elections_list_for_accreditation') }}" class="menu-item {{ $page === 'media_accreditations' ? 'here' : ''  }} menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Acreditaciones</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>

                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    @endhasanyrole
                    @hasanyrole('monitor|analyst|secretariat|plenary|admin|super')
                    <div class="tab-pane fade {{ in_array($page, ['monitoring_list', 'monitoring_report_list', 'analysis_report_list', 'monitoring_dashboard']) ? 'active show' : ''  }}" id="kt_header_navs_tab_3">
                        <div class="header-menu flex-column align-items-stretch flex-lg-row">
                            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
                                @hasanyrole('admin|super')
                                <a href="{{ route('oep_admin_media_dashboard_for_monitoring') }}" class="menu-item {{ $page === 'monitoring_dashboard' ? 'here' : '' }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Dashboard Reporte</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                @endhasanyrole
                                @hasanyrole('monitor|admin|super')
                                <a href="{{ route('oep_admin_media_elections_list_for_monitoring') }}" class="menu-item {{ $page === 'monitoring_list' ? 'here' : '' }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Registros de Monitoreo</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                @endhasanyrole
                                @hasanyrole('analyst|admin|super')
                                <a href="{{ route('oep_admin_monitoring_report_list') }}" class="menu-item {{ $page === 'monitoring_report_list' ? 'here' : '' }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Reportes de Monitoreo</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                @endhasanyrole
                                @hasanyrole('analyst|secretariat|plenary|admin|super')
                                <a href="{{ route('oep_admin_analysis_report_list') }}" class="menu-item {{ $page === 'analysis_report_list' ? 'here' : '' }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Informes de Análisis</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                @endhasanyrole
                            </div>
                        </div>
                    </div>
                    @endhasanyrole
                    @hasanyrole('admin|super')
                    <div class="tab-pane fade {{ in_array($page, ['election_list', 'election_create']) ? 'active show' : ''  }}" id="kt_header_navs_tab_4">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu flex-column align-items-stretch flex-lg-row">
                            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
                                <a href="{{ route('oep_admin_elections_list') }}" class="menu-item {{ $page === 'election_list' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Todos</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                <a href="{{ route('oep_admin_elections_create') }}" class="menu-item {{ $page === 'election_create' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Registro Nuevo</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    @endhasanyrole
                    @hasanyrole('admin|super')
                    <div class="tab-pane fade {{ in_array($page, ['political_group_list', 'political_group_create']) ? 'active show' : ''  }}" id="kt_header_navs_tab_5">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu flex-column align-items-stretch flex-lg-row">
                            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
                                <a href="{{ route('oep_admin_political_group_list') }}" class="menu-item {{ $page === 'political_group_list' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Todos los registros</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                <a href="{{ route('oep_admin_political_group_create') }}" class="menu-item {{ $page === 'political_group_create' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Nuevo</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    @endhasanyrole
                    @hasanyrole('super')
                    <div class="tab-pane fade {{ in_array($page, ['form_list', 'user_list', 'log_list']) ? 'active show' : ''  }}" id="kt_header_navs_tab_6">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu flex-column align-items-stretch flex-lg-row">
                            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
                                <a href="{{ route('oep_admin_forms') }}" class="menu-item {{ $page === 'form_list' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Formularios Dinámicos</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                <a href="{{ route('oep_admin_users_list') }}" class="menu-item {{ $page === 'user_list' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Gestión de Usuarios</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                                <a href="{{ route('oep_admin_activity_logs') }}" class="menu-item {{ $page === 'log_list' ? 'here' : ''  }} me-0 me-lg-2">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Logs de Actividad</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    @endhasanyrole

                </div>
            </div>
        </div>
    </div>
</div>
