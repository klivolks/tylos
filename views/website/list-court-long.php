<section class="white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center">Available courts on <?php $input = new input; 
					$date = $input->post('startdate');
					$date=preg_replace('/^([^,]*).*$/', '$1', $date);
					$enddate = $input->post('enddate');
					$enddate=preg_replace('/^([^,]*).*$/', '$1', $enddate);
					echo date('d M, Y',strtotime($date)).' - '.date('d M, Y',strtotime($enddate)); ?><br><small>Book with ease</small></h1>
			</div>
		</div>
	</div>
</section>
<section class="quick-book white">
	<div class="container">
		<div class="row" id="quick-book">
			<div class="col s12 book-search-wrap" id="tab-1">
				<div class="col s12 book-item">
					<form action="/list/court-long/" method="post">
						<div class="col l4 s12">
							<input type="text" class="datepicker" name="startdate" id="startdate" placeholder="Select Start date" onChange="end_date()" required>
						</div>
						<div class="col l4 s12">
							<input type="text" class="datepicker2" name="enddate" id="enddate" placeholder="Select End date" required>
						</div>
						<div class="col l4 s12 right-align">
							<button type="submit" class="book-btn">Search Availablity</button>
						</div>
					</form>
				</div>
				<?php 
					$db = new db;
					$date = date('Y-m-d',strtotime($date));
					$enddate = date('Y-m-d',strtotime($enddate));
					//$slot = $input->post('slot');
					$courts = $db->get('courts','`id`,`court_name`,`tagline`',"WHERE 1 ORDER BY `id` DESC");
					foreach($courts['result'] as $key=>$court){
						$check = 0;
						$current_date = $date;
						while($current_date<=$enddate){
							$court_id = $court[0];
							$data_check = $db->get('court_inventory','count(*)',"WHERE `date` = '$current_date' AND `court_id` = '$court_id' AND `time` = '$slot'");
							if(isset($data_check['result'])){
								$data = $db->get('court_inventory','count(*)',"WHERE `status` != 1 AND `date` = '$current_date' AND `court_id` = '$court_id' AND `time` = '$slot'");
								if($data['result'][0][0]!=0){
									$check=1;
								}
							}
							else{
								$check=1;
							}
							$current_date=date('Y-m-d',(strtotime($current_date)+86400));
						}
						if($check==0){
							$available_courts[] = array('court_id'=>$court_id,'court_name'=>$court['court_name'],'tagline'=>$court['tagline']);
						}
					}
					
				if(isset($available_courts)){
					$rw = $available_courts[0];
				?>
				<div class="col s12 book-item">
						<!--<a href="/court/<?php echo $court_id=$rw['court_id']; ?>"><div class="col l10 s12 item-detail">
							<?php echo $rw['court_name']  ?><br>
							<small><?php echo $rw['tagline']  ?></small>
						</div></a>-->
						<div class="col s12 item-detail">
							<div class="left"><h1 style="margin: 0;">Available Slots</h1><br>
							<small></small></div>
							<div class="right"><img src="/img/Time_slot_page_view_court_icon.png" class="responsive-img"><br>
							<small class="grey-text">Court</small></div>
						</div>
						<div class="col s12">
							<?php
							$slots = $db->get('court_inventory','DISTINCT(`time`)',"WHERE (`date` BETWEEN '$date' AND '$enddate' OR `date` = '$date' OR `date` = '$enddate') AND status=1 ORDER BY `time` ASC");
						foreach($slots['result'] as $key => $slot):
					?>
							<a href="#" onClick="select_long_slot(<?php echo strtotime($slot[0]); ?>)"><div class="slot" id="slot_<?php echo strtotime($slot[0]); ?>"><?php echo date('h:i a',strtotime($slot[0])).' -  '.date('h:i a',(strtotime($slot[0])+1800)); ?></div></a>
							<?php endforeach; ?>
						</div>
						<div class="col l2 s12">
							<form action="/booking/confirm/" method="post">
							<input type="hidden" name="booking_type" value="longbook">
						<input type="hidden" name="court" id="court" value="<?php echo $court_id ?>">
						<input type="hidden" name="startdate" id="start_date" value="<?php echo $date; ?>">
						<input type="hidden" name="enddate" id="end_date" value="<?php echo $enddate; ?>">
						<div class="">
							<?php
								foreach($slots['result'] as $key => $slot){
									echo '<input type="checkbox" name="slots[]" id="slot_check_'.strtotime($slot[0]).'" value="'.strtotime($slot[0]).'">';
								}
							?>
						</div>
						<button type="submit" class="book-btn" id="">Confirm</button>
						<!--<script>
							var xs = document.getElementById("book-btn");
							document.onload = xs.click();
						</script>-->
				</form>
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
			</div>
		</div>
	</div>
</section>