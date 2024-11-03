<div class="mb-0" id="home">
    <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
        <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center flex-equal">
                        <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2hx"></i>
                        </button>
                        <a href="#">
                            <img alt="Logo" src="<?php echo e(asset('themes/common/media/logos/logo_oep_h.png')); ?>" class="logo-default h-35px h-lg-40px" />
                            <img alt="Logo" src="<?php echo e(asset('themes/common/media/logos/logo_oep_h.png')); ?>" class="logo-sticky h-30px h-lg-35px" />
                        </a>
                    </div>
                    <div class="d-lg-block" id="kt_header_nav_wrapper">
                        <div class="d-lg-block p-5 p-lg-0">
                            <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
                                <div class="menu-item">
                                    <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="<?php echo e(route('web_index')); ?>" >Inicio</a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 text-hover-secondary px-4 px-xxl-6" href="<?php echo e(route('web_form_media')); ?>" >Registro Medios</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-equal text-end ms-1">
                        <a href="<?php echo e(route('ext_admin_login')); ?>" class="btn btn-light-secondary">
                            <i class="ki-outline ki-user fs-2"></i>
                            Ingreso
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Vendor\Template/UI/WEB/Views//landing/components/base/_header.blade.php ENDPATH**/ ?>