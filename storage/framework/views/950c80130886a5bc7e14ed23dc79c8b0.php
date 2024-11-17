

<?php $__env->startSection('content'); ?>
    <div class="mt-lg-15 mb-lg-n15 position-relative z-index-2">
        <div class="container">
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body p-lg-20">
                    <div class="text-center mb-5 mb-lg-10">
                        <h3 class="fs-2hx text-gray-900 mb-5" data-kt-scroll-offset="{default: 100, lg: 250}">Registro Nuevo de Medios</h3>
                    </div>

                    <div class="mx-auto w-100 mw-600px pt-10 pb-10" id="form_media_content">

                        <form class="" novalidate="novalidate" autocomplete="off"
                              id="form_media_register" method="post" action="<?php echo e(route('web_form_media_store')); ?>">

                            <?php echo e(csrf_field()); ?>


                            <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                                <i class="ki-duotone ki-information-2 fs-2tx text-info me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <div class="d-flex flex-stack flex-grow-1">
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Importante</h4>
                                        <div class="fs-7 text-gray-700">
                                            Ingrese sus datos para el registro de un nuevo Medio de Comunicación. Este formulario solo debe ser registrado si no tiene ninguna cuenta o
                                            registro previo. Al finalizar el llenado y una vez enviado el formulario, personal del TSE revisará la información y en caso de ser aprobada
                                            se le enviará un correo electrónico aprobando su registro y sus accesos para el acceso a la plataforma.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 pb-12">
                                <h3 class="fw-bold text-gray-900">Datos generales del medio</h3>
                            </div>

                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Nombre del Medio</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Ingrese el nombre comercial del medio de comunicación">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                                </label>
                                <input type="text" class="form-control" placeholder="" name="media_name" />
                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Razón Social</label>
                                    <input type="text" class="form-control" placeholder="" name="media_business_name" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">NIT</label>
                                    <input type="text" class="form-control" placeholder="" name="media_nit" />
                                </div>
                            </div>

                            <div class="d-flex flex-column mb-8 fv-row">
                                <div class="fw-semibold me-5">
                                    <label class="required fs-6">Tipo de Medio</label>
                                    <div class="fs-7 text-muted">Puede seleccionar mas de una opción</div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <label class="form-check form-check-custom">
                                        <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type_television" value="Televisivo" />
                                        <span class="form-check-label fw-semibold">Televisión</span>
                                    </label>
                                    <label class="form-check form-check-custom">
                                        <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type_radio" value="Radial" />
                                        <span class="form-check-label fw-semibold">Radio</span>
                                    </label>
                                    <label class="form-check form-check-custom">
                                        <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type_print" value="Impreso" />
                                        <span class="form-check-label fw-semibold">Impreso</span>
                                    </label>
                                    <label class="form-check form-check-custom">
                                        <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type_digital" value="Digital" />
                                        <span class="form-check-label fw-semibold">Digital</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Representante Legal</label>
                                    <input type="text" class="form-control" placeholder="" name="media_rep_name" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Número de Celular</label>
                                    <input type="text" class="form-control" placeholder="" name="media_cellphone" />
                                </div>
                            </div>

                            <div class="pt-4 pb-12">
                                <h3 class="fw-bold text-gray-900">Datos de la cuenta</h3>
                            </div>


                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Correo electrónico</span>
                                </label>
                                <input type="text" class="form-control" placeholder="" name="media_email" />
                            </div>

                            <div class="fv-row mb-10">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="media_terms" value="1" />
                                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Estoy de acuerdo con los
										<a href="#" class="ms-1 link-primary">Términos y condiciones</a>
                                </span>
                                </label>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="submit_media_register" class="btn btn-primary">
                                    <span class="indicator-label">Enviar</span>
                                    <span class="indicator-progress">Espere por favor...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                </button>
                            </div>

                            <div class="text-gray-500 text-center fw-semibold fs-6">¿Ya tienes una cuenta?
                                <a href="<?php echo e(route('ext_admin_login')); ?>" class="link-primary fw-semibold">Ingresar</a>
                            </div>

                        </form>

                    </div>


                    <div class="d-flex flex-center mb-5 mb-lg-15">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/landing/js/media-registration.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\Website/UI/WEB/Views//formMedia.blade.php ENDPATH**/ ?>