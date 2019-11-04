<?php $db = new db; $member = $_SESSION['member']; 
$today = date('Y-m-d');
$data = $db->get('court_booking','booking_no,timeslot,`invoice`.`status`',"INNER JOIN invoice on `invoice`.`booking_id`=`court_booking`.`id` WHERE user = '$member' AND booking_type = 1 AND `invoice`.`status` != 5 ORDER BY `invoice`.`created_at` DESC LIMIT 0,5");
$court_bookings = $data['result'];
$data = $db->get('room_booking','DISTINCT(booking_no),expected_check_in,expected_check_out,`invoice`.`status`',"INNER JOIN invoice on `invoice`.`booking_id`=`room_booking`.`id` WHERE user = '$member' AND booking_type = 2 AND `invoice`.`status` != 5 AND expected_check_in >= '$today' LIMIT 0,5");
$room_bookings = $data['result'];
$data = $db->get('event_tickets','booking_no,event,no_of_seats,`invoice`.`status`',"INNER JOIN invoice on `invoice`.`booking_id`=`event_tickets`.`id` WHERE user = '$member' AND booking_type = 3 AND `invoice`.`status` != 5 ORDER BY `invoice`.`created_at` DESC LIMIT 0,5");
$event_bookings = $data['result'];
?>
<section class="login white">
	<div class="container">
		<?php
		 $input = new input;
		if($input->get('msg')=='new'){
			?>
			<div class="row" style="margin-bottom: 20px">
				<div class="col s12 center-align green-text">
					Hi, Welcome to Tylos Academy. Your account is now active. Now you can book court, room and subscribe for courses.
				</div>
			</div>
			<?php
		}
		elseif($input->get('msg')=='cancelled'){
			?>
			<div class="row" style="margin-bottom: 20px">
				<div class="col s12 center-align green-text">
					Your booking was cancelled.
				</div>
			</div>
			<?php
		}
		?>
		<div class="row grey lighten-3">
			<div class="col l3 s12 no-padding" style="border-right: 1px solid #c4c4c4; height: 100% !important;">
				<ul class="account-menu">
					<a href="/account/"><li class="active">Dashboard</li></a>
					<a href="/account/history/court/"><li>Court Bookings</li></a>
					<a href="/account/history/long-court/"><li>Court Long Bookings</li></a>
					<a href="/account/history/room/"><li>Room Bookings</li></a>
					<a href="/account/history/event/"><li>Course Subscription</li></a>
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
						<p><strong>Latest Court Bookings</strong></p>
						<?php foreach($court_bookings as $key => $rw){ ?>
						<p><a href="/booking/details/<?php echo $rw[0] ?>/" target="_blank"><?php echo $rw[0]; ?></a> 
						<?php
							$slot = $db->get('court_inventory','`date`,`time`',"WHERE `id` = '$rw[1]'"); 
						?><br>
						Date : <?php echo date("d/m/Y",strtotime($slot['result'][0][0])); ?><br>
						Time : <?php echo date("h:i a",strtotime($slot['result'][0][1])).'-'.date("h:i a",strtotime($slot['result'][0][1])+1800); ?>
						<br><?php if($rw[2]=='0'){
	echo '<font class="red-text">Payment is pending.</font> <br><a href="/functions/pay/'.$rw[0].'/"> Pay Now </a>';
} ?></p>
						<hr />
						<?php } ?>
					</div>
					<div class="col l4 s12">
						<p><strong>Latest Room Bookings</strong></p>
						<?php foreach($room_bookings as $key => $rw){ ?>
						<p><a href="/booking/details/<?php echo $rw[0] ?>/" target="_blank"><?php echo $rw[0]; ?></a></p>
						<hr />
						<?php } ?>
					</div>
					<div class="col l4 s12">
						<p><strong>Course Subscriptions</strong></p>
						<?php foreach($event_bookings as $key => $rw){ ?>
						<p><a href="/booking/details/<?php echo $rw[0] ?>/" target="_blank"><?php echo $rw[0]; ?></a></p>
						<hr />
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>