<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	@include('template.canvasmultipurpose.default-public.css')

	<!-- Document Title
	============================================= -->
	<title>Home - Kreatifitas Tanpa Batas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		@include('template.canvasmultipurpose.default-public.header')

		

		<!-- Content
		============================================= -->
		<div class="content-page" id="content_page">
			@yield('content')
		</div><!-- #content end -->

		@include('template.canvasmultipurpose.default-public.footer')

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	@include('template.canvasmultipurpose.default-public.js')

</body>
</html>