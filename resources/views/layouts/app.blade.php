<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') | Guzmán</title>

    <!-- vendor css -->
	<link href="/assets/lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/lib/typicons.font/src/font/typicons.css" rel="stylesheet">
    <link href="/assets/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="/assets/lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="/assets/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">

	<!-- Icons -->
    <link rel="stylesheet" type="text/css" href="/assets/lib/fontawesome/all.min.css">

	<!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/assets/css/dashforge.css">
	<link rel="stylesheet" href="/assets/css/dashforge.demo.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">

    @yield('css')
</head>

<body class="pos-relative" data-bs-spy="scroll" data-bs-target="#navSection" data-offset="120">

    @guest

    	@yield('content')

    @else

		<header class="navbar navbar-header navbar-header-fixed">
			<a href="#" id="sidebarMenuOpen" class="burger-menu">
				<i data-feather="arrow-left"></i>
			</a>
			<div class="navbar-brand">
				<a href="../index.html" class="df-logo">
					Te<span>Invito</span>
				</a>
			</div><!-- navbar-brand -->
			<div id="navbarMenu" class="navbar-menu-wrapper">
				<div class="navbar-menu-header">
					<a href="../index.html" class="df-logo">
						Te<span>Invito</span>
					</a>
					<a id="mainMenuClose" href="#">
						<i data-feather="x"></i>
					</a>
				</div><!-- navbar-menu-header -->
			</div><!-- navbar-menu-wrapper -->
			<div class="navbar-right">
				@include('layouts.navbar-menu')
				<!-- Avatar -->
				<a class="avatar avatar-sm p-0 ms-5" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
					<img class="avatar-img rounded-circle" src="/assets/images/avatar/01.jpg" alt="avatar">
				</a>
				<!-- Profile dropdown -->
				<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
					<!-- Profile info -->
					<li class="px-3">
						<div class="d-flex align-items-center">
							<!-- Avatar -->
							<div class="avatar me-3 mb-3">
								<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
							</div>
							<div>
								<a class="h6 mt-2 mt-sm-0" href="#">
									Emmanuel Santoyo
								</a>
								<p class="small m-0">
									example@gmail.com
								</p>
							</div>
						</div>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<!-- Links -->

				</ul>
			</div>
		<!-- navbar-right -->
		</header><!-- navbar -->

		<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
			<div class="sidebar-header">
				<a href="#" id="mainMenuOpen">
					<i data-feather="menu"></i>
				</a>
				<h5>Components</h5>
				<a href="#" id="sidebarMenuClose">
					<i data-feather="x"></i>
				</a>
			</div><!-- sidebar-header -->
			<div class="sidebar-body">
				@include('layouts.sidebar-left')
			</div><!-- sidebar-body -->
		</div><!-- sidebar -->

		<div class="content content-components me-0">
			<div class="container-fluid">
				@yield('content')

				<footer class="content-footer">
					<div>
						<span>&copy; 2023 DashForge v1.0.0. </span>
						<span>Made by <a href="http://themepixels.me/">ThemePixels</a></span>
					</div>
					<div>
						<nav class="nav">
							<a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
							<a href="../change-log.html" class="nav-link">Change Log</a>
							<a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
						</nav>
					</div>
				</footer><!-- content-footer -->

			</div><!-- container -->
		</div><!-- content -->

    @endguest

	<script src="/assets/lib/jquery/jquery.min.js"></script>
	<script src="/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/lib/feather-icons/feather.min.js"></script>
	<script src="/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="/assets/lib/prismjs/prism.js"></script>
	<script src="/assets/lib/spectrum-colorpicker/spectrum.js"></script>
	<script src="{{ asset('vendor/livewire/livewire.js') }}" defer></script>
	<script src="/assets/js/livewire-swall.js"></script>

	<script src="/assets/js/dashforge.js"></script>
	<script>
		$(function(){
			'use strict'
		});
	</script>

	@livewireScripts
	@yield('scripts')

	<!-- Bootstrap JS -->
	<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="/assets/vendor/choices/js/choices.min.js"></script>
	<script src="/assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js"></script>

	<!-- Template Functions -->
	<script src="/assets/js/functions.js"></script>

</body>

</html>
