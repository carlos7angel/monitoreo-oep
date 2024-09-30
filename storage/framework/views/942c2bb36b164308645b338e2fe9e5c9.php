<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <base href="/" />
    <title><?php echo e(config('app.name')); ?> | <?php echo $__env->yieldContent('title', $page_title ?? ''); ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', $page_title ?? ''); ?>" />
    <meta property="og:url" content="/" />
    <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>" />
    <link rel="canonical" href="/" />

    <link rel="shortcut icon" href="<?php echo e(asset('themes/common/media/logos/favicon/favicon.ico')); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?php echo e(asset('themes/common/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('themes/admin/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('themes/admin/css/style.oep.css')); ?>" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldContent('styles'); ?>
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<body id="kt_body" class="app-blank">
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-color: #883f7e;">
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <a href="#" class="mb-0 mb-lg-12">

                    <img alt="Logo" src="<?php echo e(asset('themes/common/media/logos/logo_oep.png')); ?>" class="h-180px h-lg-200px" />
                </a>

                <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Sistema de Registro de Medios</h1>
                <div class="d-none d-lg-block text-white fs-base text-center">
                    El Sistema de Registro de Medios es la plataforma para<br />
                    registrar su información para el Tribunal Supremo Electoral.<br />
                    Le permitirá realizar registros y/o solicitudes de los diferentes<br />
                    Procesos ELectorales habilitados.
                </div>
            </div>
        </div>
    </div>
</div>
<script>var hostUrl = "/";</script>
<script src="<?php echo e(asset('themes/common/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('themes/admin/js/scripts.bundle.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Vendor\Template/UI/WEB/Views//external/layouts/auth.blade.php ENDPATH**/ ?>