@extends('template.canvasmultipurpose.default-public-anefsa.template')
@section('content')

<?php
	function tgl_indo($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan($bln){
		switch ($bln){
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
?>

<style>
.btn-button1 {
	width: 100%;
	background-color: #4CAF50;
	border-color: #4CAF50;
	color: #fff;
}
div.font_custom {
  font-size: 20px;
  text-align: justify;
}
div.font_bold {
  font-size: 30px;
  font-weight: bold;
}
</style>

<div class="content-wrap">
	<div class="container clearfix">
		<div class="postcontent nobottommargin clearfix font_custom">
			
			<?php foreach ($foto_berita_detail as $dt) { ?>
			<input type="hidden" id="id" name="id" value="<?= $dt->id ?>">

				<!-- Entry Title
				============================================= -->
				<div class="entry-title" style="margin-bottom: 30px">
					<div class="font_bold"><?= $dt->title ?></div>
				</div><!-- .entry-title end -->			
			
				<!-- Entry Image
				============================================= -->
				<div class="entry-image">
					<img src="{{url('/')}}<?= $dt->url_image.$dt->image ?>" alt="Blog Single">
				</div><!-- .entry-image end -->
				
				<!-- Entry Meta
				============================================= -->
				<ul class="entry-meta clearfix">
					<li><i class="icon-calendar3"></i><?= tgl_indo($dt->created) ?></li>
					<li><a href="#"><i class="icon-user"></i> <?= $dt->first_name ?> <?= $dt->last_name ?></a></li>
				</ul><!-- .entry-meta end -->

				<!-- Entry Content
				============================================= -->
				<div class="entry-content notopmargin">

					<p><?= htmlspecialchars_decode(htmlspecialchars_decode($dt->full_caption)) ?></p>

				</div>	
			<?php } ?>
		</div>
		
		<!-- Sidebar
		============================================= -->
		<div class="sidebar nobottommargin col_last">
			<div class="sidebar-widgets-wrap">

				<div class="widget clearfix">

					<button type="button" class="btn btn-button1" style="margin-bottom: 10px;font-size: 18px;">Artikel</button>
					<div id="post-list-footer">
						<?php foreach ($artikel as $dt1) { ?>
						<div class="spost clearfix">
							<div class="entry-image" style="width: 150px;height: 100px">
								<img src="{{url('/')}}<?= $dt1->url_thumb.$dt1->thumb ?>" style="width: 150px;height: 100px">
							</div>
							<div class="entry-c">
								<div class="entry-title">
									<h4><a href="{{url('/detail_artikel',array($dt1->id,$dt1->alias))}}"><?= $dt1->title ?></a></h4>
								</div>
								<ul class="entry-meta">
									<li><?= tgl_indo($dt1->created) ?></li>
								</ul>
							</div>
						</div>
						<?php } ?>
					</div>

				</div>

			</div>
		</div><!-- .sidebar end -->
	</div>
</div>



<?php
	foreach ($view_max as $dt) {
		$no= $dt->maxView;
	}
	
	$noUrut = floatval($no)+1;
	$nomorbaru = $noUrut;
?>
<input type="hidden" id="jml_view" name="jml_view" value="<?php echo $nomorbaru ?>">

<!-- JQuery -->
<script src="{{url('themes/canvas-multipurpose/js/jquery.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type: "POST",
			url: "{{ url('create_view') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				view_jml    	: $("#jml_view").val(),
				id    			: $("#id").val()
			} ,
			success:function(data){ 
            },
			complete:function () {
			}
        });
	});
</script>

@endsection