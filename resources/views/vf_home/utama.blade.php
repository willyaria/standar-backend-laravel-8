@extends('template.canvasmultipurpose.default-public.template')
@section('content')
	
	<style>
		.p1{
		  font-family: "Segoe Script";
		  font-size: 40px;
		}
		p {
		  font-size: 400px;
		}
		h2 {
		  font-size: 60px;
		  color:black;
		}
		.gambarsorot img{
			-webkit-transform:scale(0.9);
			-moz-transform:scale(0.9);
			-o-transform:scale(0.9);
			-webkit-transition-duration: 0.5s;
			-moz-transition-duration: 0.5s;
			-o-transition-duration: 0.5s;
			opacity: 0.8;
			margin: 0 10px 5px 0;
		}
		.gambarsorot img:hover{
			-webkit-transform:scale(1.1);
			-moz-transform:scale(1.1);
			-o-transform:scale(1.1);
			box-shadow:0px 0px 30px black;
			-webkit-box-shadow:0px 0px 30px black;
			-moz-box-shadow:0px 0px 30px black;
			opacity: 1;
		}

	</style>
	
	<div class="content-wrap">

		<div class="container clearfix">
			<div class="row clearfix">

				<div class="col-xl-5">
					<div class="heading-block topmargin">
						<h1 class="p1" style="color:#800c91">Selamat Datang Anak Muda Penuh Kreatifitas</h1>
					</div>
					<p style="font-size:20px;font-family:Palatino Linotype;color:black;">yang Muda yang Berkarya, saatnya Berkarya bukan Bergaya</p>
				</div>

				<div class="col-xl-7">

					<div style="position: relative; margin-bottom: -60px;" class="ohidden" data-height-xl="426" data-height-lg="567" data-height-md="470" data-height-md="287" data-height-xs="183">
						<img src="{{url('uploads/foto_home.jpg')}}" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Chrome">
					</div>

				</div>

			</div>
		</div>
	</div>
	
	<div class="container clearfix">
		<div class="fancy-title title-border title-center topmargin-sm">
			<h4>Knowledge and Skills</h4>
		</div>

		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#D01C1C" data-size="150" data-percent="53" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="53" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>HTML</h5>
		</div>

		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#1770A4" data-size="150" data-percent="42" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="42" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>CSS</h5>
		</div>

		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#6A89AA" data-size="150" data-percent="66" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="66" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>PHP</h5>
		</div>

		<div class="col_one_fourth nobottommargin center col_last">
			<div class="rounded-skill" data-color="#248673" data-size="150" data-percent="57" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="57" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>jQuery</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#9323c6" data-size="150" data-percent="44" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="44" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>Javascript</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#ffef05" data-size="150" data-percent="49" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="49" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>AJAX</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#10c7d0" data-size="150" data-percent="51" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="51" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>Laravel</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center col_last">
			<div class="rounded-skill" data-color="#df249f" data-size="150" data-percent="69" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="69" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>MySQL</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#0a4223" data-size="150" data-percent="34" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="34" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>CorelDraw</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#1763b5" data-size="150" data-percent="62" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="62" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>CMS (Core Management System)</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center">
			<div class="rounded-skill" data-color="#f03472" data-size="150" data-percent="67" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="67" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>Software</h5>
		</div>
		
		<div class="col_one_fourth nobottommargin center col_last">
			<div class="rounded-skill" data-color="#251ba2" data-size="150" data-percent="38" data-width="2" data-animate="3000">
				<div class="counter counter-inherit"><span data-from="1" data-to="38" data-refresh-interval="50" data-speed="3000"></span>%</div>
			</div>
			<h5>Hardware</h5>
		</div>
	</div>

	<!-- Page Title
		============================================= -->
	<section id="page-title" style="margin-top: 15px;">

		<div class="container clearfix">
			<div id="posts" class="post-grid grid-container post-masonry grid-2 clearfix">

				<div class="entry clearfix">
					<div class="entry-image gambarsorot">
						<a href="{{url('uploads/foto_about.jpg')}}" data-lightbox="image"><img class="image_fade" src="{{url('uploads/foto_about.jpg')}}" alt="Standard Post with Image"></a>
					</div>
				</div>

				<div class="entry clearfix">
					<h2 style="color:#800c91">ABOUT</h2>
				</div>

				<div class="entry">
					<h3 style="color:black;">Saya adalah harapan bangsa, generasi muda yang berbakat. Indonesia menunggu saya untuk mendunia bukan menunggu saya untuk putus asa.</h3>
				</div>
			</div>
		</div>

	</section><!-- #page-title end -->
	
	
@endsection