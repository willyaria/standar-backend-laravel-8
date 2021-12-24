<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	@include('template.canvasmultipurpose.default-public-slider-home.css')

	<!-- Document Title
	============================================= -->
	<title>Home - Programmer</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		
	<!--	<section id="slider" class="slider-element slider-parallax full-screen with-header force-full-screen clearfix">

			<div class="slider-parallax-inner">

				<div class="full-screen force-full-screen" style="background: url('uploads/foto_home.jpg') center center no-repeat; background-size: cover;">

					<div class="container clearfix">
						<div class="emphasis-title vertical-middle center">
							<h1 data-animate="fadeInUp">Welcome to <strong>Canvas</strong></h1>
						</div>
					</div>

				</div>
			</div>

		</section> -->
		
		@include('template.canvasmultipurpose.default-public-slider-home.header')

		

			

		

		<!-- Content
		============================================= -->
		<div class="content-page" id="content_page">
			@yield('content')
		</div><!-- #content end -->

		@include('template.canvasmultipurpose.default-public-slider-home.footer')

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	@include('template.canvasmultipurpose.default-public-slider-home.js')

</body>
</html>