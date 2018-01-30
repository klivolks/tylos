<?php
$court = $sub_page;
$input = new input;
$date = date('Y-m-d',strtotime($input->post('dateOfBooking')));
$db = new db;
$data = $db->get('court_inventory','*',"WHERE (`date` = '$date' AND `court_id` = '$court') AND `status` = '1'");
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
						
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo date('d M, Y',strtotime($date)); ?>" disabled>
						<input type="hidden" name="dateOfBooking" value="<?php echo $date; ?>">
						<label>Date of Booking</label>
					</div>
					<div class="col s12 input-field">
						<select name="timeSlot" required>
							<option disabled>SELECT TIME</option>
						</select>
						<label>Time Slot</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" id="price" value="0" disabled>
						<label>Price</label>
					</div>
					<div class="col s12 input-field">
						<button type="submit" class="theme-btn right"><span>Next</span> <i class="material-icons">arrow_right</i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>