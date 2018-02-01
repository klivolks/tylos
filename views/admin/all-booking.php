<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>ALL BOOKINGS</h5>
			</div>
			
		</div>
		<div class="row">
			<div class="col s12">
				<table class="striped responsive-table">
					<thead>
						<th>
							#
						</th>
						<th>
							Booking No
						</th>
						<th>
							Court Id
						</th>
						<th>
							User
						</th>
						<th>
						Date
						</th>
						<th>
							Time
						</th>
							
						
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('court_booking','`court_booking`.`id` as bookid,`user`,`timeslot`,`court_booking`.`status`,court_id,`date`,`time`,price',"INNER JOIN court_inventory ON `court_booking`.`timeslot`=`court_inventory`.`id`");
						$i=1;
						if(isset($data['result'])):
						foreach($data['result'] as $key => $rw){
							$user=$rw['user'];
							$id=$rw['bookid'];
							//echo $id;
							$data1=$db->get('members','full_name',"where `id`='$user'");
							$data2=$db->get('invoice','booking_no',"where `booking_id`='$id' AND booking_type=1");
							?>

							
				
						<tr>
						
							<td><?php echo $i; ?></td>
							<td><a <?php echo' href="/admin/booking-details/?booking_id='.$user.'&court_id='.$rw['court_id'].'"'?>><?php echo $data2['result'][0][0]; ?></a></td>
							<td><?php echo $rw['court_id']; ?></td>
							<td><?php echo $data1['result'][0][0]; ?></td>
							<td><?php echo $rw['date']; ?></td>
							<td><?php echo $rw['time']; ?></td>	
						
							
							
						</tr>
						<?php $i++; } endif; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>