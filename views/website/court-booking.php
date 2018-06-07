<?php $db = new db; $member = $_SESSION['member']; 
$data = $db->get('court_booking','booking_no',"INNER JOIN invoice on `invoice`.`booking_id`=`court_booking`.`id` WHERE user = '$member' AND booking_type = 1");
$court_bookings = $data['result'];
$data = $db->get('court_long_booking','booking_no',"INNER JOIN invoice on `invoice`.`booking_id`=`court_long_booking`.`id` WHERE user = '$member' AND booking_type = 4");
$court_long_bookings = $data['result'];
?>
<section class="login white">
	<div class="container">
		<div class="row grey lighten-3">
			<div class="col l3 s12 no-padding" style="border-right: 1px solid #c4c4c4; height: 100% !important;">
				<ul class="account-menu">
					<a href="/account/"><li>Dashboard</li></a>
					<a href="/account/history/court/"><li  class="active">Court Bookings</li></a>
					<a href="/account/history/room/"><li>Room Bookings</li></a>
					<a href="/account/history/event/"><li>Event Bookings</li></a>
					<!--<a href="/account/players/"><li>Player Profile</li></a>
					<a href="/account/team/"><li>Team</li></a>-->
					<a href="/account/profile/"><li>My Profile</li></a>
				</ul>
			</div>
			<div class="col l9 s12 no-padding">
				<div class="col s12 grey lighten-2 login-box">
					<h5>Court Booking</h5>
				</div>
				<div class="col s12 login-box">
					<div class="col l4 s12">
						<?php foreach($court_bookings as $key => $rw){ ?>
						<p>
						<a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a></p>
						<hr />
						<?php } ?>
					</div>
					<div class="col l4 s12">
						<?php foreach($court_long_bookings as $key => $rw){ ?>
						<p>
						<a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a></p>
						<hr />
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>