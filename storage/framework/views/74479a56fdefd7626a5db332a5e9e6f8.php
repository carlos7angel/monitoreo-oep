<div>

    <div class="fv-row"><input type="hidden" name="terms_and_conditions" value="true"></div>

    <h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">DATOS GENERALES</h6>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Nombre del Medio:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->name); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Razón Social:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->business_name); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">NIT:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->nit); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Representante Legal:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->rep_full_name); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Documento Representante Legal:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->rep_document); ?> <?php echo e($profile_data->rep_exp); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">CLASIFICACIÓN DEL MEDIO</h6>

    <div class="row">
        <div class="col-md-12 d-flex align-items-center mt-5">
            <div class="flex-grow-1">
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4 mb-3">
                    <thead>
                    <tr class="border-bottom bg-light fs-6 fw-bold text-muted">
                        <th class="ps-4 rounded-start min-w-175px">Tipo</th>
                        <th class="min-w-70px text-start">Cobertura</th>
                        <th class="min-w-80px text-start">Alcance</th>
                        <th class="min-w-100px text-start">Departamento(s)</th>
                        <th class="min-w-70px text-start rounded-end">Municipio/Región<br/>/AIOC</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        $media_items = [
                            'TELEVISIVO' => [
                                'ENABLE' => $profile_data->media_type_television,
                                'ITEM' => $profile_data->mediaTypes['Televisivo']
                            ],
                            'RADIAL' => [
                                'ENABLE' => $profile_data->media_type_radio,
                                'ITEM' => isset($profile_data->mediaTypes['Radial']) ? $profile_data->mediaTypes['Radial'] : null
                            ],
                            'IMPRESO' => [
                                'ENABLE' => $profile_data->media_type_print,
                                'ITEM' => isset($profile_data->mediaTypes['Impreso']) ? $profile_data->mediaTypes['Impreso'] : null
                            ],
                            'DIGITAL' => [
                                'ENABLE' => $profile_data->media_type_digital,
                                'ITEM' => isset($profile_data->mediaTypes['Digital']) ? $profile_data->mediaTypes['Digital'] : null
                            ],
                        ];
                    ?>

                    <?php $__currentLoopData = $media_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($media['ENABLE']): ?>
                            <tr class="fw-bold text-gray-700 fs-7 text-end">
                                <td class="text-start pt-6">
                                    <i class="fa fa-genderless text-info fs-2 me-2"></i>
                                    <span><?php echo e($key); ?></span>
                                </td>
                                <td class="text-start pt-6"><?php echo e($media['ITEM']->coverage); ?></td>
                                <td class="text-start pt-6"><?php echo e($media['ITEM']->scope); ?></td>
                                <td class="text-start pt-6"><?php echo e($media['ITEM']->scope_department); ?></td>
                                <td class="text-start pt-6"><?php echo e(($media['ITEM']->scope !== 'Nacional' && $media['ITEM']->scope !== 'Departamental' ? $media['ITEM']->scope_area : '-')); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>



    <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">DATOS DE CONTACTO</h6>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Domicilio Legal del Medio:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->legal_address); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Celular:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->cellphone); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Página web:</label>
        </div>
        <div class="col-md-8">
            <p class="form-control form-control-plaintext"><?php echo e($profile_data->website ? $profile_data->website : '-'); ?></p>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
            <label class="fw-semibold fs-7 text-gray-600">Redes Sociales:</label>
        </div>
        <div class="col-md-8">
            <?php
                $rrss = $profile_data->rrss ? json_decode($profile_data->rrss) : [];
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
                <?php if($accreditation->fileRequestLetter): ?>
                    <input type="hidden" name="file_ro_request_letter" class="file_default" data-name="<?php echo e($accreditation->fileRequestLetter->origin_name); ?>" data-size="<?php echo e($accreditation->fileRequestLetter->size); ?>"
                           data-mimetype="<?php echo e($accreditation->fileRequestLetter->mime_type); ?>" data-path="<?php echo e($accreditation->fileRequestLetter->url_file); ?>">
                <?php endif; ?>
                <input type="file" name="media_file_ro_request_letter" class="files kt_media_files">
            </div>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <?php if($profile_data->fileLegalAttorney): ?>
        <div class="row">
            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                <label class="fw-semibold fs-7 text-gray-600">Poder Notariado (Si corresponde):</label>
            </div>
            <div class="col-md-8">
                <div class="">
                    <?php if($profile_data->fileLegalAttorney): ?>
                        <input type="hidden" name="file_ro_legal_attorney" class="file_default" data-name="<?php echo e($profile_data->fileLegalAttorney->origin_name); ?>" data-size="<?php echo e($profile_data->fileLegalAttorney->size); ?>"
                               data-mimetype="<?php echo e($profile_data->fileLegalAttorney->mime_type); ?>" data-path="<?php echo e($profile_data->fileLegalAttorney->url_file); ?>">
                    <?php endif; ?>
                    <input type="file" name="media_file_ro_legal_attorney" class="files kt_media_files">
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
                <?php if($profile_data->fileRepDocument): ?>
                    <input type="hidden" name="file_ro_rep_document" class="file_default" data-name="<?php echo e($profile_data->fileRepDocument->origin_name); ?>" data-size="<?php echo e($profile_data->fileRepDocument->size); ?>"
                           data-mimetype="<?php echo e($profile_data->fileRepDocument->mime_type); ?>" data-path="<?php echo e($profile_data->fileRepDocument->url_file); ?>">
                <?php endif; ?>
                <input type="file" name="media_file_ro_rep_document" class="files kt_media_files">
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
                <?php if($profile_data->fileNit): ?>
                    <input type="hidden" name="file_ro_nit" class="file_default" data-name="<?php echo e($profile_data->fileNit->origin_name); ?>" data-size="<?php echo e($profile_data->fileNit->size); ?>"
                           data-mimetype="<?php echo e($profile_data->fileNit->mime_type); ?>" data-path="<?php echo e($profile_data->fileNit->url_file); ?>">
                <?php endif; ?>
                <input type="file" name="media_file_ro_nit" class="files kt_media_files">
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
                <?php if($accreditation->fileAffidavit): ?>
                    <input type="hidden" name="file_ro_affidavit" class="file_default" data-name="<?php echo e($accreditation->fileAffidavit->origin_name); ?>" data-size="<?php echo e($accreditation->fileAffidavit->size); ?>"
                           data-mimetype="<?php echo e($accreditation->fileAffidavit->mime_type); ?>" data-path="<?php echo e($accreditation->fileAffidavit->url_file); ?>">
                <?php endif; ?>
                <input type="file" name="media_file_ro_affidavit" class="files kt_media_files">
            </div>
        </div>
    </div>

    <div class="separator separator-dashed border-muted"></div>

    <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">TARIFARIOS</h6>

    <?php
        $item_type_television = null;
        if($profile_data->media_type_television) {
            $item_type_television = $profile_data->mediaTypes['Televisivo'];
            $states = $item_type_television ? explode(', ', $item_type_television->scope_department) : [];
        }
    ?>
    <?php if($item_type_television): ?>
        <div class="row"><h7 class="mb-5 mt-10 fw-bolder text-gray-900">TELEVISIÓN</h7></div>
        <?php if($item_type_television->scope === 'Nacional'): ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600">Nacional:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Televisivo')->where('scope', 'Nacional')->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_television_file_rate_summary[Nacional]" class="files files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600"><?php echo e($state); ?> <?php echo e(($item_type_television->scope !== 'Nacional' && $item_type_television->scope !== 'Departamental') ? '(' . $item_type_television->scope_area . ')' : ''); ?>:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Televisivo')->where('scope', $state)->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_television_file_rate_summary[<?php echo e($state); ?>]" class="files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="separator separator-dashed border-muted"></div>






    <?php
        $item_type_radio = null;
        if($profile_data->media_type_radio) {
            $item_type_radio = $profile_data->mediaTypes['Radial'];
            $states = $item_type_radio ? explode(', ', $item_type_radio->scope_department) : [];
        }
    ?>
    <?php if($item_type_radio): ?>
        <div class="row"><h7 class="mb-5 mt-10 fw-bolder text-gray-900">RADIO</h7></div>
        <?php if($item_type_radio->scope === 'Nacional'): ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600">Nacional:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Radial')->where('scope', 'Nacional')->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_radio_file_rate_summary[Nacional]" class="files files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600"><?php echo e($state); ?> <?php echo e(($item_type_radio->scope !== 'Nacional' && $item_type_radio->scope !== 'Departamental') ? '(' . $item_type_radio->scope_area . ')' : ''); ?>:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Radial')->where('scope', $state)->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_radio_file_rate_summary[<?php echo e($state); ?>]" class="files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="separator separator-dashed border-muted"></div>




    <?php
        $item_type_print = null;
        if($profile_data->media_type_print) {
            $item_type_print = $profile_data->mediaTypes['Impreso'];
            $states = $item_type_print ? explode(', ', $item_type_print->scope_department) : [];
        }
    ?>
    <?php if($item_type_print): ?>
        <div class="row"><h7 class="mb-5 mt-10 fw-bolder text-gray-900">IMPRESO</h7></div>
        <?php if($item_type_print->scope === 'Nacional'): ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600">Nacional:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Impreso')->where('scope', 'Nacional')->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_print_file_rate_summary[Nacional]" class="files files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600"><?php echo e($state); ?> <?php echo e(($item_type_print->scope !== 'Nacional' && $item_type_print->scope !== 'Departamental') ? '(' . $item_type_print->scope_area . ')' : ''); ?>:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Impreso')->where('scope', $state)->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_print_file_rate_summary[<?php echo e($state); ?>]" class="files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="separator separator-dashed border-muted"></div>





    <?php
        $item_type_digital = null;
        if($profile_data->media_type_digital) {
            $item_type_digital = $profile_data->mediaTypes['Digital'];
            $states = $item_type_digital ? explode(', ', $item_type_digital->scope_department) : [];
        }
    ?>
    <?php if($item_type_digital): ?>
        <div class="row"><h7 class="mb-5 mt-10 fw-bolder text-gray-900">DIGITAL</h7></div>
        <?php if($item_type_digital->scope === 'Nacional'): ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600">Nacional:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Digital')->where('scope', 'Nacional')->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_digital_file_rate_summary[Nacional]" class="files files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                    <label class="fw-semibold fs-7 text-gray-600"><?php echo e($state); ?> <?php echo e(($item_type_digital->scope !== 'Nacional' && $item_type_digital->scope !== 'Departamental') ? '(' . $item_type_digital->scope_area . ')' : ''); ?>:</label>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <?php
                            $rate = $accreditation->rates->where('type', 'Digital')->where('scope', $state)->first();
                        ?>
                        <?php if($rate != null && $rate->fileRate): ?>
                            <input type="hidden" name="file_rate_summary[<?php echo e($rate->id); ?>]" class="file_default" data-name="<?php echo e($rate->fileRate->origin_name); ?>" data-size="<?php echo e($rate->fileRate->size); ?>"
                                   data-mimetype="<?php echo e($rate->fileRate->mime_type); ?>" data-path="<?php echo e($rate->fileRate->url_file); ?>">
                        <?php else: ?>
                            <div class="h-40px w-100 d-flex align-items-end px-7" style="background-color: #fafbfd"><span>-</span></div>
                        <?php endif; ?>
                        <input type="file" name="media_digital_file_rate_summary[<?php echo e($state); ?>]" class="files kt_media_files">
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="separator separator-dashed border-muted mb-20"></div>

</div><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//accreditation/partials/summaryAccreditation.blade.php ENDPATH**/ ?>