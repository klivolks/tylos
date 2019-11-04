<?php
$room = $sub_page;
$input = new input;
$check_in = date('Y-m-d',strtotime($input->post('check_in')));
$check_out = date('Y-m-d',strtotime($input->post('check_out')));
$db = new db;
$data = $db->get('rooms','count(*)','WHERE 1');
$room_count = $data['result'][0][0];
$data = $db->get('room_booking','count(DISTINCT(room_id))',"WHERE (('$check_in' BETWEEN `expected_check_in` AND `expected_check_out` - interval 1 day) OR ( '$check_out' BETWEEN `expected_check_in` AND `expected_check_out` + interval 1 day ) OR ( `expected_check_in` BETWEEN '$check_in' AND '$check_out' - interval 1 day) OR ('$check_in' <= `expected_check_in` AND '$check_out' >= `expected_check_out`)) AND `status` = '1'");
$booked_count = $data['result'][0][0];
$available = $room_count-$booked_count;
?>
<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-2 col l8 push-l2 s12 login-box">
				<h5>Confirm Room</h5>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-4 col l8 push-l2 s12 login-box">
			<?php
				if($available>0){
				?>
				<form class="row" action="/booking/confirm/" method="post">
						<input type="hidden" name="booking_type" value="room">
						
					<div class="col s12 input-field">
						<input type="text" value="<?php echo date('d M, Y',strtotime($check_in)); ?>" disabled>
						<input type="hidden" name="check_in" value="<?php echo $check_in; ?>">
						<label>Check in</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo date('d M, Y',strtotime($check_out)); ?>" disabled>
						<input type="hidden" name="check_out" value="<?php echo $check_out; ?>">
						<label>Check in</label>
					</div>
					<div class="col s12 input-field">
					<select name="no_of_rooms">
						<?php
							$i=1;
							while($i<=$available){
								echo '<option value="'.$i.'">'. $i.'</option>';
								$i++;
							}
						?>
						</select>
						<label>No. of Rooms</label>
					</div>
					<div class="col s12 input-field">
						<button type="submit" class="theme-btn right"><span>Next</span> <i class="material-icons">arrow_right</i></button>
					</div>
				</form>
				<?php
				}
				else{
					?>
					<div class="card card-panel red white-text">
						<p>Sorry no rooms available for those dates.</p>
						<p><a href="/search/room-new/" class="btn btn-flat white red-text"><i class="material-icons left">arrow_back</i> Go back</a></p>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>