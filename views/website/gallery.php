<section class="gallery white">
	<div class="row">
		<div class="col s12 center-align">
			<h1>GALLERY<br> <small>A Glimpse of tylos at your fingertips</small></h1>
		</div>
		<div class="col s12 no-padding">
			<?php
				$db = new db;
				$data = $db->get('gallery','*',"WHERE status = 1 ORDER BY `id` DESC");
				$i=0;
				foreach($data['result'] as $key => $rw):
				$i++;
				if($i==1){
					echo '<div class="col s12 no-padding">';
				}
			?>
			<div class="col l3 s12 no-padding"><img class="materialboxed responsive-img" src="/img/gallery/<?php echo $rw['image']; ?>"></div>
			<?php
			if($i==4){ echo '</div>'; $i=0; }
			endforeach;
			if($i!=0){
				echo '</div>';
			} ?>
		</div>
	</div>
</section>