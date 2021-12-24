@extends('template.materialpro.template')
@section('content')

<?php
	function bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Januari";
				break;

			case 2:
				return "Februari";
				break;

			case 3:
				return "Maret";
				break;

			case 4:
				return "April";
				break;

			case 5:
				return "Mei";
				break;

			case 6:
				return "Juni";
				break;

			case 7:
				return "Juli";
				break;

			case 8:
				return "Agustus";
				break;

			case 9:
				return "September";
				break;

			case 10:
				return "Oktober";
				break;

			case 11:
				return "November";
				break;

			case 12:
				return "Desember";
				break;
		}
	}
	
	function longdate_indo2($tanggal)
	{
		$ubah 	= gmdate($tanggal, time() + 60 * 60 * 8);
		$pecah 	= explode("-", $ubah);
		$tgl 		= $pecah[2];
		$bln 		= $pecah[1];
		$thn 		= $pecah[0];
		$bulan 	= bulan($pecah[1]);

		$nama 		= date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
		$nama_hari 	= "";
		if ($nama == "Sunday") {
			$nama_hari = "Minggu";
		} else if ($nama == "Monday") {
			$nama_hari = "Senin";
		} else if ($nama == "Tuesday") {
			$nama_hari = "Selasa";
		} else if ($nama == "Wednesday") {
			$nama_hari = "Rabu";
		} else if ($nama == "Thursday") {
			$nama_hari = "Kamis";
		} else if ($nama == "Friday") {
			$nama_hari = "Jumat";
		} else if ($nama == "Saturday") {
			$nama_hari = "Sabtu";
		}
		return $nama_hari . ', ' . $tgl . ' ' . $bulan . ' ' . $thn;
	}
?>

<style type="text/css">
 	.jam_analog {
		background: #e7f2f7;
		position: relative;
		width: 200px;
		height: 200px;
		border: 16px solid #52b6f0;
		border-radius: 50%;
		padding: 20px;
		margin:20px auto;
	}
 
	.xxx {
		height: 100%;
		width: 100%;
		position: relative;
	}
 
	.jarum {
		position: absolute;
		width: 50%;
		background: #232323;
		top: 50%;
		transform: rotate(90deg);
		transform-origin: 100%;
		transition: all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1);
	}
 
	.lingkaran_tengah {
		width: 24px;
		height: 24px;
		background: #232323;
		border: 4px solid #52b6f0;
		position: absolute;
		top: 50%;
		left: 50%;
		margin-left: -14px;
		margin-top: -14px;
		border-radius: 50%;
	}
 
	.jarum_detik {
		height: 2px;
		border-radius: 1px;
		background: #F0C952;
	}
 
	.jarum_menit {
		height: 4px;
		border-radius: 4px;
	}
 
	.jarum_jam {
		height: 8px;
		border-radius: 4px;
		width: 35%;
		left: 15%;
	}
</style>

<div class="col-lg-4 col-md-5">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title"><?php  echo longdate_indo2(date('Y-m-d'))?></h3>
			<h6 class="card-subtitle"><span class="jam"></h6>
			<div class="jam_analog">
				<div class="xxx">
					<div class="jarum jarum_detik"></div>
					<div class="jarum jarum_menit"></div>
					<div class="jarum jarum_jam"></div>
					<div class="lingkaran_tengah"></div>
				</div>
			</div>
		</div>
	<!--	<div>
			<hr class="m-t-0 m-b-0">
		</div>
		<div class="card-body text-center">
			<h4 class="card-title text-center">Video Hari ini</h4>
			<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">

				
					
				</div>
			</div>
		</div> -->
	</div>
</div>

<?php 
	echo "<pre>"; print_r($all_session); echo "</pre>";
?>


<!-- JQuery -->
<script src="themes/material-pro/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
	const secondHand = document.querySelector('.jarum_detik');
	const minuteHand = document.querySelector('.jarum_menit');
	const jarum_jam = document.querySelector('.jarum_jam');
 
	function setDate(){
		const now = new Date();
 
		const seconds = now.getSeconds();
		const secondsDegrees = ((seconds / 60) * 360) + 90;
		secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
		if (secondsDegrees === 90) {
			secondHand.style.transition = 'none';
		} else if (secondsDegrees >= 91) {
			secondHand.style.transition = 'all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1)'
		}
 
		const minutes = now.getMinutes();
		const minutesDegrees = ((minutes / 60) * 360) + 90;
		minuteHand.style.transform = `rotate(${minutesDegrees}deg)`;
 
		const hours = now.getHours();
		const hoursDegrees = ((hours / 12) * 360) + 90;
		jarum_jam.style.transform = `rotate(${hoursDegrees}deg)`;
	}
 
	setInterval(setDate, 1000)
</script>

@endsection