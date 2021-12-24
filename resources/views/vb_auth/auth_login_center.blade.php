<!DOCTYPE html>
<html lang="en">

<style>

</style>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Favicon icon -->
   <!-- <link rel="icon" type="image/png" sizes="16x16" href="../urls/images/favicon.png"> -->
   <title>Login</title>
   <!-- Bootstrap Core CSS -->
   <link href="{{url('themes/material-pro/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   <!-- Custom CSS -->
   <link href="{{url('themes/material-pro/css/style.css')}}" rel="stylesheet">
   <!-- You can change the theme colors from here -->
   <link href="{{url('themes/material-pro/css/colors/blue.css')}}" id="theme" rel="stylesheet">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
		</svg>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	
	<section id="wrapper">
        <div class="login-register" style="background-image:url('uploads/earth-day.jpg');">        
            <div class="login-box card">
				<div class="card-body">
					<form class="form-horizontal form-material" action="{{ url('/loginPost') }}" method="post">
						{{ csrf_field() }}
						<div style="text-align:center;"><img align="middle" src="{{ url('/') }}/uploads/earth.png" width="250" class="light-logo" alt="Login" /></div>
						@if(\Session::has('alert'))
						<div class="alert alert-danger">
							<div>{{Session::get('alert')}}</div>
						</div>
						@endif
						@if(\Session::has('alert-success'))
							<div class="alert alert-success">
								<div>{{Session::get('alert-success')}}</div>
							</div>
						@endif
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required="" placeholder="Username" id="username" name="username" autocomplete="off"> </div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required="" placeholder="Password" id="password" name="password" autocomplete="off"> </div>
						</div>
						
						<div class="form-group text-center m-t-20">
							<div class="col-xs-12">
								<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
							</div>
						</div>
					<!--	<div text align="center">by Ponpes Agro Nuur El-Falah | Aceng Willy.</text></div> -->
						
					</form>
					
				</div>
			 </div>
        </div>
        
    </section>
	
	

	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="{{url('themes/material-pro/assets/plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="{{url('themes/material-pro/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
	<script src="{{url('themes/material-pro/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="{{url('themes/material-pro/js/jquery.slimscroll.js')}}"></script>
	<!--Wave Effects -->
	<script src="{{url('themes/material-pro/js/waves.js')}}"></script>
	<!--Menu sidebar -->
	<script src="{{url('themes/material-pro/js/sidebarmenu.js')}}"></script>
	<!--stickey kit -->
	<script src="{{url('themes/material-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
	<script src="{{url('themes/material-pro/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
	<!--Custom JavaScript -->
	<script src="{{url('themes/material-pro/js/custom.min.js')}}"></script>
	<!-- ============================================================== -->
	<!-- Style switcher -->
	<!-- ============================================================== -->
	<script src="{{url('themes/material-pro/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>
</html>