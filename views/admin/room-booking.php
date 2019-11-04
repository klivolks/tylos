<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>ROOM BOOKINGS</h5>
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
							User
						</th>
						<th>
							No. of Rooms
						</th>
						<th>
						Checked In
						</th>
						<th>
						Checked Out
						</th>	
						<th>
							Payment Status
						</th>
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('room_booking','DISTINCT(booking_no),`invoice`.`status`,`expected_check_in`,`expected_check_out`,`user`',"INNER JOIN invoice ON `invoice`.`booking_id` = `room_booking`.`id` WHERE booking_type = 2");
						$i=1;
						if(isset($data['result'])):
						foreach($data['result'] as $key => $rw){
							$user=$rw['user'];
							$id=$rw['book_id'];
							$room_id=$rw['room_id'];

							//echo $id;
							$data1=$db->get('members','full_name',"where `id`='$user'");
							$data2=$db->get('room_booking','COUNT(*)',"INNER JOIN invoice ON `invoice`.`booking_id` = `room_booking`.`id` WHERE booking_no='$rw[0]'");
							?>

							
				
						<tr>
						
							<td><?php echo $i; ?></td>
							<td><a href="/admin/bill/<?php echo $rw[0]; ?>/" target="_blank"><?php echo $rw[0]; ?></a></td>
							<td><?php echo $data1['result'][0][0]; ?></td>
							<td><?php echo $data2['result'][0][0];
							 ?>
							 <td><?php echo date("d/m/Y",strtotime($rw['expected_check_in'])); ?></td>
							<td><?php echo date("d/m/Y",strtotime($rw['expected_check_out'])); ?></td>	
							 </td>
							 <td><?php if($rw[1]=='0'){
								 echo 'Undefined';
							 }
							elseif($rw[1]=='1'){
								 echo 'Paid Online';
							 }
							elseif($rw[1]=='2'){
								 echo '<a href="/admin/pay/room/'.$rw[0].'/" onClick="confirm_btn()">Confirm payment</a>';
							 }
							elseif($rw[1]=='3'){
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
	<script>
	function confirm_btn(){
		if(window.confirm('Are you sure customer paid?') == true){ 
			//window.location.assign('/functions/cancel/<?php echo $data['result'][0][0]; ?>/');
		}
		else{
			event.preventDefault(); 
		}
	}
</script>