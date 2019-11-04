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
							User
						</th>
						<th>
							Court
						</th>
						<th>
							Date
						</th>
						<th>
							Slot
						</th>
							<th>
							Payment Status
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
							$court_id = $rw['court_id'];
							$court = $db->get('courts','court_name',"WHERE `id`='$court_id'");
							//echo $id;
							$data1=$db->get('members','full_name',"where `id`='$user'");
							$data2=$db->get('invoice','booking_no,status',"where `booking_id`='$id' AND booking_type=1");
							?>

							
				
						<tr>
						
							<td><?php echo $i; ?></td>
							<td><a href="/admin/bill/<?php echo $data2['result'][0][0]; ?>/" target="_blank"><?php echo $data2['result'][0][0]; ?></a></td>
							<td><?php echo $data1['result'][0][0]; ?></td>
							<td><?php echo $court['result'][0][0]; ?></td>
							<td><?php echo date("d/m/Y",strtotime($rw['date'])); ?></td>
							<td><?php echo $rw['time']; ?></td>	
						<td><?php if($data2['result'][0][1]=='0'){
								 echo 'Undefined';
							 }
							elseif($data2['result'][0][1]=='1'){
								 echo 'Paid Online';
							 }
							elseif($data2['result'][0][1]=='2'){
								 echo '<a href="/admin/pay/court/'.$data2['result'][0][0].'/" onClick="confirm_btn()">Confirm payment</a>';
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