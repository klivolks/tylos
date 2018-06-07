<section class="white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center">Rooms available<br><small>Book with ease</small></h1>
			</div>
		</div>
	</div>
</section>
<section class="quick-book white">
	<div class="container">
		<div class="row" id="quick-book">
			<div class="col s12 book-search-wrap" id="tab-1">
				<?php 
					$db = new db;
					$input = new input;
					$date = date('Y-m-d',strtotime($input->post('check_in')));
					$date2 = date('Y-m-d',strtotime($input->post('check_out')));
					$data = $db->get('rooms','`rooms`.`id` as roomid,room_name,room_type',"INNER JOIN room_booking ON `room_booking`.`room_id` = `rooms`.`id` WHERE `rooms`.`status` = 1 AND ('$date' NOT BETWEEN `room_booking`.`expected_check_in` AND `room_booking`.`expected_check_out`) AND ('$date2' NOT BETWEEN `room_booking`.`expected_check_in` AND `room_booking`.`expected_check_out`) GROUP BY `rooms`.`id`");
					if(!isset($data['result'])){
						$data = $db->get('rooms','`rooms`.`id` as roomid,room_name,room_type',"WHERE `rooms`.`status` = 1");
					}
					foreach($data['result'] as $key => $rw):
				?>
				<div class="col s12 book-item">
					<form action="/room-book/<?php echo $rw['roomid']; ?>/" method="post">
						<input type="hidden" name="check_in" value="<?php echo $date; ?>">
						<input type="hidden" name="check_out" value="<?php echo $date2; ?>">
						<a href="/room/<?php echo $rw['roomid']; ?>"><div class="col l10 s12 item-detail">
							<?php echo $rw['room_name']  ?><br>
							<small><?php echo $rw['room_type']  ?></small>
						</div></a>

						<div class="col l2 s12 right-align">
							<button type="submit" class="book-btn">Book Now</button>
						</div>
					</form>
				</div>
				<?php
					endforeach;
				?>
			</div>
		</div>
	</div>
</section>