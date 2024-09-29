

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
                                        <span class="stepper-number">4</span>
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

                                <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                    <div class="flex-root d-flex flex-column">
                                        <?php
                                            $types = json_decode($profile->type);
                                        ?>
                                        <span class="text-muted">Tipo de Medio</span>
                                        <span class="fs-6"><?php echo e(implode(', ', $types)); ?></span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Cobertura</span>
                                        <span class="fs-5"><?php echo e($profile->coverage); ?></span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Alcance</span>
                                        <span class="fs-6"><?php echo e($profile->scope); ?></span>
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

                        <div class="fv-row mb-10">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Tarifario</span>
                            </label>
                            <div class="text-muted fs-7 mb-3">Tarifario del medio expresado en moneda nacional. Las tarifas inscritas no pueden ser superiores al promedio de las tarifas cobradas efectivamente por concepto de publicidad comercial durante el semestre previo al acto electoral.</div>
                            <input type="file" name="media_file_pricing_list" class="files"
                                   id="kt_media_file_pricing_list" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                        </div>

                        </div>
                    </div>
                </div>
                <!--end::Step 2-->

                <!--begin::Step 3-->
                <div class="flex-column wrapper_content_step_3" data-kt-stepper-element="content">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                            <div class="pb-10 pb-lg-12">
                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                    <span>Resumen</span>
                                </h2>
                                <div class="text-muted fw-semibold fs-7">Revise la información antes de ser enviada.</div>
                            </div>

                            <div class="fv-row"><input type="hidden" name="terms_and_conditions" value="true"></div>

                            <h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">DATOS GENERALES</h6>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Nombre del Medio:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->name); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Razón Social:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->business_name); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">NIT:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->nit); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Representante Legal:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->rep_full_name); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Documento Representante Legal:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->rep_document); ?> <?php echo e($profile->rep_exp); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">CLASIFICACIÓN DEL MEDIO</h6>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Tipo de Medio:</label>
                                </div>
                                <?php
                                    $types = json_decode($profile->type);
                                ?>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e(implode(', ', $types)); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Cobertura General:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->coverage); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Alcance del Medio:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->scope); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">
                                        <?php switch($profile->scope):
                                            case ('Nacional'): ?>
                                            <?php
                                                $states = [];
                                                if ($profile->scope_department) {
                                                    $states = json_decode($profile->scope_department);
                                                }
                                                $scope_content = implode(', ', $states);
                                            ?>
                                            <span>Departamentos:</span>
                                            <?php break; ?>
                                            <?php case ('Departamental'): ?>
                                            <?php
                                                $state = '';
                                                if ($profile->scope === 'Departamental' && $profile->scope_department) {
                                                    $state = json_decode($profile->scope_department)[0];
                                                }
                                                $scope_content = $state;
                                            ?>
                                            <span>Departamento:</span>
                                            <?php break; ?>
                                            <?php case ('Municipal'): ?>
                                            <?php
                                                $scope_content = $profile->scope_municipality;
                                            ?>
                                            <span>Municipio:</span>
                                            <?php break; ?>
                                            <?php default: ?>
                                            <span>-</span>
                                        <?php endswitch; ?>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($scope_content); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">DATOS DE CONTACTO</h6>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Domicilio Legal del Medio:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->legal_address); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Celular:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->cellphone); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Página web:</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control form-control-plaintext"><?php echo e($profile->website ? $profile->website : '-'); ?></p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Redes Sociales:</label>
                                </div>
                                <div class="col-md-8">
                                    <?php
                                        $rrss = $profile->rrss ? json_decode($profile->rrss) : [];
                                    ?>
                                    <p class="form-control form-control-plaintext">
                                        <?php if(count($rrss) > 0): ?>
                                            <?php $__currentLoopData = $rrss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $red): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($red->rrss_value); ?>" target="_blank" class="fs-6"><?php echo e($red->rrss_option); ?></a><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <span>-</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">DOCUMENTOS ADJUNTOS</h6>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Carta de Solicitud:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <input type="file" name="media_file_ro_request_letter" class="files" id="kt_media_file_ro_request_letter">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <?php if($profile->fileLegalAttorney): ?>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Poder Notariado (Si corresponde):</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <?php if($profile->fileLegalAttorney): ?>
                                            <input type="hidden" name="file_ro_legal_attorney" data-name="<?php echo e($profile->fileLegalAttorney->origin_name); ?>" data-size="<?php echo e($profile->fileLegalAttorney->size); ?>"
                                                   data-mimetype="<?php echo e($profile->fileLegalAttorney->mime_type); ?>" data-path="<?php echo e($profile->fileLegalAttorney->url_file); ?>">
                                        <?php endif; ?>
                                        <input type="file" name="media_file_ro_legal_attorney" class="files" id="kt_media_file_ro_legal_attorney">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Cédula de Identidad:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <?php if($profile->fileRepDocument): ?>
                                            <input type="hidden" name="file_ro_rep_document" data-name="<?php echo e($profile->fileRepDocument->origin_name); ?>" data-size="<?php echo e($profile->fileRepDocument->size); ?>"
                                                   data-mimetype="<?php echo e($profile->fileRepDocument->mime_type); ?>" data-path="<?php echo e($profile->fileRepDocument->url_file); ?>">
                                        <?php endif; ?>
                                        <input type="file" name="media_file_ro_rep_document" class="files" id="kt_media_file_ro_rep_document">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">NIT:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <?php if($profile->fileNit): ?>
                                            <input type="hidden" name="file_ro_nit" data-name="<?php echo e($profile->fileNit->origin_name); ?>" data-size="<?php echo e($profile->fileNit->size); ?>"
                                                   data-mimetype="<?php echo e($profile->fileNit->mime_type); ?>" data-path="<?php echo e($profile->fileNit->url_file); ?>">
                                        <?php endif; ?>
                                        <input type="file" name="media_file_ro_nit" class="files" id="kt_media_file_ro_nit">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Declaración Jurada:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <input type="file" name="media_file_ro_affidavit" class="files" id="kt_media_file_ro_affidavit">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                    <label class="fw-semibold fs-7 text-gray-600">Tarifario:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <input type="file" name="media_file_ro_pricing_list" class="files" id="kt_media_file_ro_pricing_list">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed border-muted"></div>

                        </div>
                    </div>
                </div>
                <!--end::Step 3-->

                <!--begin::Step 4-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">
                            <div class="pb-8 pb-lg-10">
                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                    <span>CONFIRMACIÓN</span>
                                </h2>
                                <div class="text-muted fw-semibold fs-7"></div>
                            </div>
                            <div class="mb-0">

                                <div style="text-align:center; margin:0 15px 34px 15px">

                                    <div class="mb-15">
                                        <img alt="Logo" src="<?php echo e(asset('themes/external/media/icons/success_icon.png')); ?>" class="h-100px" />
                                    </div>

                                    <h2 class="fw-bolder mb-5">Formulario enviado satisfactoriamente</h2>

                                    <div class="text-muted mb-10 fs-6">
                                        Su formulario de solicitud de acreditación fue enviado satisfactoriamente. </br>
                                        Personal del TSE procederá a revisar su información y documentación enviada, </br>
                                        en caso de presentar alguna observación se le notificará </br> al correo electrónico proporcionado.
                                    </div>

                                    <a href="<?php echo e(route('ext_admin_accreditations_list')); ?>" class="btn btn-secondary">Volver</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Step 4-->

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
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Siguiente
                            <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i>
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