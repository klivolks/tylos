<?php
$court = $sub_page;
$input = new input;
$date = date('Y-m-d',strtotime($input->post('dateOfBooking')));
$db = new db;
$data = $db->get('courts','court_name',"WHERE `id` = '$court'");
$court_name=$data['result'][0][0];
$data = $db->get('court_inventory','`id`,time,price',"WHERE (`date` = '$date' AND `court_id` = '$court') AND `status` = '1'");
?>
<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-2 col l8 push-l2 s12 login-box">
				<h5>Choose available time slot</h5>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-3 col l8 push-l2 s12 login-box">
				<form class="row" action="/booking/confirm/" method="post">
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $court_name; ?>" disabled>
						<input type="hidden" name="court" value="<?php echo $court ?>">
						<input type="hidden" name="booking_type" value="court">
						<label>Court</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo date('d M, Y',strtotime($date)); ?>" disabled>
						<input type="hidden" name="dateOfBooking" value="<?php echo $date; ?>">
						<label>Date of Booking</label>
					</div>
					<div class="col s12 input-field">
						<select name="timeSlot" required>
							<option disabled selected>SELECT TIME</option>
							<?php
							if(isset($data['result'])){
							foreach($data['result'] as $key => $rw){
								echo '<option value="'.$rw[0].'">'.$rw[1].'</option>';	
							}
							}
							?>
						</select>
						<label>Time Slot</label>
					</div>
					<div class="col s12 input-field">
						<?php 
						if(!isset($data['result'])){
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