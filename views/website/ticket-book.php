<?php
$event = $sub_page;
$input = new input;
$no_seats = $input->post('noOfSeats');
$db = new db;
$data = $db->get('events','event_name,ticket_charge,seats',"WHERE `id` = '$event'");
$event_name=$data['result'][0][0];
$ticket_charge=$data['result'][0][1];
$seats=$data['result'][0][2];
$data = $db->get('event_tickets','count(no_of_seats)',"WHERE `event` = '$event' AND `status` = '1'");
$booked_seats = $data['result'][0][0];
$remaining_seats = $seats-$booked_seats;
?>
<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-2 col l8 push-l2 s12 login-box">
				<h5>Confirm Seat</h5>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-3 col l8 push-l2 s12 login-box">
				<form class="row" action="/booking/confirm/" method="post">
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $event_name; ?>" disabled>
						<input type="hidden" name="event" value="<?php echo $event ?>">
						<input type="hidden" name="booking_type" value="event">
						<label>Course</label>
					</div>
					<div class="col s12 input-field">
						<input type="number" name="noOfSeats" value="<?php echo $no_seats; ?>" required>
						<label>No. of Months</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $ticket_charge; ?>" disabled>
						<label>Course Fee(Per Month)</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" class="datepicker" name="from_month" id="from_month" placeholder="Select Start date" required>
						<label>Joining From</label>
					</div>
					<div class="col s12 input-field">
						<?php 
						if($remaining_seats<$no_seats){
						?>
							<div class="card card-panel red white-text">
								Sorry! No seats available.
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