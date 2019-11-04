<?php 
$booking_no = $sub_page; 
$db = new db; 
$data = $db->get('invoice','booking_type,booking_id,status,created_at',"WHERE booking_no = '$booking_no'"); 
$invoice = (object)$data['result'][0];
$room_invoice = $data['result'];
$sub = 0;
if($invoice->booking_type==1){
	$data = $db->get('court_booking','timeslot,full_name,email,phone_no,rate',"INNER JOIN members ON `members`.`id` = `court_booking`.`user` WHERE `court_booking`.`id` = '$invoice->booking_id'");
	$booking = (object)$data['result'][0];
	$data = $db->get('court_inventory','`date`,`time`,`price`,court_name,tagline',"INNER JOIN courts ON `court_inventory`.`court_id` = `courts`.`id` WHERE `court_inventory`.`id` = '$booking->timeslot'");
	$court = (object)$data['result'][0];
	$description = $court->court_name.'<br><small>'.$court->tagline.'</small><br>'.date("d/m/Y",strtotime($court->date)).' '.date('h:i a',strtotime($court->time));
	$rate = $booking->rate;
	$qty = 1;
	$net = $rate * $qty;
	$sub += $net; 
	$total = round(($net * 1.18),2);
}
elseif($invoice->booking_type==2){
	$row='';
	$total=0;
	foreach($room_invoice as $rbook){
		$data = $db->get('room_booking','full_name,email,phone_no,expected_check_in,expected_check_out,persons,room_id,rate',"INNER JOIN members on `room_booking`.`user` = `members`.`id` WHERE `room_booking`.`id` = '$rbook[booking_id]'");
		$booking = (object)$data['result'][0];
		$data = $db->get('rooms','room_name,room_type,rent',"WHERE `id` = '$booking->room_id'");
		$room = (object)$data['result'][0];
		$description = $room->room_name.'<br>'.$room->room_type.'<br>'.date('d/m/Y',strtotime($booking->expected_check_in)).' - '.date('d/m/Y',strtotime($booking->expected_check_out));
		$rate = $booking->rate;
		$qty = ((strtotime($booking->expected_check_out)-strtotime($booking->expected_check_in))/(24*60*60));
		if($qty<1){
			$qty=1;
		}
		$net = $rate * $qty;
		if($total==0){
			$row.='<div class="col s12"><div class="col s6">'.$description.'<br><br></div><div class="col s2">'.$rate.'</div><div class="col s2 center-align">'.$qty.'</div><div class="col s2 right-align">'.$net.'</div></div>';
		}
		else{
			$row.='<div class="col s12 no-padding"><hr /></div><div class="col s12"><div class="col s6">'.$description.'<br><br></div><div class="col s2">'.$rate.'</div><div class="col s2 center-align">'.$qty.'</div><div class="col s2 right-align">'.$net.'</div></div>';
		}
		$sub += $net; 
		$total += round(($net * 1.18),2);
	}
}
elseif($invoice->booking_type==3){
	$data = $db->get('event_tickets','full_name,email,phone_no,no_of_seats,event,`event_tickets`.`created_at`,`rate`,`from_month`',"INNER JOIN members on `event_tickets`.`user` = `members`.`id` WHERE `event_tickets`.`id` = '$invoice->booking_id'");
	$booking = (object)$data['result'][0];
	$data = $db->get('events','event_name,ticket_charge,venue,event_starting,event_ending',"WHERE `id` = '$booking->event'");
	$event = (object)$data['result'][0];
	$description = $event->event_name.'<br>@'.$event->venue.'<br> From '.date('d M, Y',strtotime($booking->from_month)).' to '.date('d M, Y',(strtotime($booking->from_month)+($booking->no_of_seats*30*86400))); 
	$rate = $booking->rate;;
	$qty = $booking->no_of_seats;
	if($qty<1){
		$qty=1;
	}
	$net = $rate * $qty;
	$sub += $net; 
	$total = round(($net * 1.18),2);
	$qty.=' months';
}
elseif($invoice->booking_type==4){
	$no=0;
	$data = $db->get('court_long_booking','start_date,full_name,email,phone_no,end_date,slot',"INNER JOIN members ON `members`.`id` = `court_long_booking`.`user` WHERE `court_long_booking`.`id` = '$invoice->booking_id'");
	$booking = (object)$data['result'][0];
//	$court_id = $booking->court_id;
//	$data = $db->get('courts','court_name,tagline',"WHERE `id` = '$court_id'");
//	$court = (object)$data['result'][0];
//	$sdate = date('Y-m-d',strtotime($booking->start_date));
//	$edate = date('Y-m-d',strtotime($booking->end_date));
//	$slot = $booking->slot;
	$price=0;
//	$current_date = $sdate;
//	while($current_date<=$edate){
	$row = '';
		$slots = json_decode($booking->slot);
		foreach($slots as $slot){
			$data = $db->get('court_inventory','`price`,`court_id`,`date`,`time`',"WHERE `id` = '$slot'");
			foreach($data['result'] as $key=>$rw){
				$price += $rw[0];
				$no++;
				$court_id=$rw[1];
				$courts = $db->get('courts','court_name,tagline',"WHERE `id` = '$court_id'");
				$court = (object)$courts['result'][0];
				$rate = $rw[0];
				$qty = 1;
				$net = $rate * $qty;
				$description = $court->court_name.'<br><small>'.$court->tagline.'</small><br>'.date("d/m/Y",strtotime($rw[2])).'<br>Time: '.date("h:i a",strtotime($rw[3]));
				if($sub==0){
					$row.='<div class="col s12"><div class="col s6">'.$description.'<br><br></div><div class="col s2">'.$rate.'</div><div class="col s2 center-align">'.$qty.'</div><div class="col s2 right-align">'.$net.'</div></div>';
				}
				else{
					$row.='<div class="col s12 no-padding"><hr /></div><div class="col s12"><div class="col s6">'.$description.'<br><br></div><div class="col s2">'.$rate.'</div><div class="col s2 center-align">'.$qty.'</div><div class="col s2 right-align">'.$net.'</div></div>';
				}
				$sub += $net;
			}
		}
		//$current_date=date('Y-m-d',(strtotime($current_date)+86400));
//	}
	$total = round(($sub * 1.18),2);
}
?>
<section class="white back-btn">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<a href="/account/"><button class="theme-btn"><i class="material-icons left">arrow_back</i><span>BACK</span></button></a>
			</div>
		</div>
	</div>
</section>
<section class="print white">
	<div class="container">
		<div class="row">
			<div class="col s6">
				<img src="/img/logo.png" class="responsive-img">
			</div>
			<div class="col s6 right-align">
				info@tylosacademy.com<br><br>
				+91 9605632313<br>
				Ramkripa, Medical College P.O, <br>Thrissur, Kerala
			</div>
		</div>
		<div class="row">
			<div class="red-line">
			</div>
		</div>
		<div class="row">
			<div class="col s12 address">
				<div class="col s7">
					<?php echo $booking->full_name; ?><br>
					<?php echo $booking->email; ?><br>
					<?php echo $booking->phone_no; ?>
				</div>
				<div class="col s5">
					<div class="row no-box right">
						<div class="col s12">
							<div class="col s6 no-padding">BID <br><br></div>
							<div class="col s6">: <?php echo $booking_no; ?></div>
						</div>
						<div class="col s12">
							<div class="col s6 no-padding">Date <br><br></div> 
							<div class="col s6">: <?php echo date("d-m-Y",strtotime($invoice->created_at)); ?></div>
						</div>
						<div class="col s12">
							<div class="col s6 no-padding">Payment Status </div> 
							<div class="col s6">: <?php if($invoice->status=='0'){ 
	echo 'Not Paid';
}
								elseif($invoice->status=='1'){
									echo 'Paid Online';
								}
								elseif($invoice->status=='2'){
									echo 'Pay at Court';
								}
								elseif($invoice->status=='3'){
									echo 'Paid';
								}
								?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row title">
			<div class="col s12">
				<div class="col s6">Description</div>
				<div class="col s2">Rate</div>
				<div class="col s2 center-align"><?php if($invoice->booking_type==1){ echo 'Slots'; }elseif($invoice->booking_type==2){ echo 'Days'; }elseif($invoice->booking_type==3){ echo 'Months'; }elseif($invoice->booking_type==4){ echo 'Slots'; } ?></div>
				<div class="col s2 right-align">Net</div>
			</div>
		</div>
		<div class="row print-content grey lighten-4">
		<?php
			if($invoice->booking_type==2){
				echo $row;
			}
			elseif($invoice->booking_type==4){
				echo $row;
			}
			else{
				?>
			<div class="col s12">
				<div class="col s6"><?php echo $description; ?><br><br></div>
				<div class="col s2"><?php echo $rate; ?></div>
				<div class="col s2 center-align"><?php echo $qty; ?></div>
				<div class="col s2 right-align"><?php echo $net; ?></div>
			</div>
			
			<?php
			}
			?>
		</div>
		<div class="row">
				<div class="grey-line"></div>
			</div>
		<div class="row sub-total">
			<div class="col s12">
				<div class="col s2 push-s8 center-align">
					Sub Total
				</div>
				<div class="col s2 push-s8 right-align">
					<?php echo $sub; ?>
				</div>
			</div>
			<div class="col s12">
				<div class="col s2 push-s8 center-align">
					Tax
				</div>
				<div class="col s2 push-s8 right-align">
					18%
				</div>
			</div>
		</div>
		<div class="row total">
			<div class="col s12">
				<div class="col s2 push-s8 center-align">
					Total
				</div>
				<div class="col s2 push-s8 right-align">
					<?php echo $total; ?>
				</div>
			</div>
		</div>
		<div class="row disclaimer">
			<div class="col s12">
				This is a system generated invoice.
			</div>
		</div>
		<div class="row disclaimer">
			<div class="col s12 center-align">
				<a href="#" class="print-btn" onClick="window.print()"><button type="button" class="theme-btn"><i class="material-icons left">print</i> <span>PRINT</span></button></a>
			</div>
		</div>
	</div>
</section>



<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/materialize.min.js"></script>
<!--<script src="https://api.klubsta.com/sdk.js?v=0.2.0"> </script>-->
<script type="text/javascript" src="/js/app.js?v=0.0.26"></script>
</body>
</html>