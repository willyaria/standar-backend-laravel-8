<!--<div class="fancy-title title-border topmargin-lg">
	<h3>Hiburan</h3>
</div>-->
<div style="margin-top: 20px;">&nbsp;</div>
<button type="button" class="btn btn-primary btn-lg btn-block">Hiburan</button>
<div style="margin-top: 20px;">&nbsp;</div>
<?php
	function tanggal_local($tgl, $tampil_hari = false)
	{
		$nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$nama_bulan = array(
            1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "November", "Desember"
		);
		$tahun = substr($tgl, 0, 4);
		$bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
		$tanggal = substr($tgl, 8, 2);
		$text = "";
		if ($tampil_hari) {
			$urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
			$hari = $nama_hari[$urutan_hari];
			$text .= $hari . ", ";
		}
			$text .= $tanggal . " " . $bulan . " " . $tahun;
			return $text;
	}
	  
	function tanggal_indonesia($tgl, $tampil_hari=true)
	{
		$nama_hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$nama_bulan = array (
            1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "November", "Desember");
		$tahun=substr($tgl,0,4);
		$bulan=$nama_bulan[(int)substr($tgl,5,2)];
		$tanggal=substr($tgl,8,2);
		$text="";
		if ($tampil_hari) {
			$urutan_hari=date('w', mktime(0,0,0, substr($tgl,5,2), $tanggal, $tahun));
			$hari=$nama_hari[$urutan_hari];
			$text .= $hari.", ";
		}
			$text .=$tanggal ." ". $bulan ." ". $tahun;
			return $text;
	}
?>

<?php foreach ($foto_hiburan as $dt) { ?>

<div id="posts" class="small-thumbs">
	<div class="entry clearfix">
		<div class="entry-image">
			<a href="<?= $dt->url_image.$dt->image ?>" data-lightbox="image"><img class="image_fade" src="<?= $dt->url_image.$dt->image ?>" alt="Standard Post with Image"></a>
		</div>
		<div class="entry-c">
			<div class="entry-title">
				<h2><a href="{{url('/detail_hiburan',array($dt->id,$dt->alias))}}"><?= $dt->title ?></a></h2>
			</div>
			<ul class="entry-meta clearfix">
				<li><i class="icon-calendar3"></i><?= tanggal_local($dt->publish_up) ?></li>
				<li><a href="#"><i class="icon-user"></i><?= $dt->first_name ?> <?= $dt->last_name ?></a></li>
				<li><?= $dt->view ?> View</li>
			</ul>
			<div class="entry-content">
				<p><?= substr($dt->caption,0,200) ?>...</p>
				<a href="{{url('/detail_hiburan',array($dt->id,$dt->alias))}}"class="more-link">Read More</a>
			</div>
		</div>
	</div>
</div>

<?php } ?>