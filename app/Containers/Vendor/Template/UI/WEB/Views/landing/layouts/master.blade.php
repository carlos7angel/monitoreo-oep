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
    <link href="{{ asset('themes/common/css/style.font.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/common/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/external/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/landing/css/style.web.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    @include('vendor@template::landing.components.base._header')
    @yield('content')
    @include('vendor@template::landing.components.base._footer')
</div>
@include('vendor@template::landing.components.partials._scrolltop')
<script>var hostUrl = "/";</script>
<script src="{{ asset('themes/common/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('themes/admin/js/scripts.bundle.js') }}"></script>
@yield('scripts')
</body>
</html>