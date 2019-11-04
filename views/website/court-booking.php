<?php $db = new db; $member = $_SESSION['member']; 
$data = $db->get('court_booking','booking_no,timeslot,`invoice`.`status`',"INNER JOIN invoice on `invoice`.`booking_id`=`court_booking`.`id` WHERE user = '$member' AND booking_type = 1 ORDER BY `invoice`.`created_at` DESC");
$court_bookings = $data['result'];
$data = $db->get('court_long_booking','booking_no,`invoice`.`status`',"INNER JOIN invoice on `invoice`.`booking_id`=`court_long_booking`.`id` WHERE user = '$member' AND booking_type = 4");
$court_long_bookings = $data['result'];
?>
<section class="login white">
	<div class="container">
		<div class="row grey lighten-3">
			<div class="col l3 s12 no-padding" style="border-right: 1px solid #c4c4c4; height: 100% !important;">
				<ul class="account-menu">
					<a href="/account/"><li>Dashboard</li></a>
					<a href="/account/history/court/"><li  class="active">Court Bookings</li></a>
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
					<h5>Court Booking</h5>
				</div>
				<div class="col s12 login-box">
					<div class="col s12">
					<table>
					<thead>
						<th>Booking ID</th>
						<th>Date</th>
						<th>Time Slot</th>
						<th>Payment Status</th>
					</thead>
						<?php foreach($court_bookings as $key => $rw){ ?>
						<tr><td><a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a> 
						<?php
							$slot = $db->get('court_inventory','`date`,`time`',"WHERE `id` = '$rw[1]'"); 
							?></td><td>
							Date : <?php echo date("d/m/Y",strtotime($slot['result'][0][0])); ?></td><td>
						Time : <?php echo date("h:i a",strtotime($slot['result'][0][1])).'-'.date("h:i a",strtotime($slot['result'][0][1])+1800); ?>
							</td><td><?php if($rw[2]=='0'){
	echo '<font class="red-text">Payment is pending.</font> <br><a href="/functions/pay/'.$rw[0].'/"> Pay Now </a>';
							}
							elseif($rw[2]=='1'){
								echo 'Paid Online';
							}
																	  elseif($rw[2]=='2'){
																		  echo 'Pay At Court';
																	  }
																	  elseif($rw[2]=='3'){
																		  echo '<label class="green-text">Paid</label>';
																	  }
																	   elseif($rw[2]=='5'){
																		  echo '<font class="red-text">Booking Cancelled</font>';
																	  }
							?></td><td><?php if($rw[2]!='5'&&$rw[2]!='3'){ ?><a href="#" onClick="confirm_btn('<?php echo $rw[0]; ?>')">Cancel Booking</a><?php } ?></td></tr>
						
						<?php } ?>
						</table>
						
					</div>
					<!--<div class="col s12">
						<?php foreach($court_long_bookings as $key => $rw){ ?>
						<p>
						<a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a> - <?php if($rw[1]=='0'){
	echo '<font class="red-text">Payment is pending.</font> <br><a href="/functions/pay/'.$rw[0].'/"> Pay Now </a>';
							}
							elseif($rw[1]=='1'){
								echo 'Paid Online';
							}
																	  elseif($rw[1]=='2'){
																		  echo 'Pay At Court';
																	  }
																	  elseif($rw[1]=='3'){
																		  echo '<label class="green-text">Paid</label>';
																	  }
																	   elseif($rw[1]=='5'){
																		  echo '<font class="red-text">Booking Cancelled</font>';
																	  }
							?></td><td><?php if($rw[1]!='5'&&$rw[1]!='3'){ ?><a href="#" onClick="confirm_btn('<?php echo $rw[0]; ?>')">Cancel Booking</a><?php } ?></p>
						<hr />
						<?php } ?>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function confirm_btn(booking_no){
		if(window.confirm('You really want to cancel?') == true){ 
			window.location.assign('/functions/cancel/'+booking_no+'/');
		}
		else{
			event.preventDefault(); 
		}
	}
</script>