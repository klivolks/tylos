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
					$i=1;
					$allslots=$_POST['slots'];
					foreach($allslots as $rw){
					$slot_id = date("H:i:s",$rw);
					$date = date("Y-m-d",strtotime($input->post(court)));
					$data = $db->get('court_inventory','`date`,`time`,`price`,`id`,`court_id`',"WHERE `time` = '$slot_id' AND `status` = 1 AND `date` = '$date' LIMIT 0,1");
					$slot = $data['result'][0];
					$court_id = $slot[4];
					$data = $db->get('courts','court_name',"WHERE `id` = '$court_id'");
					$court_name = $data['result'][0][0];
				?>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s12">
						<strong>Booking <?php echo $i; $i++; ?></strong>
					</div>
				</div>
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
						<input type="hidden" name="timeSlot[]" value="<?php echo $slot[3]; ?>">
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Time : </div>
					<div class="col s8">
						<?php echo date('h:i a',strtotime($slot[1])).'-'.date("h:i a",strtotime($slot[1])+1800); ?>
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
				}
				elseif($booking_type=='longbook'){
					$court_id = $input->post('court');
					$data = $db->get('courts','court_name',"WHERE `id` = '$court_id'");
					$court_name = $data['result'][0][0];
					$sdate = date('Y-m-d',strtotime($input->post('startdate')));
					$edate = date('Y-m-d',strtotime($input->post('enddate')));
					$price=0;
					$allslots=$_POST['slots'];
						$current_date = $sdate;
						while($current_date<=$edate){
							foreach($allslots as $rw){
								$slot =date("H:i:s", $rw);
								$data = $db->get('court_inventory','`price`,`id`',"WHERE `date` = '$current_date' AND `status` = '1' AND `time` = '$slot' GROUP BY `time`");
								if(isset($data['result'])){
									foreach($data['result'] as $key=>$slot_data){
										$price += $slot_data[0];
										$slot_id[] =  $slot_data[1];
									}
								}
							}
						$current_date=date('Y-m-d',(strtotime($current_date)+86400));
							
					}
				?>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Court : </div>
					<div class="col s8">
						<?php echo $court_name; ?>
						<input type="hidden" name="court" value="<?php echo $court_id; ?>">
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Starting Date : </div>
					<div class="col s8">
						<?php echo date('d M Y',strtotime($sdate)); ?>
						<input type="hidden" name="startdate" value="<?php echo $sdate; ?>">
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Ending Date : </div>
					<div class="col s8">
						<?php echo date('d M Y',strtotime($edate)); ?>
						<input type="hidden" name="enddate" value="<?php echo $edate; ?>">
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Slot : </div>
					<div class="col s8">
						<?php foreach($allslots as $rw){ echo date('h:i a',$rw).', '; }
						foreach($slot_id as $slot){
						?>
						<input type="hidden" name="slot[]" value="<?php echo $slot; ?>">
						<?php
						}
					?>
					</div>
				</div>
				<div class="col s12 no-padding" style="margin-bottom:15px;">
					<div class="col s4">Price : </div>
					<div class="col s8">
						Rs. <?php echo $price*1.18; ?>
					</div>
				</div>
				<?php
				}
				elseif($booking_type=='room'){
					$rooms = $input->post('no_of_rooms');
					$check_in = $input->post('check_in');
					$check_out = $input->post('check_out');
					$no_of_days = ((strtotime($check_out)-strtotime($check_in))/(60*60*24))+1;
					?>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">No. of Rooms : </div>
						<div class="col s8">
							<?php echo $rooms ?>
							<input type="hidden" name="no_of_rooms" value="<?php echo $rooms; ?>">
						</div>
					</div>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Check In : </div>
						<div class="col s8">
							<?php echo date('d M Y',strtotime($check_in)); ?>
							<input type="hidden" name="check_in" value="<?php echo $check_in; ?>">
						</div>
					</div>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Check Out : </div>
						<div class="col s8">
							<?php echo date('d M Y',strtotime($check_out)); ?>
							<input type="hidden" name="check_out" value="<?php echo $check_out; ?>">
						</div>
					</div>
					<?php
				}
				elseif($booking_type=='event'){
					$event_id = $input->post('event');
					$no_of_seats = $input->post('noOfSeats');
					$from_month = $input->post('from_month');
					$data = $db->get('events','event_name,ticket_charge,venue,event_starting,event_ending',"WHERE `id` = '$event_id'");
					$total = $no_of_seats*$data['result'][0][1];
					?>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Course : </div>
						<div class="col s8">
							<?php echo $data['result'][0][0]; ?>
							<input type="hidden" name="event" value="<?php echo $event_id; ?>">
						</div>
					</div>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Venue : </div>
						<div class="col s8">
							<?php echo $data['result'][0][2]; ?>
						</div>
					</div>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Course Fee : </div>
						<div class="col s8">
							<?php echo $data['result'][0][1]; ?>
						</div>
					</div>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">No. Of Months : </div>
						<div class="col s8">
							<?php echo $no_of_seats; ?>
							<input type="hidden" name="noOfSeats" value="<?php echo $no_of_seats; ?>">
						</div>
					</div>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Total Fees : </div>
						<div class="col s8">
							<strong><?php echo $total; ?></strong>
						</div>
					</div>
					<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Subscribed from : </div>
						<div class="col s8">
							<?php echo date('d M,Y',strtotime($from_month)); ?>
							<input type="hidden" name="from_month" value="<?php echo date("Y-m-d",strtotime($from_month)); ?>">
						</div>
					</div>
					<!--<div class="col s12 no-padding" style="margin-bottom:15px;">
						<div class="col s4">Course Ending Date : </div>
						<div class="col s8">
							<?php echo date('d M Y',strtotime($data['result'][0][4])); ?>
						</div>
					</div>-->
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