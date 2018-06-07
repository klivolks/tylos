<?php 
$event = $sub_page;
$db = new db;
$data = $db->get('events','*',"WHERE `id` = '$event'");
if($data['result']!=''){
	foreach($data['result'] as $key=>$rw){
	?>
	<section class="court-banner">
		<div class="featured-img">
			<img src="/img/events_badminton_coaching_banner.jpg" style="width: 100%">
		</div>
	</section>
	<section class="court-heading white">
		<div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h1><?php echo $rw['event_name']; ?><br><small><i class="material-icons">location_on</i> <?php echo $rw['venue'] ?></small></h1>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<p><?php echo $rw['description']; ?></p>
					<p><ul class="features">
						<li>Seats: <strong><?php echo $rw['seats']; ?></strong></li>
						<li>Ticket charge: <strong>&#8377; <?php echo $rw['ticket_charge']; ?></strong></li>
						<li>Event Starting on: <strong><?php echo date('d M Y',strtotime($rw['event_starting'])); ?></strong></li>
						<li>Event will end by: <strong><?php echo date('d M Y',strtotime($rw['event_ending'])); ?></strong></li>
					</ul></p>
				</div>
			</div>
		</div>
	</section>
	<section class="court-common grey lighten-2">
		<div class="container">
			<div class="row">
				<div class="col l6 m6 s12 center-align">
					<img src="/img/events/<?php echo $rw['featured_img']; ?>" class="responsive-img">
				</div>
				<div class="col l6 m6 s12">
					<p><strong>Reserve seats with our advanced booking system.</strong></p>
					<p>Badminton
		 players with an eye on competing professionally will want to practice and play on different types of courts. Tylos has the most comfortable rooms and its completely family friendly.</p>
					<p>Our Advanced Booking system has made simple and easy to book.  </p>
					<form action="/ticket-book/<?php echo $rw['id']; ?>/" method="post">
					<p id="msg"></p>
					<p style="margin-top: 20px;"><div class="input-field"><input type="number" class="validate" id="noOfSeats" name="noOfSeats" required><label>Number of seats*</label></div></p>
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
			<div class="col s12" style="padding:30px 50px !important;">
				<h1 class="center-align">Terms and conditions<br><small>See what make us different from others</small></h1>
					<p>Booking cancellation 48 Hours or more prior to check-in time will be free of cancellation charges. Cancellation inside 48 Hours will be entail a charge equivalent to one day's room rent.</p>
					<p>Pets are not allowed inside the event campus.</p>
					<p>The room rent, canteen bills and all other charges shall be fully paid up by the occupants (other than members) every five days if their stay exceeds that period. Payment should be by cash or card. Card payments are subject to service charge of 1%.</p>
			</div>
		</div>
	</div>
</section>