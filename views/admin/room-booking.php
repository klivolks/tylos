<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>ROOM BOOKING</h5>
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
							Room Id
						</th>
						<th>
							User
						</th>
						<th>
						Checked In
						</th>
						<th>
						Checked Out
						</th>	
						
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('room_booking','*',"");
						$i=1;
						if(isset($data['result'])):
						foreach($data['result'] as $key => $rw){
							$user=$rw['user'];
							$id=$rw['id'];
							$room_id=$rw['room_id'];

							//echo $id;
							$data1=$db->get('members','full_name',"where `id`='$user'");
							$data2=$db->get('invoice','booking_no',"where `booking_id`='$id' AND booking_type=2");
							?>

							
				
						<tr>
						
							<td><?php echo $i; ?></td>
							<td><a <?php echo' href="/admin/room-details/?room_id='.$room_id.'&user_id='.$user.'"'?>><?php echo $data2['result'][0][0]; ?></a></td>
							<td><?php echo $rw['room_id']; ?></td>

							<td><?php echo $data1['result'][0][0];
							 ?>
							 <td><?php echo $rw['check_in']; ?></td>
							<td><?php echo $rw['check_out']; ?></td>	
							 </td>
							
						</tr>
						<?php $i++; } endif; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>