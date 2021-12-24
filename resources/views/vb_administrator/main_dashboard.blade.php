<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <title>Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="themes/material-pro/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS --> 
    <link href="themes/material-pro/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="themes/material-pro/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <![endif]-->

</head>

<body class="fix-header single-column card-no-border">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light" style="background: #1e88e5;">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header" style="background: rgba(0, 0, 0, 0);">
                    <a class="navbar-brand" href="" >
                        <!-- Logo text -->
						<span>

						  <h4 class="light-logo">HELLO GUYS</h4>
                        
						</span>
                    </a>
                </div>
				{{ csrf_field() }}
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                        </li>

                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <?php
                            if(empty($user->foto)) {
                                $img = 'user-default.png';
                            } else {
                                $img = $user->foto;
                            }
							
							foreach ($user as $dt) {
                            ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{url('/')}}<?= $dt->image ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Hai, <?= $dt->first_name ?> <?= $dt->last_name ?></h4>
                                                <p class="text-muted">NIK : <?= $dt->nik ?></p> 
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
							<?php } ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-8 col-xs-12 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Welcome to My Creativity dan Innovation System</h3>
                    </div>
                    <div class="col-md-7 col-xs-12 align-self-center">
                        <!-- <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4>
                                </div>
                                <div class="spark-chart">
                                    <div id="monthchart">

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">$48,356</h4>
                                </div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart">

                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <?php 
                    $jmlarr = count($ubisugroup);
                    if ($jmlarr == 5) {
                        $col = '<div class="col">';
                    } elseif ($jmlarr < 5) {
                        $col = '<div class="col-md-3 col-xs-12">';
                    }

                    foreach ($ubisugroup as $ubis) {
                        echo $col;
                    ?>
						<div class="card">
							 <img class="card-img-top img-responsive" src="{{ url('/') }}/uploads/pohon.png" style="padding:20px;">
							<div class="card-body">
								<?php if ($ubis->group_id!=0) { ?>
									<p class="card-text">You have <b><strong><?= $ubis->groupx ?></strong></b> previleges in this unit system.</p>
									<button type="submit" id="dashboard_btn" class="btn btn-primary" onclick="toDashboard(<?=$ubis->unis_id?>,<?=$ubis->group_id?>)">Go to Dashboard</button> 
								<?php } else if ($ubis->group_id==0) { ?>							
									<p class="card-text">You do not have whatever previleges in the unit system.</p>
								<?php } ?>
								
								
							</div>
						</div>
					</div>
					<?php
					}
					?>

            </div> 
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- <pre><?php //print_r($this->session->all_userdata()); ?></pre> -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php
            // echo "<h1>MAINTENANCE SERVICE, SORRY</h1>";
            // echo "<pre>"; print_r($this->session->all_userdata()); echo "</pre>";
        ?>
        <footer class="footer text-center">
            © <?php echo date('Y') ?> Content Management System by Aceng Willy
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="themes/material-pro/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="themes/material-pro/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="themes/material-pro/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="themes/material-pro/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="themes/material-pro/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="themes/material-pro/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="themes/material-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="themes/material-pro/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="themes/material-pro/js/custom.min.js"></script>
    <script src="themes/material-pro/js/mask.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="themes/material-pro/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
	<!-- Notify -->
	<script src="themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script type="text/javascript">
		function toDashboard(id_unit,id_usergroup) {
			$.ajax({
				type: "POST",
				url: "{{ url('dashboard') }}",
				data: {
					"_token"		: "{{ csrf_token() }}",
					id_unit: id_unit,
					id_usergroup: id_usergroup
				},
				beforeSend: function() {
					$(".preloader").fadeIn();
				},
				success: function(data) {
					// if (data.status == true) { 
						go_to_dashboard();
					// } else {
						// $.notify({
							// title: '<strong>Gagal!</strong>',
							// message: 'Silakan diulangi.'
						// }, {
							// type: 'danger',
							// placement: {
								// from: "top",
								// align: "center"
							// }
						// });
						// go_to_default();
					// }
				},

				complete: function() {
				}
			});
		}
 
		function go_to_dashboard() {
			var url = "home/";
			window.open(url, "_self");		
		}

		function go_to_default() {
			var url = "admin";
			window.open(url, "_self");
		}
	</script>
</body>

</html> 
<?php
        // echo "<pre>";
         	// print_r($this->session->all_userdata());
        // echo "</pre>";   
		 
?>
