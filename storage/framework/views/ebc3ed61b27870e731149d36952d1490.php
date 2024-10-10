
<?php if($form): ?>
    <?php if(is_array($fields) && count($fields) > 0): ?>
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(in_array($field->fieldType->type, ['textbox', 'textarea', 'select', 'checkbox', 'datepicker', 'fileupload'])): ?>
                <div class="fv-row mb-8">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="<?php echo e($field->required ? 'required' : ''); ?>"><?php echo e($field->label); ?></span>
                        <?php if($field->tooltip): ?>
                        <span class="ms-1" data-bs-toggle="tooltip" title="<?php echo e($field->tooltip); ?>">
                            <i class="ki-outline ki-information-5 fs-6 text-gray-500"></i>
                        </span>
                        <?php endif; ?>
                    </label>

                    <?php switch($field->fieldType->type):

                        case ('textbox'): ?>
                            <input type="text" name="<?php echo e($field->unique_fieldname); ?>" class="form-control mb-2" placeholder="<?php echo e($field->placeholder ? $field->placeholder : ''); ?>" value=""
                            <?php echo $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : ''; ?>

                            <?php echo ($field->minlength || $field->maxlength) ? 'data-fv-string-length="true"' : ''; ?>

                            <?php echo ($field->minlength) ? 'data-fv-string-length___min="'.$field->minlength.'"' : ''; ?>

                            <?php echo ($field->maxlength) ? 'data-fv-string-length___max="'.$field->maxlength.'"' : ''; ?>

                            <?php echo ($field->minlength || $field->maxlength) ? 'data-fv-string-length___message="'. (($field->minlength && $field->maxlength) ? 'La longitud debe estar entre ' . $field->minlength . ' y ' . $field->maxlength : ($field->minlength ? 'Longitud mínima ' . $field->minlength : 'Longitud máxima ' . $field->maxlength) ) .'"' : ''; ?>

                            <?php echo $field->regex ? 'pattern="'.$field->regex.'" data-fv-regexp___message="El campo no cumple con la regla solicitada"' : ''; ?>

                            <?php echo $field->min ? 'data-fv-greater-than="true" data-fv-greater-than___min="'.$field->min.'" data-fv-greater-than___message="El valor mínimo debe ser '.$field->min.'"' : ''; ?>

                            <?php echo $field->max ? 'data-fv-less-than="true" data-fv-less-than___max="'.$field->max.'" data-fv-less-than___message="El valor máximo debe ser '.$field->max.'"' : ''; ?>

                            <?php echo $field->field_subtype === 'digits' ? 'data-fv-digits="true" data-fv-digits___message="Solo se permiten números enteros"' : ''; ?>

                            <?php echo $field->field_subtype === 'decimal' ? 'data-fv-numeric="true" data-fv-numeric___message="Solo se permiten números" data-fv-numeric___thousands-separator="."' : ''; ?>

                            <?php echo $field->field_subtype === 'email' ? 'data-fv-email-address="true" data-fv-email-address___message="Ingrese un correo válido"' : ''; ?>

                            <?php echo $field->field_subtype === 'url' ? 'data-fv-uri="true" data-fv-uri___message="Ingrese una dirección URL válida" data-fv-uri___protocol="http,https" data-fv-uri___allow-empty-protocol="false"' : ''; ?>

                            />
                        <?php break; ?>

                        <?php case ('textarea'): ?>
                            <textarea class="form-control mb-2" rows="<?php echo e($field->textarea_rows ? $field->textarea_rows : 2); ?>" name="<?php echo e($field->unique_fieldname); ?>" placeholder="<?php echo e($field->placeholder ? $field->placeholder : ''); ?>"
                            <?php echo $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : ''; ?>

                            <?php echo ($field->minlength || $field->maxlength) ? 'data-fv-string-length="true"' : ''; ?>

                            <?php echo ($field->minlength) ? 'data-fv-string-length___min="'.$field->minlength.'"' : ''; ?>

                            <?php echo ($field->maxlength) ? 'data-fv-string-length___max="'.$field->maxlength.'"' : ''; ?>

                            <?php echo ($field->minlength || $field->maxlength) ? 'data-fv-string-length___message="'. (($field->minlength && $field->maxlength) ? 'La longitud debe estar entre ' . $field->minlength . ' y ' . $field->maxlength : ($field->minlength ? 'Longitud mínima ' . $field->minlength : 'Longitud máxima ' . $field->maxlength) ) .'"' : ''; ?>

                            ></textarea>
                        <?php break; ?>

                        <?php case ('select'): ?>
                            <select class="form-select mb-2" data-control="select2" data-hide-search="<?php echo e($field->select_search ? 'false' : 'true'); ?>" data-placeholder="<?php echo e($field->placeholder ? $field->placeholder : 'Selecciona una opción'); ?>"
                                    data-allow-clear="true" <?php echo e($field->field_subtype == 'multiselect' ? 'multiple="multiple"' : ''); ?> name="<?php echo e($field->unique_fieldname); ?>[]"
                                <?php echo $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : ''; ?>>
                                <?php if($field->options_type === 'custom'): ?>
                                    <?php
                                        $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                    ?>
                                    <?php if($field->field_subtype === 'select'): ?>
                                        <option></option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($option->value); ?>"><?php echo e($option->text); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if($field->options_type === 'catalog'): ?>
                                    <?php
                                        $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                    ?>
                                    <?php if($field->field_subtype === 'select'): ?>
                                        <option></option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $catalog->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($option->id); ?>"><?php echo e($option->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        <?php break; ?>

                        <?php case ('checkbox'): ?>
                            <?php if($field->options_type === 'custom'): ?>
                                <?php
                                    $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                ?>
                                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-custom mb-3">
                                        <input class="form-check-input h-20px w-20px" id="key_<?php echo e($option->value); ?>" type="checkbox" name="<?php echo e($field->unique_fieldname); ?>[]" value="<?php echo e($option->value); ?>"
                                        <?php echo $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : ''; ?>/>
                                        <label class="form-check-label fw-semibold" for="key_<?php echo e($option->value); ?>"><?php echo e($option->text); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if($field->options_type === 'catalog'): ?>
                                <?php
                                    $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                ?>
                                <?php $__currentLoopData = $catalog->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-custom mb-3">
                                        <input class="form-check-input h-20px w-20px" id="key_<?php echo e($option->id); ?>" type="checkbox" name="<?php echo e($field->unique_fieldname); ?>[]" value="<?php echo e($option->id); ?>"
                                        <?php echo $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : ''; ?>/>
                                        <label class="form-check-label fw-semibold" for="key_<?php echo e($option->id); ?>"><?php echo e($option->name); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php break; ?>

                        <?php case ('datepicker'): ?>
                            <input type="text" name="<?php echo e($field->unique_fieldname); ?>" class="form-control mb-2 <?php echo e($field->field_subtype === 'time' ? 'kt_form_field_time' : 'kt_form_field_date'); ?>" placeholder="<?php echo e($field->placeholder ? $field->placeholder : ''); ?>" value=""
                            <?php echo $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : ''; ?>/>
                        <?php break; ?>

                        <?php case ('fileupload'): ?>

                            <?php
                                $mimes = is_array(json_decode($field->file_mimetypes)) ? implode(',',json_decode($field->file_mimetypes)) : '';
                            ?>





                            <div class="text-muted fs-7 mb-3"></div>
                            <input type="file" name="<?php echo e($field->unique_fieldname); ?>" class="files kt_form_field_fileupload" data-maxsize="<?php echo e($field->file_maxsize ? $field->file_maxsize : '3'); ?>" data-maxfiles="<?php echo e($field->maxfiles); ?>" data-accept="<?php echo e($mimes); ?>"
                            <?php echo $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : ''; ?>>
                            <div class="text-muted fs-7">Máximo tamaño permitido <?php echo e($field->file_maxsize ? $field->file_maxsize : '3'); ?>MB. Formatos aceptados: <?php echo e($mimes); ?></div>

                        <?php break; ?>

                    <?php endswitch; ?>

                </div>

            <?php endif; ?>


            <?php if(in_array($field->fieldType->type, ['html'])): ?>
                <?php switch($field->field_subtype):
                    case ('title'): ?>
                    <div>
                        <?php switch($field->title_heading):
                            case ('h1'): ?>
                            <h1 class="fw-bold mb-5"><?php echo e($field->text_html); ?></h1>
                            <?php break; ?>
                            <?php case ('h2'): ?>
                            <h2 class="fw-bold mb-5"><?php echo e($field->text_html); ?></h2>
                            <?php break; ?>
                            <?php case ('h3'): ?>
                            <h3 class="fw-bold mb-5"><?php echo e($field->text_html); ?></h3>
                            <?php break; ?>
                            <?php case ('h4'): ?>
                            <h4 class="fw-bold mb-5"><?php echo e($field->text_html); ?></h4>
                            <?php break; ?>
                            <?php case ('h5'): ?>
                            <h5 class="fw-bold mb-5"><?php echo e($field->text_html); ?></h5>
                            <?php break; ?>
                            <?php case ('h6'): ?>
                            <h6 class="fw-bold mb-5"><?php echo e($field->text_html); ?></h6>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                    <?php break; ?>
                    <?php case ('paragraph'): ?>
                    <p class="text-muted fs-6 mb-5">
                        <?php echo e($field->text_html); ?>

                    </p>
                    <?php break; ?>
                    <?php case ('divider'): ?>
                    <div class="separator separator-dashed my-4"></div>
                    <?php break; ?>
                <?php endswitch; ?>
            <?php endif; ?>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoring/partials/dynamicForm.blade.php ENDPATH**/ ?>