

<?php $__env->startSection('content'); ?>
    <!--begin:: Section-->
    <div class="mt-lg-15 mb-lg-15 position-relative z-index-2">
        <div class="container">
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body p-lg-15">

                    <div class="position-relative mb-17">
                        <div class="overlay overlay-show">
                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
                                 style="background-image:url(<?php echo e(asset('themes/admin/media/stock/1600x800/img-1.jpg')); ?>)"></div>
                            <div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
                        </div>
                        <div class="position-absolute text-white mb-8 ms-10 bottom-0">

                        </div>
                    </div>

                    <div class="row">

                        <div class="text-center mb-17">
                            <h4 class="fs-1 text-gray-900 mb-2">Lista de Medios de Comunicación habilitados</h4>
                            <div class="fs-5 text-muted fw-bold">Publicación por Proceso Electoral
                            </div>
                        </div>

                        <!--begin::Accordion-->
                        <div class="accordion" id="kt_accordion_1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                    <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                        <span class="fs-2 fw-bolder">NACIONAL</span>
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body">

                                        <div class="mx-auto w-100 mw-700px pt-10 pb-10" id="form_media_content">
                                            <div class="mt-n1">
                                                <div class="d-flex flex-stack_ pb-10">
                                                    <img alt="Logo" src="<?php echo e(asset('themes/common/media/logos/logo_oep.png')); ?>" class="h-100px" />
                                                    <div class="text-sm-end fw-semibold fs-7 text-muted">
                                                        <img alt="Logo Proceso Electoral" src="http://monitoreo-oep.test/storage/elecciones/logos/1670f8d7__judiciales.jpg" class="h-100px mb-2" />
                                                    </div>

                                                    <div class="fw-bold fs-3 text-gray-800 text-start mb-12">Informe de Análisis al Reporte de Monitoreo de Vulneraciones al Reglamento de Difusión de Propaganda y Campaña Electoral </div>
                                                </div>
                                                <div class="m-0">

                                                    <div class="text-center mb-17">
                                                        <div class="fs-5 text-muted fw-bold">Registro de Medios de Comunicación<br/>
                                                        <h4 class="fs-2hx text-gray-900 mb-2">Alcance Nacional</h4>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1">
                                                        <?php $__currentLoopData = ['TV','RADIO','PRINT','DIGITAL','RRSS']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <div class="d-flex align-items-center mb-3 mt-10">
                                                                    <span class="bullet bullet-vertical h-30px bg-primary me-3"></span>
                                                                    <div class="flex-grow-1">
                                                                        <a class="text-primary fw-bold fs-6">
                                                                            <?php switch($media_type):
                                                                                case ('TV'): ?>
                                                                                <span>Medios Televisivos</span>
                                                                                <?php break; ?>
                                                                                <?php case ('RADIO'): ?>
                                                                                <span>Medios Radiales</span>
                                                                                <?php break; ?>
                                                                                <?php case ('PRINT'): ?>
                                                                                <span>Medios Impresos</span>
                                                                                <?php break; ?>
                                                                                <?php case ('DIGITAL'): ?>
                                                                                <span>Medios Digitales</span>
                                                                                <?php break; ?>
                                                                                <?php case ('RRSS'): ?>
                                                                                <span>Redes Sociales</span>
                                                                                <?php break; ?>
                                                                            <?php endswitch; ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table border align-middle gs-0 gy-4 mb-3">
                                                                        <thead>
                                                                            <tr class="bg-light fs-6 fw-bold text-muted">
                                                                                <th class="ps-4 rounded-start__ min-w-20px text-center">#</th>
                                                                                <th class="min-w-70px text-start">Medio</th>

        
                                                                                <th class="pe-4 min-w-70px text-start rounded-end__">Opciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <tr class="border-bottom fw-bold text-gray-700 fs-7">
                                                                                <td class="text-center">1</td>
                                                                                <td class="text-start">
                                                                                    <div class="ms-0">
                                                                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">
                                                                                            Radiodifusoras Populares SRL
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-start">
                                                                                    <a href="https://spank-ind.com/collections/spank-hex-drive-hubs/products/spank-hex-j-type-rear-hub?variant=39467132485718">
                                                                                        Descargar
                                                                                    </a>
                                                                                </td>
                                                                            </tr>

                                                                            <tr class="border-bottom fw-bold text-gray-700 fs-7">
                                                                                <td class="text-center">2</td>
                                                                                <td class="text-start">
                                                                                    <div class="ms-0">
                                                                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">
                                                                                            Televisión Red UNO
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-start">
                                                                                    <a href="https://spank-ind.com/collections/spank-hex-drive-hubs/products/spank-hex-j-type-rear-hub?variant=39467132485718">
                                                                                        Descargar
                                                                                    </a>
                                                                                </td>
                                                                            </tr>


                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_2">
                                    <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body">
                                        ...
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_3">
                                    <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body">
                                        ...
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Accordion-->

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end:: Section-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\Website/UI/WEB/Views//listAccreditationRates.blade.php ENDPATH**/ ?>