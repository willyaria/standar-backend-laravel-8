@extends('template.canvasmultipurpose.default-public-anefsa.template')
@section('content')

<!-- Content
		============================================= -->
	
	
<div class="content-wrap">

	<div class="container clearfix">

		<div class="portfolio-container">
			
			<!-- Portfolio Items
			============================================= -->
			<div id="portfolio" class="portfolio clearfix">
				<?php foreach ($full_berita as $dt2) { ?>
				<article class="portfolio-item pf-media pf-icons">
					<div class="portfolio-image">
						<img src="<?= $dt2->url_image.$dt2->image ?>" alt="Open Imagination">
					</div>
					<div class="portfolio-desc">
						<h3><a href="{{url('/detail_berita',array($dt2->id,$dt2->alias))}}"><?= $dt2->title ?></a></h3>
						<p><?= substr($dt2->part_caption,0,100); ?> ...</p>
					</div>
				</article>
				<?php } ?>
			</div><!-- #portfolio end -->

			<div class="pagination-container topmargin nobottommargin">

				<ul class="pagination nomargin"></ul>

			</div>


		</div>


	</div>

</div>


<!-- #content end -->

@endsection