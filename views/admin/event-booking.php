<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>EVENT BOOKINGS</h5>
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
							Event Id
						</th>
						<th>
							User
						</th>
						<th>
						Day Of Events
						</th>
						<th>
						No Of Seats
						</th>	
						
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('event_tickets','*',"");
						$i=1;
						if(isset($data['result'])):
						foreach($data['result'] as $key => $rw){
							$user=$rw['user'];
							$id=$rw['id'];
							$event_id=$rw['event'];

							//echo $id;
							$data1=$db->get('members','full_name',"where `id`='$user'");
							$data2=$db->get('invoice','booking_no',"where `booking_id`='$id' AND booking_type=3");
							?>

							
				
						<tr>
						
							<td><?php echo $i; ?></td>
							<td><a <?php echo' href="/admin/event-details/?event_id='.$event_id.'&user_id='.$user.'"'?>><?php echo $data2['result'][0][0]; ?></a></td>
							<td><?php echo $rw['event']; ?></td>

							<td><?php echo $data1['result'][0][0];
							 ?>
							 <td><?php echo $rw['date_of_event']; ?></td>
							<td><?php echo $rw['no_of_seats']; ?></td>	
							 </td>
							
						</tr>
						<?php $i++; } endif; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>