<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>COURSE BOOKINGS</h5>
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
							Course
						</th>
						<th>
							User
						</th>
						
						<th>
						 	Subscription end date
						</th>
						<th>
						 	Payment
						</th>	
						
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('event_tickets','*',"INNER JOIN events ON `events`.`id` = `event_tickets`.`event`");
						$i=1;
						if(isset($data['result'])):
						foreach($data['result'] as $key => $rw){
							$user=$rw['user'];
							$id=$rw[0];
							$event_id=$rw['event'];
							
							//echo $id;
							$data1=$db->get('members','full_name',"where `id`='$user'");
							$data2=$db->get('invoice','booking_no,status',"where `booking_id`='$id' AND booking_type=3");
							?>

							
				
						<tr>
						
							<td><?php echo $i; ?></td>
							<td><a href="/admin/bill/<?php echo $data2['result'][0][0]; ?>/" target="_blank"><?php echo $data2['result'][0][0]; ?></a></td>
							<td><?php echo $rw['event_name']; ?></td>

							<td><?php echo $data1['result'][0][0];
							 ?>
							<td><?php echo date("Y-m-d",(strtotime($rw['created_at']) + ($rw['no_of_seats']*30*24*60*60))); ?></td>	
							 </td>
							 <td><?php if($data2['result'][0][1]=='0'){
								 echo 'Undefined';
							 }
							elseif($data2['result'][0][1]=='1'){
								 echo 'Paid Online';
							 }
							elseif($data2['result'][0][1]=='2'){
								 echo '<a href="/admin/pay/event/'.$data2['result'][0][0].'/">Confirm payment</a>';
							 }
							elseif($data2['result'][0][1]=='3'){
								 echo 'Payment Received';
							 }
							elseif($data2['result'][0][1]=='5'){
								 echo 'Booking Cancelled';
							 }
							?></td>
							
						</tr>
						<?php $i++; } endif; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>