<?php
    $input = json_decode($monitoring->data, true);
?>

<div>
    <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">DATOS DEL FORMULARIO</h6>
    <?php if($form): ?>
        <?php if(is_array($fields) && count($fields) > 0): ?>
            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(!isset($input[$field->unique_fieldname])): ?>
                    <?php continue; ?>
                <?php endif; ?>

                <?php switch($field->fieldType->type):

                    case ('textbox'): ?>
                    <?php case ('datepicker'): ?>
                    <?php case ('textarea'): ?>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600"><?php echo e($field->label); ?>:</label>
                        </div>
                        <div class="col-md-8">
                            <p class="form-control form-control-plaintext"><?php echo e($input[$field->unique_fieldname] ? $input[$field->unique_fieldname] : ''); ?></p>
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    <?php break; ?>

                    <?php case ('select'): ?>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600"><?php echo e($field->label); ?>:</label>
                        </div>
                        <div class="col-md-8">
                            <?php if($field->options_type === 'custom'): ?>
                                <?php
                                    $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                    if ($field->field_subtype == 'multiselect') {
                                        $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                    } elseif ($field->field_subtype == 'select') {
                                        $selecteds = [$input[$field->unique_fieldname]];
                                    }
                                ?>
                                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($option->value, $selecteds)): ?>
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> <?php echo e($option->text); ?>

                                        </p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if($field->options_type === 'catalog'): ?>
                                <?php
                                    $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                    if ($field->field_subtype == 'multiselect') {
                                        $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                    } elseif ($field->field_subtype == 'select') {
                                        $selecteds = [$input[$field->unique_fieldname]];
                                    }
                                ?>
                                <?php $__currentLoopData = $catalog->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($option->id, $selecteds)): ?>
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> <?php echo e($option->name); ?>

                                        </p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    <?php break; ?>

                    <?php case ('checkbox'): ?>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600"><?php echo e($field->label); ?>:</label>
                        </div>
                        <div class="col-md-8">
                            <?php if($field->options_type === 'custom'): ?>
                                <?php
                                    $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                    $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                ?>
                                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($option->value, $selecteds)): ?>
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> <?php echo e($option->text); ?>

                                        </p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if($field->options_type === 'catalog'): ?>
                                <?php
                                    $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                    $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                ?>
                                <?php $__currentLoopData = $catalog->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($option->id, $selecteds)): ?>
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> <?php echo e($option->name); ?>

                                        </p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    <?php break; ?>

                    <?php case ('fileupload'): ?>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600"><?php echo e($field->label); ?>:</label>
                        </div>
                        <div class="col-md-8">
                            <?php if(isset($input[$field->unique_fieldname]) && is_array($input[$field->unique_fieldname])): ?>
                                <p class="form-control form-control-plaintext">
                                    <a href="javascript:void(0)" data-fancybox data-type="pdf" data-src="<?php echo e($input[$field->unique_fieldname]['url_file']); ?>"><?php echo e($input[$field->unique_fieldname]['original_name']); ?></a>
                                </p>

























                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    <?php break; ?>

                <?php endswitch; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endif; ?>


</div><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoring/partials/summaryFormMonitoring.blade.php ENDPATH**/ ?>