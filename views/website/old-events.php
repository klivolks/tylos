<section class="trending">
	<div class="row">
		<div class="col s12 center-align">
			<h1>Events at Tylos<br><small>Trending Events Happened at Tylos</small></h1>
		</div>
	</div>
	<?php
				$db = new db;
				$today = date('Y-m-d');
				$data = $db->get('events','`id`,`featured_img`,`event_name`,`description`',"WHERE `event_ending` < '$today' ORDER BY `id` DESC LIMIT 0,4");
				if(isset($data['result'])):
			?>
	<div class="row">
	<?php
			foreach($data['result'] as $key => $rw){
				?>
		<a href="/event/<?php echo $rw[0]; ?>/"><div class="col l3 s12 item">
			<div class="event-wrap">
				<div class="event-poster">
					<img src="/img/events/<?php echo $rw[1]; ?>" class="event-img">
				</div>
				<div class="event-star">
					<!--<i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star_half</i> <i class="material-icons">star_border</i>-->
				</div>
				<div class="event-details">
					<div class="row">
						<div class="col s7">
							<i class="material-icons left">event</i> <span><strong><?php echo $rw[2]; ?></strong></span>
						</div>
						<div class="col s5">
							<img src="/img/event-icon-small.png" class="responsive-img right">
						</div>
						<div class="col s12" style="font-size: 12px; font-style: italic; margin-top: 5px;">
							<?php echo $rw[3]; ?>
						</div>
					</div>
				</div>
			</div>
			</div></a>
			<?php
			}
		endif;
		?>
	</div>
</section>