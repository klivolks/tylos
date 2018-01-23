<?php 
$court = $sub_page;
$db = new db;
$data = $db->get('courts','*',"WHERE `id` = '$court'");
if($data['result']!=''){
	foreach($data['result'] as $key=>$rw){
	?>
	<section class="court-banner">
		<div class="featured-img">
			<img src="/img/courts/<?php echo $rw['featured_img']; ?>" style="width: 100%">
		</div>
	</section>
	<section class="court-heading white">
		<div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h1><?php echo $rw['court_name']; ?><br><small><?php echo $rw['tagline'] ?></small></h1>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<p><?php echo $rw['description']; ?></p>
					<p><ul class="features">
						<?php 
						$features = $db->get('court_features','feature',"WHERE `court_id` = '$court'");
			if($features['result']!=''){
						foreach($features['result'] as $key=>$feature){
					?>
						<li><?php echo $feature[0]; ?></li>
					<?php
						}
			}
		?>
					</ul></p>
				</div>
			</div>
		</div>
	</section>
	<section class="court-common grey lighten-2">
		<div class="container">
			<div class="row">
				<div class="col l6 m6 s12 center-align">
					<img src="http://placehold.it/400x300" class="responsive-img">
				</div>
				<div class="col l6 m6 s12">
					<p></p>
				</div>
			</div>
		</div>
	</section>
	<?php
	}
}
?>