<!DOCTYPE html>
<html lang="en">
<head>
    <title>404 | <?php echo e(config('app.name')); ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="/" />
    <link rel="shortcut icon" href="<?php echo e(asset('themes/common/media/logos/favicon/favicon.ico')); ?>" />
    <link href="<?php echo e(asset('themes/external/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body id="kt_body" class="auth-bg bgi-size-cover bgi-position-center bgi-no-repeat">
<script>
    var defaultThemeMode = "light";
    var themeMode;
    if ( document.documentElement ) {
        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if ( localStorage.getItem("data-bs-theme") !== null ) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        } document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<div class="d-flex flex-column flex-root">
    <style>body { background-image: url(<?php echo e(asset('themes/common/media/auth/bg6.jpg')); ?>); } [data-bs-theme="dark"] body { background-image: url(<?php echo e(asset('themes/common/media/auth/bg6-dark.jpg')); ?>); }</style>
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <div class="d-flex flex-column flex-center text-center p-10">
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">
                    <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">¡Página no econtrada!</h1>
                    <div class="fw-semibold fs-6 text-gray-500 mb-7">La página que buscas no existe o se movió, intenta nuevamente más tarde.</div>
                    <div class="mb-3">
                        <img src="<?php echo e(asset('themes/common/media/auth/404-error.png')); ?>" class="mw-100 mh-300px theme-light-show" alt="" />
                        <img src="<?php echo e(asset('themes/common/media/auth/404-error-dark.png')); ?>" class="mw-100 mh-300px theme-dark-show" alt="" />
                    </div>
                    <div class="mb-0">
                        <a href="<?php echo e(route('web_index')); ?>" class="btn btn-sm btn-dark">Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\resources\views/errors/404.blade.php ENDPATH**/ ?>