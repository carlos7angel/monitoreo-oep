<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
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
    <link href="<?php echo e(asset('themes/external/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('themes/external/css/style.external.css')); ?>" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldContent('styles'); ?>

    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">

<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

        <?php echo $__env->make('vendor@template::external.components.base._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <div id="kt_app_toolbar" class="app-toolbar py-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
                    <div class="d-flex flex-column flex-row-fluid">
                        <div class="d-flex align-items-center pt-1">
                            
                            <?php echo $__env->yieldContent('breadcrumbs'); ?>
                        </div>
                        <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                            
                            <?php echo $__env->yieldContent('headline'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-container container-xxl">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                    <?php echo $__env->make('vendor@template::external.components.base._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->yieldContent('modals'); ?>

<?php echo $__env->make('vendor@template::external.components.partials._scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>var hostUrl = "/";</script>
<script src="<?php echo e(asset('themes/common/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('themes/admin/js/scripts.bundle.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Vendor\Template/UI/WEB/Views//external/layouts/master.blade.php ENDPATH**/ ?>