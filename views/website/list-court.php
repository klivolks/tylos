<section class="white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center">Available slots on 
				<?php 
					$input = new input; 
					$callbackURL = $input->get('callbackURL'); 
					if($callbackURL!=''){
						$date = date("Y-m-d",strtotime($input->get('slot'))); 
					}
					else{
						$date = $input->post('dateOfBooking');
					}
					echo date('d M, Y',strtotime($date)) ?><br><small>Book with ease</small></h1>
			</div>
		</div>
	</div>
</section>
<section class="quick-book white">
	<div class="container">
		<div class="row" id="quick-book">
			<div class="col s12 book-search-wrap" id="tab-1">
				<div class="col s12 book-item white">
					<form action="/list/court/" method="post">
						<div class="col l6 s12 item-detail">
							<input type="text" class="datepicker" name="dateOfBooking" placeholder="Select date" value="<?php echo date('d M, Y',strtotime($date)) ?>" required>
						</div>
						<div class="col l6 s12 right-align">
							<button type="submit" class="book-btn">Search Availablity</button>
						</div>
					</form>
				</div>
				<?php 
					$db = new db;
					$date = date('Y-m-d',strtotime($date));
					$data = $db->get('courts','DISTINCT(court_name),court_id,tagline',"INNER JOIN court_inventory ON `court_inventory`.`court_id` = `courts`.`id` WHERE `court_inventory`.`status` = 1 AND `court_inventory`.`date` = '$date'");
				if(isset($data['result'])){
					$court_id=1;
				?>
				<div class="col s12 book-item">
						<div class="col s12 item-detail">
							<div class="left"><h1 style="margin: 0;">Available Slots</h1><br>
							<small></small></div>
							<div class="right"><img src="/img/Time_slot_page_view_court_icon.png" class="responsive-img"><br>
							<small class="grey-text">Court</small></div>
						</div>
						<div class="col s12">
							<?php
							$slots = $db->get('court_inventory','DISTINCT(`time`)',"WHERE `date`='$date' AND status=1 ORDER BY `time` ASC");
						foreach($slots['result'] as $key => $slot):
					?>
							<a href="#" onClick="select_slot(<?php echo strtotime($slot[0]); ?>,<?php echo strtotime($date); ?>)"><div class="slot" id="slot_<?php echo strtotime($slot[0]); ?>"><?php echo date('h:i a',strtotime($slot[0])).' -  '.date('h:i a',(strtotime($slot[0])+1800)); ?></div></a>
							<?php endforeach; ?>
						</div>
						
				</div>
				<?php
				}
				else{
					?>
					<div class="col s12 card red white-text" style="padding: 20px;">
						No courts available for selected date
				</div>
					<?php
				}
				?>
				<div class="col s12 book-item">
				<form action="/booking/confirm/" method="post">
					<input type="hidden" name="booking_type" value="court">
					<input type="hidden" name="court" id="court" value="<?php echo $date; ?>">
					<input type="hidden" name="timeSlot" id="timeSlot" value="0">
					<div class="">
						<?php
							foreach($slots['result'] as $key => $slot){
								echo '<input type="checkbox" name="slots[]" id="slot_check_'.strtotime($slot[0]).'" value="'.strtotime($slot[0]).'">';
							}
						?>
					</div>
					<div class="col l2 s12">
						<button type="submit" id="book-btn" class="book-btn">Confirm</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</section>