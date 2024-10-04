

<?php $__env->startSection('breadcrumbs'); ?>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">
                <i class="ki-outline ki-home text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">Acreditaciones</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Nuevo</li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('headline'); ?>
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Solicitud de Acreditación
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Complete el formulario</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content">

        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10" id="kt_create_accreditation_stepper">
            <!--begin::Aside-->
            <div class="d-flex flex-column justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                <div class="card border border-dashed border-gray-300 mb-7">
                    <div class="card-body">
                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL DOCUMENTO</h6>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Tipo de Operación:</div>
                            <div class="fw-bold text-gray-800 fs-6">Acreditación de Medios de Comunicación</div>
                        </div>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                            <div class="fw-bold text-gray-800 fs-6 kt_data_accreditation_code">-</div>
                        </div>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Estado:</div>
                            <div class="fw-bold text-gray-800 fs-6 kt_data_accreditation_status">INICIAL</div>
                        </div>
                        <div class="mb-0">
                            <div class="fw-semibold text-gray-600 fs-7">Fecha de Registro:</div>
                            <div class="fw-bold text-gray-800 fs-6 kt_data_accreditation_submitted_at"><?php echo e(\Carbon\Carbon::today()->format('d/m/Y')); ?></div>
                        </div>
                    </div>
                </div>
                <div class="card border border-dashed border-gray-300">
                    <div class="card-body px-6 px-lg-10 px-xxl-15 py-10">
                        <div class="stepper-nav">
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Proceso Electoral</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Documentos</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Tarifario</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Resumen</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item mark-completed" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Confirmación</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Aside-->

            <!--begin::Content-->
            <form class="w-100" action="<?php echo e(route('ext_admin_accreditations_store')); ?>" novalidate="novalidate" id="kt_election_accreditation_form" method="post">
                <!--begin::Step 1-->
                <div class="current flex-column" data-kt-stepper-element="content">

                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                            <div class="d-flex flex-column flex-xl-row">
                                <div class="flex-lg-row-fluid me-xl-18__xx mb-10 mb-xl-0">
                                    <div class="mt-n1">
                                        <div class="pb-5">
                                            <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                                <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                                <span>Datos del Proceso</span>
                                            </h2>
                                            <div class="text-muted fw-semibold fs-7">Busca y selecciona el Proceso Electoral para la acreditación</div>
                                        </div>

                                        <div class=" flex-column pb-5">
                                            <a href="javascript:void(0)" id="kt_button_select_election_new" class="btn btn-sm btn-secondary mb-5" data-url="<?php echo e(route('ext_admin_election_accreditations_active_elections_list_partial')); ?>">Seleccionar Proceso</a>
                                            
                                        </div>
                                        <div class="fv-row"><input type="hidden" name="media_election"></div>
                                        <div class="m-0">
                                            
                                            <div class="row g-5 mb-6">
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Nombre del Proceso Electoral:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_name">-</div>
                                                </div>
                                            </div>
                                            <div class="row g-5 mb-2">
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Categoría:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_type">-</div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha del Proceso:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_date">-</div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha Limite de Acreditación:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_end_date">-</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card d-flex flex-row-fluid flex-center mb-10">

                        <div class="card-body py-20__XX p-12 w-100">

                            <div class="d-flex flex-column gap-7 gap-md-10">

                                <div class="pb-5">
                                    <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                        <span>Medio de Comunicación</span>
                                    </h2>
                                    
                                </div>

                                <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Nombre del Medio</span>
                                        <span class="fs-5"><?php echo e($profile->name); ?></span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Razón Social</span>
                                        <span class="fs-5"><?php echo e($profile->business_name); ?></span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">NIT</span>
                                        <span class="fs-5"><?php echo e($profile->nit); ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Step 1-->

                <!--begin::Step 2-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                            <div class="pb-10 pb-lg-15">
                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                    <span>Documentos</span>
                                </h2>
                                <div class="text-muted fw-semibold fs-7">Adjunte los documentos necesarios para la acreditación</div>
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Carta de Solicitud</span>
                                </label>
                                <div class="text-muted fs-7 mb-3">Carta de solicitud dirigida al Tribunal Electoral correspondiente, firmada por la persona propietaria o representante legal del medio de comunicación.</div>
                                <input type="file" name="media_file_request_letter" class="files"
                                       id="kt_media_file_request_letter" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                            </div>

                            <div class="fv-row mb-10">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Declaración Jurada</span>
                                </label>
                                <div class="text-muted fs-7 mb-3">Declaración jurada en la que señale que no tiene impedimento para difundir propaganda electoral, cobertura efectiva del medio y del tarifario (Documento que puede descargarse aquí).</div>
                                <input type="file" name="media_file_affidavit" class="files"
                                       id="kt_media_file_affidavit" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Step 2-->

                <!--begin::Step 3-->
                <div class="current__ flex-column" data-kt-stepper-element="content">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                            <div class="pb-10 pb-lg-15">
                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                    <span>Tarifarios</span>
                                </h2>
                                <div class="text-muted fw-semibold fs-7">Adjunte los documentos de las tarifas según el tipo de medio</div>
                            </div>

                            <?php if($profile->media_type_television): ?>
                                <?php
                                    $item_type_television = $profile->mediaTypes->where('type', 'Televisivo')->first();
                                    $states = $item_type_television ? explode(', ', $item_type_television->scope_department) : [];
                                ?>
                                <?php if($item_type_television): ?>
                                    <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <span>Televisión</span>
                                    </h3>
                                    <?php if($item_type_television->scope === 'Nacional'): ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario Nacional</span>
                                            </label>
                                            <input type="file" name="media_television_file_rate[Nacional]" class="files kt_media_file_rates"
                                                   data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario <?php echo e($state); ?> <?php echo e(($item_type_television->scope !== 'Nacional' && $item_type_television->scope !== 'Departamental') ? '(' . $item_type_television->scope_area . ')' : ''); ?></span>
                                            </label>
                                            <input type="file" name="media_television_file_rate[<?php echo e($state); ?>]" class="files kt_media_file_rates"
                                                   data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($profile->media_type_radio): ?>
                                <?php
                                    $item_type_radio = $profile->mediaTypes->where('type', 'Radial')->first();
                                    $states = $item_type_radio ? explode(', ', $item_type_radio->scope_department) : [];
                                ?>
                                <?php if($item_type_radio): ?>
                                    <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <span>Radio</span>
                                    </h3>
                                    <?php if($item_type_radio->scope === 'Nacional'): ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario Nacional</span>
                                            </label>
                                            <input type="file" name="media_radio_file_rate[Nacional]" class="files kt_media_file_rates"
                                                   data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario <?php echo e($state); ?> <?php echo e(($item_type_radio->scope !== 'Nacional' && $item_type_radio->scope !== 'Departamental') ? '(' . $item_type_radio->scope_area . ')' : ''); ?></span>
                                            </label>
                                            <input type="file" name="media_radio_file_rate[<?php echo e($state); ?>]" class="files kt_media_file_rates"
                                                   data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($profile->media_type_print): ?>
                                <?php
                                    $item_type_print = $profile->mediaTypes->where('type', 'Impreso')->first();
                                    $states = $item_type_print ? explode(', ', $item_type_print->scope_department) : [];
                                ?>
                                <?php if($item_type_print): ?>
                                    <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <span>Impresos</span>
                                    </h3>
                                    <?php if($item_type_print->scope === 'Nacional'): ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario Nacional</span>
                                            </label>
                                            <input type="file" name="media_print_file_rate[Nacional]" class="files kt_media_file_rates" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario <?php echo e($state); ?> <?php echo e(($item_type_print->scope !== 'Nacional' && $item_type_print->scope !== 'Departamental') ? '(' . $item_type_print->scope_area . ')' : ''); ?></span>
                                            </label>
                                            <input type="file" name="media_print_file_rate[<?php echo e($state); ?>]" class="files kt_media_file_rates" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($profile->media_type_digital): ?>
                                <?php
                                    $item_type_digital = $profile->mediaTypes->where('type', 'Digital')->first();
                                    $states = $item_type_digital ? explode(', ', $item_type_digital->scope_department) : [];
                                ?>
                                <?php if($item_type_digital): ?>
                                    <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <span>Digital</span>
                                    </h3>
                                    <?php if($item_type_digital->scope === 'Nacional'): ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario Nacional</span>
                                            </label>
                                            <input type="file" name="media_digital_file_rate[Nacional]" class="files kt_media_file_rates" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tarifario <?php echo e($state); ?> <?php echo e(($item_type_digital->scope !== 'Nacional' && $item_type_digital->scope !== 'Departamental') ? '(' . $item_type_digital->scope_area . ')' : ''); ?></span>
                                            </label>
                                            <input type="file" name="media_digital_file_rate[<?php echo e($state); ?>]" class="files kt_media_file_rates" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <!--end::Step 3-->

                <!--begin::Step 4-->
                <div class="flex-column wrapper_content_step_3" data-kt-stepper-element="content">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                        </div>
                    </div>
                </div>
                <!--end::Step 4-->

                <!--begin::Step 5-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                        </div>
                    </div>
                </div>
                <!--end::Step 5-->

                <div class="d-flex flex-stack pt-10">
                    <div class="mr-2">
                        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                            <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Atrás
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                            <span class="indicator-label">Enviar
                                <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i>
                            </span>
                            <span class="indicator-progress">Por favor espere...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">
                            <span class="indicator-label">Siguiente
                                <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i>
                            </span>
                            <span class="indicator-progress">Por favor espere...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>

                        </button>
                    </div>
                </div>
            </form>
            <!--end::Content-->

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>

    <div class="modal fade" id="kt_modal_elections_search" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-8">
                        <h3 class="mb-3 text-uppercase">Procesos Electorales</h3>
                        <div class="text-muted fw-semibold fs-6">Lista de los Procesos Electorales activos para accreditación</div>
                    </div>
                    <div id="kt_modal_users_search_handler">
                        <div class="py-5" id="kt_modal_elections_search_content">
                        </div>
                        <div class="d-flex flex-center mt-15">
                            <button type="button" id="kt_button_select_election_cancel__xx" data-bs-dismiss="modal" class="btn btn-secondary me-3">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css')); ?>" media="all" rel="stylesheet">
    <style>
        .wrapper_content_step_3 .fileuploader {
            padding: 16px;
            padding-top: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('themes/external/js/custom/accreditation/new-accreditation.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'media_accreditations'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//accreditation/newAccreditation.blade.php ENDPATH**/ ?>