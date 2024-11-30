<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head>
		<title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="@yield('title', $page_title ?? '')" />
		<meta property="og:url" content="/" />
		<meta property="og:site_name" content="{{ config('app.name') }}" />
		<link rel="canonical" href="/" />

		<link rel="shortcut icon" href="{{ asset('themes/common/media/logos/favicon/favicon.ico') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link href="{{ asset('themes/common/css/style.font.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('themes/common/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('themes/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('themes/admin/css/style.oep.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        @yield('styles')
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
					@include('vendor@template::admin.components.base._header')
                    <!--end::Header-->
					<!--begin::Toolbar-->
					<div class="toolbar py-3 py-lg-6" id="kt_toolbar">
						<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
							@yield('breadcrumbs')
						</div>
					</div>
					<!--end::Toolbar-->
					<!--begin::Container-->
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						@yield('content')
					</div>
					<!--end::Container-->
					<!--begin::Footer-->
                    @include('vendor@template::admin.components.base._footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

		<!--begin::Scrolltop-->
		@include('vendor@template::admin.components.partials._scrolltop')
		<!--end::Scrolltop-->

		<!--begin::Modals-->
		@yield('modals')
		<!--end::Modals-->
		
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('themes/common/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('themes/admin/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
        @yield('scripts')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>