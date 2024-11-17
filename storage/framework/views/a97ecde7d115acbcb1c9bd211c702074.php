<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo e(config('app.name')); ?> | <?php echo $__env->yieldContent('title', $page_title ?? ''); ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <link href="<?php echo e(asset('themes/landing/css/style.web.css')); ?>" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldContent('styles'); ?>
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <?php echo $__env->make('vendor@template::landing.components.base._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('vendor@template::landing.components.base._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php echo $__env->make('vendor@template::landing.components.partials._scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>var hostUrl = "/";</script>
<script src="<?php echo e(asset('themes/common/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('themes/admin/js/scripts.bundle.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Vendor\Template/UI/WEB/Views//landing/layouts/master.blade.php ENDPATH**/ ?>