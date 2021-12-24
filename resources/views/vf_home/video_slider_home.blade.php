<div style="margin-top: 20px;">&nbsp;</div>
<button type="button" class="btn btn-primary btn-lg btn-block">Video Terbaru</button>
<div style="margin-top: 20px;">&nbsp;</div>

<div id="oc-posts" class="owl-carousel posts-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">
	<?php foreach ($video as $dt) { ?>
	<div class="oc-item">
		<div class="ipost clearfix">
			<div class="entry-image">
				<a href="<?= $dt->url_thumb.$dt->thumb ?>" data-lightbox="image"><img class="image_fade" src="<?= $dt->url_thumb.$dt->thumb ?>" alt="Standard Post with Image"></a>
			</div>
			<div class="entry-title">
				<h3><a href="{{url('/detail_video_home',array($dt->id,$dt->alias))}}"><?= $dt->title ?></a></h3>
			</div>
			<ul class="entry-meta clearfix">
				<li><i class="icon-calendar3"></i><?= tanggal_local($dt->publish_up) ?></li>
				<li><a href="#"><i class="icon-user"></i><?= $dt->first_name ?> <?= $dt->last_name ?></a></li>
				
			</ul>
			<div class="entry-content">
				<p><?= substr($dt->caption,0,200) ?>...</p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>