<?php $db = new db; $member = $_SESSION['member']; 
$data = $db->get('room_booking','DISTINCT(booking_no),`invoice`.`status`, expected_check_in,expected_check_out',"INNER JOIN invoice on `invoice`.`booking_id`=`room_booking`.`id` WHERE user = '$member' AND booking_type = 2");
$room_bookings = $data['result'];
?>
<section class="login white">
	<div class="container">
		<div class="row grey lighten-3">
			<div class="col l3 s12 no-padding" style="border-right: 1px solid #c4c4c4; height: 100% !important;">
				<ul class="account-menu">
					<a href="/account/"><li>Dashboard</li></a>
					<a href="/account/history/court/"><li>Court Bookings</li></a>
					<a href="/account/history/long-court/"><li>Court Long Bookings</li></a>
					<a href="/account/history/room/"><li class="active">Room Bookings</li></a>
					<a href="/account/history/event/"><li>Course Subscription</li></a>
					<!--<a href="/account/players/"><li>Player Profile</li></a>
					<a href="/account/team/"><li>Team</li></a>-->
					<a href="/account/profile/"><li>My Profile</li></a>
				</ul>
			</div>
			<div class="col l9 s12 no-padding">
				<div class="col s12 grey lighten-2 login-box">
					<h5>Room Booking</h5>
				</div>
				<div class="col s12 login-box">
					<div class="col s12">
						<table>
							<thead>
								<th>Booking No</th>
								<th>Checkin</th>
								<th>Checkout</th>
								<th>Status</th>
							</thead>
						<?php foreach($room_bookings as $key => $rw){ ?>
						<tr>
						<td>
							<a href="/booking/details/<?php echo $rw[0] ?>/"><?php echo $rw[0]; ?></a> </td>
							<td><?php echo date("d/m/Y",strtotime($rw[2])); ?></td>
							<td><?php echo date("d/m/Y",strtotime($rw[3])); ?></td>
							<td> <?php if($rw[1]=='0'){
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
							?></td><td><?php if($rw[1]!='5'&&$rw[1]!='3'){ ?><a href="#" onClick="confirm_btn('<?php echo $rw[0]; ?>')">Cancel Booking</a><?php } ?></td>
						</tr>
						<?php } ?>
						</table>
					</div>
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