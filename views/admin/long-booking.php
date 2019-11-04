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
							Start date
						</th>
						<th>
							End Date
						</th>
						<th>
							Payment Status
						</th>	
						
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('court_long_booking','`court_long_booking`.`id` as bookid,`user`,`start_date`,`court_long_booking`.`status`,court_id,`end_date`',"WHERE 1");
						$i=1;
						if(isset($data['result'])):
						foreach($data['result'] as $key => $rw){
							$user=$rw['user'];
							$id=$rw['bookid'];
							//echo $id;
							$data1=$db->get('members','full_name',"where `id`='$user'");
							$data2=$db->get('invoice','booking_no,status',"where `booking_id`='$id' AND booking_type=4");
							?>

							
				
						<tr>
						
							<td><?php echo $i; ?></td>
							<td><a href="/admin/bill/<?php echo $data2['result'][0][0]; ?>/" target="_blank"><?php echo $data2['result'][0][0]; ?></a></td>
							<td><?php echo $data1['result'][0][0]; ?></td>
							<td><?php echo $rw['start_date']; ?></td>
							<td><?php echo $rw['end_date']; ?></td>	
						<td><?php if($data2['result'][0][1]=='0'){
								 echo 'Undefined';
							 }
							elseif($data2['result'][0][1]=='1'){
								 echo 'Paid Online';
							 }
							elseif($data2['result'][0][1]=='2'){
								 echo '<a href="/admin/pay/bulk/'.$data2['result'][0][0].'/" onClick="confirm_btn()">Confirm payment</a>';
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