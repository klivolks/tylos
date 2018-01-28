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
					<img src="/img/tennis-court-flooring.jpg" class="responsive-img">
				</div>
				<div class="col l6 m6 s12">
					<p><strong>Reserve the clay court with our advanced booking system.</strong></p>
					<p>Tennis players with an eye on competing professionally will want to practice and play on different types of court. Tylos has the most comfortable clay court surfaces and it is completely safe for all weather changes.</p>
					<p>Our Advanced booking system has made simple and easy to book courts.</p>
					<form action="/court-book/<?php echo $rw['id']; ?>/" method="post">
					<p style="margin-top: 20px;"><div class="input-field"><input type="text" class="datepicker" name="dateOfBooking" required><label>Date of Booking*</label></div></p>
					<p><button type="submit" class="theme-btn right">Book Now</button></p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
	}
}
?>
<section class="court-extra-details white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center-align">Benefits of TYLOS Courts<br><small>See what make us different from others</small></h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ex felis, elementum vel pellentesque ac, convallis nec mi. Morbi ut tristique nibh. Mauris placerat enim eget ligula lacinia hendrerit. Ut et diam eu ex tincidunt efficitur. In gravida lacus id mi aliquet, vel suscipit ligula ultrices. Integer luctus, diam eget dictum sodales, nisl ipsum sodales turpis, ut venenatis metus neque id arcu. Sed ex urna, dapibus non felis quis, tempor hendrerit eros.</p>
				<p>Nulla at odio lacinia, placerat diam fermentum, semper sapien. Mauris eu dolor in felis sagittis lobortis. Proin vitae neque vehicula, scelerisque nunc vitae, condimentum nulla. Donec eu odio cursus, mattis ligula ut, eleifend velit. Vivamus at lobortis velit. Donec sit amet ex diam. Suspendisse efficitur tortor at magna elementum imperdiet. Sed consequat libero sagittis, facilisis neque bibendum, placerat tortor. Vestibulum interdum nunc nec libero tincidunt, ut faucibus felis imperdiet. Nam non pulvinar urna.</p>
				<ul class="features">
					<li>Reduced risk of injury</li>
					<li>Cooler surface temperature</li>
					<li>Well Rounded game development</li>
					<li>Surface dries quickly after rain</li>
					<li>Environmentally safe</li>
				</ul>
			</div>
		</div>
	</div>
</section>