<?php $db = new db; ?>
<section class="search-result grey lighten-2">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1>Courses<br><small>These are our prestigious courses</small></h1>
			</div>
		</div>
		<div class="row">
			<?php
				$db = new db;
				$data = $db->get('events','*',"WHERE status = 1 ORDER BY `event_ending` DESC");
				$i=0;
				if(isset($data['result'])){
				foreach($data['result'] as $key => $rw):
				$i++;
				if($i==1){
					echo '<div class="col s12 no-padding">';
				}
			?>
				<a href="/event/<?php echo $rw['id']; ?>/"><div class="col l4 s12 item">
					<div class="event-wrap">
						<div class="event-poster">
							<img src="/img/events/<?php echo $rw['featured_img'] ?>" class="event-img">
						</div>
						<div class="event-star">
						</div>
						<div class="event-details">
							<div class="row">
								<div class="col s7">
									<i class="material-icons left">event</i> <span><strong><?php echo $rw['event_name'] ?></strong></span>
								</div>
								<div class="col s5">
									<img src="/img/event-icon-small.png" class="responsive-img right">
								</div>
							</div>
						</div>
					</div>
				</div></a>
			<?php
			if($i==3){ echo '</div>'; $i=0; }
			endforeach;
			if($i!=0){
				echo '</div>';
			}
					}else{
				?>
					<div class="row card grey darken-1 white-text"><div class="col s12"><h1>No Result Found</h1></div></div>
				<?php	
			}
			?>
		</div>
	</div>
</section>