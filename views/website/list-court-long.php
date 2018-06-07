<section class="white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center">Available courts on <?php $input = new input; 
					$date_range = $input->post('dateOfBooking');
					$string = explode(' - ',$date_range);
					$date = $string[0];
					$enddate = $string[1];
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
						<div class="col l6 s12 item-detail">
							<input type="text" class="daterange" name="dateOfBooking" placeholder="select date" value="<?php echo date('d M, Y',strtotime($date)).' - '.date('d M, Y',strtotime($enddate)); ?>" required>
						</div>
						<div class="col l6 s12 right-align">
							<button type="submit" class="book-btn">Search Availablity</button>
						</div>
					</form>
				</div>
				<?php 
					$db = new db;
					$date = date('Y-m-d',strtotime($date));
					$enddate = date('Y-m-d',strtotime($enddate));
					$courts = $db->get('courts','`id`,`court_name`,`tagline`',"WHERE 1");
					foreach($courts['result'] as $key=>$court){
						$check = 0;
						$current_date = $date;
						while($current_date<=$enddate){
							$court_id = $court[0];
							$data = $db->get('court_inventory','count(*)',"WHERE `status` = 2 AND `date` = '$current_date' AND `court_id` = '$court_id'");
							if($data['result'][0][0]!=0){
								$check=1;
							}
							$current_date=date('Y-m-d',(strtotime($current_date)+86400));
						}
						if($check==0){
							$available_courts[] = array('court_id'=>$court_id,'court_name'=>$court['court_name'],'tagline'=>$court['tagline']);
						}
					}
					
				if(isset($available_courts)){
					foreach($available_courts as $key => $rw):
				?>
				<div class="col s12 book-item">
						<a href="/court/<?php echo $court_id=$rw['court_id']; ?>"><div class="col l10 s12 item-detail">
							<?php echo $rw['court_name']  ?><br>
							<small><?php echo $rw['tagline']  ?></small>
						</div></a>
						<div class="col l2 s12">
							<form action="/booking/confirm/" method="post">
							<input type="hidden" name="booking_type" value="longbook">
						<input type="hidden" name="court" id="court" value="<?php echo $court_id ?>">
						<input type="hidden" name="startdate" value="<?php echo $date; ?>">
						<input type="hidden" name="enddate" value="<?php echo $enddate; ?>">
						<button type="submit" class="book-btn">Select</button>
				</form>
						</div>
				</div>
				<?php
					endforeach;
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