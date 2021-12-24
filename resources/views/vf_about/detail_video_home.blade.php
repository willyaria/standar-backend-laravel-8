@extends('template.canvasmultipurpose.default-coba.template')
@section('content')


<div class="container clearfix">
	<div class="postcontent nobottommargin clearfix">
			
		<?php foreach($video_detail_home as $dt) { ?>
		<h3><?= $dt->title ?></h3>
		
		<!-- Entry Meta
		============================================= -->
		<ul class="entry-meta clearfix">
			<li><i class="icon-calendar3"></i><?= $dt->publish_up ?></li>
			<li><a href="#"><i class="icon-user"></i> admin</a></li>
			<li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
			<li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
			<li><a href="#"><i class="icon-camera-retro"></i></a></li>
		</ul><!-- .entry-meta end -->
		
		<video poster="" preload="auto" controls style="display: block; width: 100%;">
			<source src="{{url('/')}}<?php echo $dt->url_image.$dt->image ?>" type='video/mp4' />				
		</video>
		
		<div class="entry-content notopmargin">
			<p><?= $dt->caption ?></p>
		</div>
		<?php } ?>	
	</div>
</div>



@endsection