<?php 
$room = $sub_page;
$db = new db;
$data = $db->get('rooms','*',"WHERE `id` = '$room'");
if($data['result']!=''){
	foreach($data['result'] as $key=>$rw){
	?>
	<section class="court-banner">
		<div class="featured-img">
			<img src="/img/rooms/<?php echo $rw['featured_img']; ?>" style="width: 100%">
		</div>
	</section>
	<section class="court-heading white">
		<div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h1><?php echo $rw['room_name']; ?><br><small><?php echo $rw['room_type'] ?></small></h1>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<p><?php echo $rw['description']; ?></p>
					<p><h5><strong>Facilities</strong></h5></p>
					<p>All rooms are air-conditioned and suitable for double occupancy, while the suites are 3-bedded. Room no.7 (Standard) is on the ground floor. Others are on the first floor. Tariffs given below are subject to change (at the discretion of the Executive Committee) without notice. </p>
					<p><ul class="features">
						<li>A/C Room</li>
						<li>Hot & Cold water round the clock</li>
						<li>Refrigerator in all rooms</li>
						<li>Room service 7:30 am to 11:00 pm</li>
						<li>Laundry service</li>
						<li>LCD TV with multi channels</li>
					</ul></p>
				</div>
			</div>
		</div>
	</section>
	<section class="court-common grey lighten-2">
		<div class="container">
			<div class="row">
				<div class="col l6 m6 s12 center-align">
					<img src="/img/room-profile-image.jpg" class="responsive-img">
				</div>
				<div class="col l6 m6 s12">
					<p><strong>Reserve rooms with our advanced booking system.</strong></p>
					<p>Badminton
		 players with an eye on competing professionally will want to practice and play on different types of courts. Tylos has the most comfortable rooms and its completely family friendly.</p>
					<p>Our Advanced Booking system has made simple and easy to book.  </p>
					<form action="/room-book/<?php echo $rw['id']; ?>/" method="post" onSubmit="return verify_input('check_in')">
					<p id="msg"></p>
					<p style="margin-top: 20px;"><div class="input-field"><input type="text" class="datepicker" id="check_in" name="check_in" required><label>check in*</label></div></p>
					<p style="margin-top: 20px;"><div class="input-field"><input type="text" class="datepicker" id="check_out" name="check_out" required><label>check out*</label></div></p>
					<p><button type="submit" class="theme-btn right">Book Now</button></p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
	}
}
?>
<section class="court-extra-details white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center-align">OUR POLICIES<br><small>See what make us different from others</small></h1>
				<p>Booking cancellation 48 Hours or more prior to check-in time will be free of cancellation charges. Cancellation inside 48 Hours will be entail a charge equivalent to one day's room rent.</p>
					<p>Guests who check-in early morning and wish to use the room for the whole day and check-out late evening on same day will be required to pay rent for one-and-a-half days.</p>
					<p>Guests who check-in early morning and who check-out only the next day will be required to pay two days' rent.</p>
					<p>Extra bed charge of Rs.200/- per head will be charged if more than 2 persons occupy a room (other than the suites), even if extra beds are not provided. Children below the age of 12 staying with their guardians will not be charged extra if extra bed is not taken.</p>
					<p>Pets are not allowed inside the rooms.</p>
					<p>Room boys are available to attend on the occupants from 6.00 AM to 11.00 PM. There will not be any service between 11.00 PM and 6.00 AM. Members who want to check in during this period must give advance information to the Club.</p>
					<p>The room rent, canteen bills and all other charges shall be fully paid up by the occupants (other than members) every five days if their stay exceeds that period. Payment should be by cash or card. Card payments are subject to service charge of 1%.</p>
			</div>
		</div>
	</div>
</section>