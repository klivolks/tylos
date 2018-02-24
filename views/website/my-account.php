<?php $db = new db; $member = $_SESSION['member']; 
$data = $db->get('court_booking','booking_no',"INNER JOIN invoice on `invoice`.`booking_id`=`court_booking`.`id` WHERE user = '$member' AND booking_type = 1");
$court_bookings = $data['result'];
$data = $db->get('room_booking','booking_no',"INNER JOIN invoice on `invoice`.`booking_id`=`room_booking`.`id` WHERE user = '$member' AND booking_type = 2");
$room_bookings = $data['result'];
$data = $db->get('event_tickets','booking_no',"INNER JOIN invoice on `invoice`.`booking_id`=`event_tickets`.`id` WHERE user = '$member' AND booking_type = 3");
$event_bookings = $data['result'];
?>
<section class="login white">
	<div class="container">
		<div class="row grey lighten-3">
			<div class="col l3 s12 no-padding" style="border-right: 1px solid #c4c4c4; height: 100% !important;">
				<ul class="account-menu">
					<a href="/account/"><li class="active">Dashboard</li></a>
					<a href="/account/history/court/"><li>Court Bookings</li></a>
					<a href="/account/history/room/"><li>Room Bookings</li></a>
					<a href="/account/history/event/"><li>Event Bookings</li></a>
					<!--<a href="/account/players/"><li>Player Profile</li></a>
					<a href="/account/team/"><li>Team</li></a>-->
					<a href="/account/profile/"><li>My Profile</li></a>
				</ul>
			</div>
			<div class="col l9 s12 no-padding">
				<div class="col s12 grey lighten-2 login-box">
					<h5>My Account</h5>
				</div>
				<div class="col s12 login-box">
					<div class="col l4 s12">
						<p><strong>Upcoming Court Bookings</strong></p>
						<?php foreach($court_bookings as $key => $rw){ ?>
						<p><a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a></p>
						<hr />
						<?php } ?>
					</div>
					<div class="col l4 s12">
						<p><strong>Upcoming Room Bookings</strong></p>
						<?php foreach($room_bookings as $key => $rw){ ?>
						<p><a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a></p>
						<hr />
						<?php } ?>
					</div>
					<div class="col l4 s12">
						<p><strong>Upcoming Event Bookings</strong></p>
						<?php foreach($event_bookings as $key => $rw){ ?>
						<p><a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a></p>
						<hr />
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>