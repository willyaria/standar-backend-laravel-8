
<div class="fslider" data-easing="easeInQuad">
	<div class="flexslider">
		<div class="slider-wrap">
			<?php foreach ($foto_slider_home as $dt) { 
				$url_image = $dt->url_image;
				$image = $dt->image;
			?>
			<div class="slide" data-thumb="images/slider/boxed/thumbs/2.jpg">
				<a href="#">
					<img src="<?= $url_image.$image ?>" alt="Slide 2">
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>



