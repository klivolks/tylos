<section class="gallery white">
	<div class="row">
		<div class="col s12 center-align">
			<h1>GALLERY<br> <small>A Glimpse of tylos at your fingertips</small></h1>
		</div>
		<div class="col s12 no-padding">
			<?php
				$db = new db;
				$data = $db->get('gallery','*',"WHERE status = 1 ORDER BY `id` DESC LIMIT 0,4");
				foreach($data['result'] as $key => $rw):
			?>
			<div class="col l3 s12 no-padding"><img class="materialboxed responsive-img" src="/img/gallery/<?php echo $rw['image']; ?>"></div>
			<?php endforeach; ?>
		</div>
		<div class="col s12 center-align" style="padding:20px;">
			<br><a href="/gallery/"><button type="button" class="gallery-btn"><span style="position:relative; top:-7.5px;">View All</span> <i class="material-icons">chevron_right</i></button></a>
		</div>
	</div>
</section>