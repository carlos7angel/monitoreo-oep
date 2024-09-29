<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('title', $page_title ?? '')" />
    <meta property="og:url" content="/" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <link rel="canonical" href="/" />
    <link rel="shortcut icon" href="{{ asset('themes/common/media/logos/favicon/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('themes/common/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/external/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/landing/css/style.web.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Header Section-->
    @include('vendor@template::landing.components.base._header')
    <!--end::Header Section-->

    @yield('content')

    <!--begin::Footer Section-->
    @include('vendor@template::landing.components.base._footer')
    <!--end::Footer Section-->
</div>
<!--end::Root-->

<!--begin::Scrolltop-->
@include('vendor@template::landing.components.partials._scrolltop')
<!--end::Scrolltop-->

<script>var hostUrl = "/";</script>

<script src="{{ asset('themes/common/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('themes/admin/js/scripts.bundle.js') }}"></script>

{{--<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>--}}
{{--<script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>--}}
{{--<script src="assets/js/custom/landing.js"></script>--}}
@yield('scripts')

</body>

</html>