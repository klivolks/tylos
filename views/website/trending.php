<section class="trending">
	<div class="row">
		<div class="col s12 center-align">
			<h1>Trending in Tylos</h1>
		</div>
	</div>
	<div class="row trending-wrap">
	<?php
				$db = new db;
				$today = date('Y-m-d');
				$data = $db->get('events','`id`,`featured_img`,`event_name`,`event_starting`,`event_ending`,`venue`',"WHERE `event_ending` >= '$today' ORDER BY `id` DESC LIMIT 0,6");
				
			?>
		<div class="MS-content">
			<?php
			foreach($data['result'] as $key => $rw){
				?>
			<div class="col l2 s6 item">
				<a href="/event/<?php echo $rw[0] ?>/"><div class="event-wrap">
					<div class="event-poster">
						<img src="/img/events/<?php echo $rw[1]; ?>" class="event-img">
					</div>
					<div class="event-star" style="font-weight: bold; padding-left: 15px; color: white; font-size: 24px;">
						<?php echo $rw[2]; ?>
						<!--<i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star_half</i> <i class="material-icons">star_border</i>-->
					</div>
					<div class="event-details">
						<div class="row">
							<div class="col s7">
								<i class="material-icons left">event</i> <span><?php echo date('d M',strtotime($rw[3])); ?> - <?php echo date('d M',strtotime($rw[4])); ?></span>
							</div>
							<div class="col s5">
								<i class="material-icons left">place</i> <span>Court 5</span>
							</div>
						</div>
					</div>
				</div></a>
				</div>
				<?php
				}
			?>
		</div>
	</div>
	<a onClick="prev_slide()" href="#"><div class="left-wrap valign-wrapper left">
		<i class="material-icons md-48">chevron_left</i>
		</div></a>
		<a onClick="next_slide()" href="#"><div class="right-wrap valign-wrapper right right-align">
		<i class="material-icons md-48" style="position: absolute; right: 0;">chevron_right</i>
		</div></a>
</section>