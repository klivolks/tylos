<?php
	$input = new input;
	$db = new db;
	$booking_type = $input->post('booking_type');
?>
<section class="login white">
	<div class="row">
		<div class="grey lighten-2 col l4 push-l4 s12 login-box">
			<h5>Step 1: Confirm Booking</h5>
		</div>
	</div>
	<div class="row">
		<div class="grey lighten-3 col l4 push-l4 s12 login-box">
			<form method="post" action="/functions/confirm/" class="row">
				<div class="col s12" style="margin-bottom: 15px;">
					<strong>Booking Details</strong>
					<input type="hidden" name="bookingType" value="<?php echo $booking_type; ?>">
				</div>
				<?php
				if($booking_type=='court'){
					$court_id = $input->post('court');
					$data = $db->get('courts','court_name',"WHERE `id` = '$court_id'");
					$court_name = $data['result'][0][0];
					$slot_id = $input->post('timeSlot');
					$data = $db->get('court_inventory','`date`,`time`,`price`',"WHERE `id` = '$slot_id'");
					$slot = $data['result'][0];
				?>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Court : </div>
					<div class="col s8">
						<?php echo $court_name; ?>
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Date : </div>
					<div class="col s8">
						<?php echo date('d M Y',strtotime($slot[0])); ?>
						<input type="hidden" name="timeSlot" value="<?php echo $slot_id; ?>">
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Time : </div>
					<div class="col s8">
						<?php echo date('h:i a',strtotime($slot[1])); ?>
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Price : </div>
					<div class="col s8">
						Rs. <?php echo $slot[2]; ?>
					</div>
				</div>
				<?php
				}
				if(isset($_SESSION['member'])){
					$user_id = $_SESSION['member'];
					$data = $db->get('members','full_name,email,phone_no',"WHERE `id` = '$user_id'");
					$user = $data['result'][0];
				?>
				<div class="col s12" style="margin-bottom:15px;">
					<strong>Member Details</strong>
					<input type="hidden" name="user" value="<?php echo $user_id; ?>">
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Name : </div>
					<div class="col s8">
						<?php echo $user[0]; ?>
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Email : </div>
					<div class="col s8">
						<?php echo $user[1]; ?>
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Phone : </div>
					<div class="col s8">
						<?php echo $user[2]; ?>
					</div>
				</div>
				<div class="col s12" style="margin-bottom:15px;">
					<button type="submit" id="confirm_button" class="theme-btn right">
						<span>CONFIRM</span> <i class="material-icons">arrow_right</i>
					</button>
				</div>
				<?php
				}
				?>
			</form>
		</div>
	</div>
</section>