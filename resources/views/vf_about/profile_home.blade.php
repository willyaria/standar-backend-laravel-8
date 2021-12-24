<!--<div class="fancy-title title-border topmargin-lg">
	<h3>Profil Pengembang</h3>
</div> -->

<div style="margin-top: 20px;">&nbsp;</div>
<button type="button" class="btn btn-primary btn-lg btn-block">Profil Pengembang</button>
<div style="margin-top: 20px;">&nbsp;</div>

<?php foreach ($profile as $dt) { ?>

<div class="entry clearfix">
	<div class="entry-image">
		<a href="<?= $dt->url_image.$dt->image ?>" data-lightbox="image"><img class="image_fade" src="<?= $dt->url_image.$dt->image ?>" alt="Standard Post with Image"></a>
	</div>
	<div class="entry-title">
		<h2><a href="blog-single.html"><?= $dt->title ?></a></h2>
	</div>
	<ul class="entry-meta clearfix">
		<li><i class="icon-calendar3"></i><?= $dt->publish_up ?></li>
	</ul>
	<div class="entry-content">
		<p><?= $dt->caption ?></p>
	</div>
</div>

<?php } ?>