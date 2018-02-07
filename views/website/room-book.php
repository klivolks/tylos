<?php
$room = $sub_page;
$input = new input;
$check_in = date('Y-m-d',strtotime($input->post('check_in')));
$check_out = date('Y-m-d',strtotime($input->post('check_out')));
$db = new db;
$data = $db->get('rooms','room_name,rent',"WHERE `id` = '$room'");
$room_name=$data['result'][0][0];
$rent=$data['result'][0][1];
$data = $db->get('room_booking','count(*)',"WHERE ($check_in <= `expected_check_out` and $check_out >= `expected_check_in`) AND `status` = '1'");
?>
<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-2 col l8 push-l2 s12 login-box">
				<h5>Confirm Room</h5>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-3 col l8 push-l2 s12 login-box">
				<form class="row" action="/booking/confirm/" method="post">
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $room_name; ?>" disabled>
						<input type="hidden" name="room" value="<?php echo $room ?>">
						<input type="hidden" name="booking_type" value="room">
						<label>Room</label>
					</div>
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
						<input type="text" name="persons" value="1">
						<label>No. of Persons</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $rent; ?>" disabled>
						<label>Rent</label>
					</div>
					<div class="col s12 input-field">
						<?php 
						if($data['result'][0][0]>0){
						?>
							<div class="card card-panel red white-text">
								Sorry! You can&acute;t book for this date as no slots are open.
							</div>
						<?php	
						}
						else{
						?>
						<button type="submit" class="theme-btn right"><span>Next</span> <i class="material-icons">arrow_right</i></button>
						<?php
						}
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>