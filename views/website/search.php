<?php $db = new db; $input =  new input; $search_term = $input->post('search'); ?>
<section class="search-term white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<small>Result for searching : </small> &ldquo; <?php echo $search_term; ?> &rdquo;
			</div>
		</div>
	</div>
</section>
<section class="search-result grey lighten-2">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1>COURTS<br><small>Courts matching your search preference</small></h1>
			</div>
		</div>
		<div class="row">
			<?php
				$db = new db;
				$data = $db->get('courts','*',"WHERE (court_name LIKE '%$search_term%' OR tagline LIKE '%$search_term%') AND status = 1 ORDER BY `id` DESC");
				$i=0;
				if(isset($data['result'])){
				foreach($data['result'] as $key => $rw):
				$i++;
				if($i==1){
					echo '<div class="col s12 no-padding">';
				}
			?>
				<a href="/court/<?php echo $rw['id']; ?>/"><div class="col l4 s12 item">
					<div class="event-wrap">
						<div class="event-poster">
							<img src="/img/courts/<?php echo $rw['featured_img'] ?>" class="event-img">
						</div>
						<div class="event-star">
						</div>
						<div class="event-details">
							<div class="row">
								<div class="col s7">
									<i class="material-icons left">golf_course</i> <span><strong><?php echo $rw['court_name'] ?></strong></span>
								</div>
								<div class="col s5">
									<img src="/img/event-icon-small.png" class="responsive-img right">
								</div>
								<div class="col s12" style="font-size: 12px; font-style: italic; margin-top: 5px;">
									<?php echo $rw['tagline'] ?>
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
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col s12">
				<h1>ROOMS<br><small>Rooms matching your search preference</small></h1>
			</div>
		</div>
		<div class="row">
			<?php
				$db = new db;
				$data = $db->get('rooms','*',"WHERE (room_name LIKE '%$search_term%' OR description LIKE '%$search_term%') AND status = 1 ORDER BY `id` DESC");
				$i=0;
				if(isset($data['result'])){
				foreach($data['result'] as $key => $rw):
				$i++;
				if($i==1){
					echo '<div class="col s12 no-padding">';
				}
			?>
				<a href="/room/<?php echo $rw['id']; ?>/"><div class="col l4 s12 item">
					<div class="event-wrap">
						<div class="event-poster">
							<img src="/img/rooms/<?php echo $rw['featured_img'] ?>" class="event-img">
						</div>
						<div class="event-star">
						</div>
						<div class="event-details">
							<div class="row">
								<div class="col s7">
									<i class="material-icons left">hotel</i> <span><strong><?php echo $rw['room_name'] ?></strong></span>
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