<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>TwoVPN - Client Portal Dashboard</title>

	<link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="{{{asset('assets/css/fonts/linecons/css/linecons.css')}}}">
	<link rel="stylesheet" href="{{{asset('assets/css/fonts/fontawesome/css/font-awesome.min.css')}}}">
	<link rel="stylesheet" href="{{{asset('assets/css/bootstrap.css')}}}">
	<link rel="stylesheet" href="{{{asset('assets/css/xenon-core.css')}}}">
	<link rel="stylesheet" href="{{{asset('assets/css/xenon-forms.css')}}}">
	<link rel="stylesheet" href="{{{asset('assets/css/xenon-components.css')}}}">
	<link rel="stylesheet" href="{{{asset('assets/css/xenon-skins.css')}}}">
	<link rel="stylesheet" href="{{{asset('assets/css/custom.css')}}}">

	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<script src="{{{asset('assets/js/jquery-1.11.1.min.js')}}}"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">

	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			@include('portal.layouts.partials.sidebar')
		</div>
		
		<div class="main-content">
					
			<!-- User Info, Notifications and Menu Bar -->
			<nav class="navbar user-info-navbar" role="navigation">	
				@include('portal.layouts.partials.navbar')				
			</nav>
					
			@yield('content')
			
			
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						@include('layouts.partials.footer')
					</div>
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>

	</div>
	
	
	<div class="page-loading-overlay">
		<div class="loader-2"></div>
	</div>
	



	<!-- Bottom Scripts -->
	<script src="{{{asset('assets/js/bootstrap.min.js')}}}"></script>
	<script src="{{{asset('assets/js/TweenMax.min.js')}}}"></script>
	<script src="{{{asset('assets/js/resizeable.js')}}}"></script>
	<script src="{{{asset('assets/js/joinable.js')}}}"></script>
	<script src="{{{asset('assets/js/xenon-api.js')}}}"></script>
	<script src="{{{asset('assets/js/xenon-toggles.js')}}}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{{asset('assets/js/xenon-widgets.js')}}}"></script>
	<script src="{{{asset('assets/js/devexpress-web-14.1/js/globalize.min.js')}}}"></script>
	<script src="{{{asset('assets/js/devexpress-web-14.1/js/dx.chartjs.js')}}}"></script>
	<script src="{{{asset('assets/js/toastr/toastr.min.js')}}}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{{asset('assets/js/xenon-custom.js')}}}"></script>
	@yield('script')

</body>
</html>