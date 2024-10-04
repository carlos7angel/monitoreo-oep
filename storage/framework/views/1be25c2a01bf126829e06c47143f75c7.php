

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
            <a href="/" class="text-white text-hover-secondary">Medio</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Datos Generales</li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('headline'); ?>
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Medio de Comunicación
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Información del Medio de Comunicación</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content">

        <div class="row g-7">
            <div class="col-lg-6 col-xl-3">
                <div class="card card-flush">
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <div class="card-title">
                            <h2>Menú</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="d-flex flex-column gap-5">
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_general_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Datos Generales</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_category_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">Tipo y Alcance</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_contact_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Datos de Contacto</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_file_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Archivos</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>




                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9">

                <div class="card card-flush h-lg-100" style="border: none !important; box-shadow: unset !important;">
                    <?php if(session('validation_profile')): ?>
                        <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-10 p-4 mx-10">
                            <i class="ki-outline ki-information-5 fs-1 text-info me-4"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">Complete los campos obligatorios del formulario antes de continuar.</div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-header pt-0">
                        <div class="card-title">
                            <i class="ki-outline ki-badge fs-1 me-2"></i>
                            <h2>Tipo de Medio</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_media_profile_category_data_form" class="form" action="<?php echo e(route('ext_admin_media_profile_category_data_store')); ?>" method="post" autocomplete="off">

                            <div class="fv-row mb-7">
                                <label class="form-label mb-1">Tipo de Medio</label>
                                <div class="text-muted fs-7 mb-5">Puede seleccionar más de una opción, en tal caso, en su declaración jurada debe incluir las tarifas de los tipos de medios seleccionados.</div>

                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px media_type_checkbox" type="checkbox" name="media_type_television" value="media_type_television" data-label="Televisivo" <?php echo e($profile->media_type_television ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">Televisivo</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px media_type_checkbox" type="checkbox" name="media_type_radio" value="media_type_radio" data-label="Radial" <?php echo e($profile->media_type_radio ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">Radial</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px media_type_checkbox" type="checkbox" name="media_type_print" value="media_type_print" data-label="Impreso" <?php echo e($profile->media_type_print ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">Impreso</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px media_type_checkbox" type="checkbox" name="media_type_digital" value="media_type_digital" data-label="Digital" <?php echo e($profile->media_type_digital ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">Digital</label>
                                </div>
                            </div>

                            <div class="mb-7 pt-10">
                                <div class="card-title">
                                    <h3>Cobertura y Alcance</h3>
                                </div>
                            </div>

                            <div class="row fv-row mb-7">
                                <div class="table-responsive">
                                    <table class="table align-middle table-bordered" id="table_media_types">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800">
                                                <th class="text-center">#</th>
                                                <th>TIPO DE MEDIO</th>
                                                <th>COBERTURA</th>
                                                <th>ALCANCE</th>
                                                <th>DEPARTAMENTO</th>
                                                <th>MUNICIPIO/REGIÓN/AIOC</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $profile->mediaTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $type_text = "";
                                                    switch ($type->type) {
                                                        case 'Televisivo':
                                                        $type_text = "media_type_television";
                                                        break;
                                                        case 'Radial':
                                                        $type_text = "media_type_radio";
                                                        break;
                                                        case 'Impreso':
                                                        $type_text = "media_type_print";
                                                        break;
                                                        case 'Digital':
                                                        $type_text = "media_type_digital";
                                                        break;
                                                    }
                                                ?>
                                                <tr data-type="<?php echo e($type_text); ?>" data-valid="1">
                                                    <td class="text-center"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-primary kt_trigger_media_type_modal"><i class="ki-outline ki-pencil fs-2"></i></a></td>
                                                    <td class="d_label">
                                                        <?php echo e(strtoupper($type->type)); ?>

                                                    </td>
                                                    <td class="d_coverage"><?php echo e($type->coverage); ?></td>
                                                    <td class="d_scope"><?php echo e($type->scope); ?></td>
                                                    <td class="d_department" data-val="<?php echo e($type->scope_department); ?>"><?php echo e($type->scope_department); ?></td>
                                                    <td class="d_area" data-val="<?php echo e($type->scope_area); ?>"><?php echo e($type->scope_area ? $type->scope_area : '-'); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>








                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" name="media_types" value="">
                            </div>



                            <div class="separator mb-6"></div>

                            <div class="d-flex justify-content-end">
                                <button type="reset" id="kt_media_profile_cancel" class="btn btn-light me-3">Cancelar</button>
                                <button type="button" id="kt_media_profile_submit" class="btn btn-primary">
                                    <span class="indicator-label">Guardar</span>
                                    <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>

                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div class="modal fade" id="kt_modal_media_type" tabindex="-1" aria-hidden="true">
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">

                    <form id="kt_form_media_type" class="form" method="post" autocomplete="off">

                        <div class="mb-13 text-center">
                            <h3 class="mb-3">Cobertura y alcance</h3>
                            <div class="text-muted fw-semibold fs-5">Seleccione la cobertura y alcance del tipo de medio</div>
                        </div>

                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required d-flex align-items-center fs-6 fw-semibold mb-2">Medio</label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="media_type_name" value="" readonly />
                            <input type="hidden" class="form-control" name="media_type_id" value="" />
                        </div>

                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Cobertura</span>
                            </label>
                            <div class="w-100">
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                        id="kt_media_coverage_select" name="media_coverage">
                                    <option></option>
                                    <option value="Nacional">Nacional</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="Cochabamba">Cochabamba</option>
                                    <option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Chuquisaca">Chuquisaca</option>
                                    <option value="Tarija">Tarija</option>
                                    <option value="Oruro">Oruro</option>
                                    <option value="Potosí">Potosí</option>
                                    <option value="Beni">Beni</option>
                                    <option value="Pando">Pando</option>
                                </select>
                            </div>
                            <div class="text-muted fs-7 mt-1">Marque el departamento al que abarca la cobertura del medio. Si es de alcance Nacional marque la opción Nacional.</div>
                        </div>

                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Alcance</span>
                            </label>
                            <div class="w-100">
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                        id="kt_media_scope_select" name="media_scope">
                                    <option></option>
                                    <option value="Nacional">Nacional</option>
                                    <option value="Departamental">Departamental</option>
                                    <option value="Regional">Regional</option>
                                    <option value="Municipal">Municipal</option>
                                    <option value="AIOC">AIOC</option>
                                </select>
                            </div>
                        </div>

                        <div id="kt_wrapper_media_profile_scope_national" class="d-none">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Departamentos</span>
                                </label>
                                <div class="w-100">
                                    <?php
                                        $states = [];
                                        if ($profile->scope === 'Nacional' && $profile->scope_department) {
                                            $states = json_decode($profile->scope_department);
                                        }
                                    ?>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona los departamentos" data-allow-clear="true" multiple="multiple"
                                            id="kt_media_scope_states_select" name="media_scope_states[]">
                                        <option></option>
                                        <option value="La Paz">La Paz</option>
                                        <option value="Cochabamba">Cochabamba</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Chuquisaca">Chuquisaca</option>
                                        <option value="Tarija">Tarija</option>
                                        <option value="Oruro">Oruro</option>
                                        <option value="Potosi">Potosi</option>
                                        <option value="Beni">Beni</option>
                                        <option value="Pando">Pando</option>
                                    </select>
                                </div>
                                <div class="text-muted fs-7 mt-1">Debe seleccionar al menos 2 o más departamentos.</div>
                            </div>
                        </div>

                        <div id="kt_wrapper_media_profile_scope_state" class="d-none">
                            <div class="d-flex flex-column fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Departamento</span>
                                </label>
                                <div class="w-100">
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona un departamento"
                                            id="kt_media_scope_state_select" name="media_scope_state">
                                        <option></option>
                                        <option value="La Paz">La Paz</option>
                                        <option value="Cochabamba">Cochabamba</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Chuquisaca">Chuquisaca</option>
                                        <option value="Tarija">Tarija</option>
                                        <option value="Oruro">Oruro</option>
                                        <option value="Potosí">Potosí</option>
                                        <option value="Beni">Beni</option>
                                        <option value="Pando">Pando</option>
                                    </select>
                                </div>
                                <div class="text-muted fs-7 mt-1">Marque el departamento de cobertura del medio.</div>
                            </div>
                        </div>

                        <div id="kt_wrapper_media_profile_scope_area" class="d-none">
                            <div class="d-flex flex-column fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Region/Municipio/AIOC</span>
                                </label>
                                <input type="text" class="form-control" id="kt_media_scope_area" name="media_scope_area" value="" />
                            </div>
                        </div>

                        <div class="separator mb-6"></div>

                        <div class="text-center">
                            <button type="reset" id="kt_button_media_type_cancel" class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_button_media_type_submit" class="btn btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/external/js/custom/media-profile/category.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'media_data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//mediaProfile/categoryData.blade.php ENDPATH**/ ?>