<div>
    <?php
    $options = json_decode($field->fieldType->options);
    $settings_general = $options->general;
    $settings_data = $options->input;
    $settings_validation = $options->validation;
    $settings_style = $options->styles;
    ?>

    <form id="kt_modal_form_field_edit_form" autocomplete="off" class="form" action="<?php echo e(route('oep_admin_form_builder_update_form_field', ['id' => $field->fid_form, 'field_id' => $field->id])); ?>">

        <div class="mb-13 text-center">
            <h3 class="mb-3 text-uppercase">Editar componente <?php echo e($field->fieldType->name); ?></h3>
            <div class="text-muted fw-semibold fs-5"></div>
        </div>

        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_form_field_general_tab">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_form_field_data_tab">Valores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_form_field_validation_tab">Validación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_form_field_style_tab">Estilo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_form_field_advanced_tab">Avanzado</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="kt_form_field_general_tab" role="tabpanel">

                <?php if(isset($settings_general) && $settings_general): ?>

                    <?php if(isset($settings_general->label) && $settings_general->label): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Etiqueta</label>
                            <input type="text" class="form-control" placeholder="" name="label" value="<?php echo e($field->label); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_general->fieldname) && $settings_general->fieldname): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Identificador</label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="fieldname" value="<?php echo e($field->unique_fieldname); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_general->placeholder) && $settings_general->placeholder): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Placeholder</label>
                            <input type="text" class="form-control" placeholder="" name="placeholder" value="<?php echo e($field->placeholder); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_general->text) && $settings_general->text): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Texto</label>
                            <input type="text" class="form-control" placeholder="" name="text" value="<?php echo e($field->text_html); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_general->tooltip) && $settings_general->tooltip): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Tooltip</label>
                            <textarea class="form-control" rows="2" name="tooltip"><?php echo e($field->tooltip); ?></textarea>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <div class="tab-pane fade" id="kt_form_field_data_tab" role="tabpanel">

                <?php if(isset($settings_data) && $settings_data): ?>

                    <?php if(isset($settings_data->subtype) && is_array($settings_data->subtype)): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Tipo</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="" name="subtype">
                                <?php $__currentLoopData = $settings_data->subtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subtype); ?>" <?php echo e($field->field_subtype == $subtype ? 'selected' : ''); ?>><?php echo e(strtoupper($subtype)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->optionstype) && $settings_data->optionstype): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Datos</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="" name="optionstype">
                                <option value="custom" <?php echo e($field->options_type === 'custom' ? 'selected' : ''); ?>>Normal</option>
                                <option value="catalog" <?php echo e($field->options_type === 'catalog' ? 'selected' : ''); ?>>Catálogo</option>
                            </select>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->optionstype) && $settings_data->optionstype): ?>
                        <!--begin::Input group-->
                        <div id="kt_field_source_catalog" class="<?php echo e($field->options_type === 'catalog' ? 'd-block' : 'd-none'); ?>">
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Fuente</label>
                                <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="" name="catalog">
                                    <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($catalog->id); ?>"><?php echo e($catalog->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->options) && $settings_data->options): ?>
                        <div id="kt_field_source_custom" class="<?php echo e($field->options_type === 'custom' ? 'd-block' : 'd-none'); ?>">
                            <div class="fv-row mb-8">
                                <label class="fs-6 fw-semibold form-label">
                                    <span class="">Opciones</span>
                                </label>
                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                    <div id="repeater_options">
                                        <input type="hidden" name="repeater_options_default" value="<?php echo e($field->options); ?>">
                                        <div class="form-group">
                                            <div data-repeater-list="repeater_options" class="d-flex flex-column gap-3">
                                                <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                                    <input type="text" class="form-control mw-100 w-175px" name="field_option" placeholder="Texto" />
                                                    <input type="text" class="form-control mw-100 w-175px" name="field_value" placeholder="Valor" />
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input h-20px w-20px" type="checkbox" name="field_selected" value="1" />
                                                    </label>
                                                    <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                        <i class="ki-outline ki-cross fs-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-5">
                                            <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                                <i class="ki-outline ki-plus fs-2"></i>Adicionar opción
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($settings_data->search) && $settings_data->search): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <div class="d-flex align-items-center">
                                <label class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input h-20px w-20px" type="checkbox" name="search" value="1" <?php echo e($field->select_search ? 'checked="checked"' : ''); ?> />
                                    <span class="form-check-label fw-semibold fs-6 text-gray-800">Búsqueda</span>
                                </label>
                            </div>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->heading) && $settings_data->heading): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Encabezado</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="" name="heading">
                                <option value="h1" <?php echo e($field->title_heading == 'h1' ? 'selected' : ''); ?>>H1</option>
                                <option value="h2" <?php echo e($field->title_heading == 'h2' ? 'selected' : ''); ?>>H2</option>
                                <option value="h3" <?php echo e($field->title_heading == 'h3' ? 'selected' : ''); ?>>H3</option>
                                <option value="h4" <?php echo e($field->title_heading == 'h4' ? 'selected' : ''); ?>>H4</option>
                                <option value="h5" <?php echo e($field->title_heading == 'h5' ? 'selected' : ''); ?>>H5</option>
                                <option value="h6" <?php echo e($field->title_heading == 'h6' ? 'selected' : ''); ?>>H6</option>
                            </select>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->maxsize) && $settings_data->maxsize): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Tamaño máximo (MB)</label>
                            <input type="number" class="form-control" placeholder="" name="maxsize" value="<?php echo e($field->file_maxsize); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->mimetypes) && $settings_data->mimetypes): ?>
                        <?php
                            $mimes = $field->file_mimetypes ? json_decode($field->file_mimetypes) : [];
                        ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Permitido</label>
                            <select class="form-select" data-control="select2" multiple data-hide-search="true" data-placeholder="" name="mimetypes[]">
                                <option value="application/pdf" <?php echo e(in_array('application/pdf', $mimes) ? 'selected' : ''); ?>>application/pdf</option>
                                <option value="image/png" <?php echo e(in_array('image/png', $mimes) ? 'selected' : ''); ?>>image/png</option>
                                <option value="image/jpeg" <?php echo e(in_array('image/jpeg', $mimes) ? 'selected' : ''); ?>>image/jpeg</option>
                                <option value="video/mp4" <?php echo e(in_array('video/mp4', $mimes) ? 'selected' : ''); ?>>video/mp4</option>
                                <option value="audio/mpeg" <?php echo e(in_array('audio/mpeg', $mimes) ? 'selected' : ''); ?>>audio/mpeg</option>
                            </select>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->defaultvalue) && $settings_data->defaultvalue): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Valor por defecto</label>
                            <input type="text" class="form-control" placeholder="" name="defaultvalue" value="<?php echo e($field->default_value); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->rows) && $settings_data->rows): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Número de lineas</label>
                            <input type="number" class="form-control" placeholder="" name="rows" value="<?php echo e($field->textarea_rows ? $field->textarea_rows : '2'); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_data->readonly) && $settings_data->readonly): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <div class="d-flex align-items-center">
                                <label class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input h-20px w-20px" type="checkbox" name="readonly" value="1" <?php echo e($field->readonly ? 'checked="checked"' : ''); ?> />
                                    <span class="form-check-label fw-semibold fs-6 text-gray-800">Readonly</span>
                                </label>
                            </div>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <div class="tab-pane fade" id="kt_form_field_validation_tab" role="tabpanel">

                <?php if(isset($settings_validation) && $settings_validation): ?>

                    <?php if(isset($settings_validation->required) && $settings_validation->required): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <div class="d-flex align-items-center">
                                <label class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input h-20px w-20px" type="checkbox" name="required" value="1" <?php echo e($field->required ? 'checked="checked"' : ''); ?> />
                                    <span class="form-check-label fw-semibold fs-6 text-gray-800">Requerido</span>
                                </label>
                            </div>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_validation->minlength) && $settings_validation->minlength): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Longitud mínima</label>
                            <input type="number" class="form-control" placeholder="" name="minlength" value="<?php echo e($field->minlength); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_validation->maxlength) && $settings_validation->maxlength): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Longitud máxima</label>
                            <input type="number" class="form-control" placeholder="" name="maxlength" value="<?php echo e($field->maxlength); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_validation->min) && $settings_validation->min): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Valor mínimo</label>
                            <input type="number" class="form-control" placeholder="" name="min" value="<?php echo e($field->min); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_validation->max) && $settings_validation->max): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Valor máximo</label>
                            <input type="number" class="form-control" placeholder="" name="max" value="<?php echo e($field->max); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_validation->maxfiles) && $settings_validation->maxfiles): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Máximo de archivos</label>
                            <input type="number" class="form-control" placeholder="" name="maxfiles" value="<?php echo e($field->maxfiles); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_validation->regex) && $settings_validation->regex): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Regex</label>
                            <input type="text" class="form-control" placeholder="" name="regex" value="<?php echo e($field->regex); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <div class="tab-pane fade" id="kt_form_field_style_tab" role="tabpanel">

                <?php if(isset($settings_style) && $settings_style): ?>

                    <?php if(isset($settings_style->gridcolumn) && $settings_style->gridcolumn): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Template</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="" name="gridcolumn">
                                <option value="12" <?php echo e($field->grid_column == '12' ? 'selected' : ''); ?>>12 Grid</option>
                            </select>
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                    <?php if(isset($settings_style->classname) && $settings_style->classname): ?>
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Nombre de clase</label>
                            <input type="text" class="form-control" placeholder="" name="classname" value="<?php echo e($field->class_name); ?>" />
                        </div>
                        <!--end::Input group-->
                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <div class="tab-pane fade" id="kt_form_field_advanced_tab" role="tabpanel">



            </div>
        </div>


        <div class="separator separator-dashed my-5"></div>

        <!--begin::Actions-->
        <div class="text-center mt-10">
            <button type="reset" id="kt_modal_form_field_cancel" class="btn btn-light me-3">Cancelar</button>
            <button type="button" id="kt_modal_form_field_submit" class="btn btn-primary">
                <span class="indicator-label">Guardar</span>
                <span class="indicator-progress">Espere por favor...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
</div>
<?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//formBuilder/partials/editField.blade.php ENDPATH**/ ?>