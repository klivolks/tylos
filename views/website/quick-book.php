<section class="quick-book white">
	<div class="book-head-wrap">
		<div class="container">
			<div class="col s12 center-align">
				<h1>Book Me<br>
				<small>Booking made simple using advanced booking system</small></h1>
			</div>
			<div class="col s12">
				<a href="#" onClick="activate_tab(1)">
					<div class="icon active" id="icon-1">
						<img src="/img/court-book-icon.png" height="50"><br>
						Court
					</div>
				</a>
				<a href="#" onClick="activate_tab(2)">
					<div class="icon" id="icon-2">
						<img src="/img/event-book-icon.png" height="50"><br>
						Courses
					</div>
				</a>
				<a href="#" onClick="activate_tab(3)">
					<div class="icon" id="icon-3">
						<img src="/img/room-book-icon.png" height="50"><br>
						Rooms
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row" id="quick-book">
			<div class="col s12 book-search-wrap" id="tab-1">
				<div class="col s12 book-item">
					<form action="/list/court/" method="post">
						<div class="col l6 s12 item-detail">
							<input type="text" class="datepicker" name="dateOfBooking" placeholder="Select date" required>
						</div>
						<div class="col l6 s12 right-align">
							<button type="submit" class="book-btn">Search Availablity</button>
						</div>
					</form>
				</div>
				<div class="col s12 book-item">
					<h1 class="center-align">Book for a longer period<br><small>Host your own event</small></h1>
				</div>
				<div class="col s12 book-item">
					<form action="/list/court-long/" method="post">
						<div class="col l4 s12">
							<input type="text" class="datepicker" name="startdate" id="startdate" placeholder="Select Start date" onChange="end_date()" required>
						</div>
						<div class="col l4 s12">
							<input type="text" class="datepicker2" name="enddate" id="enddate" placeholder="Select End date" required>
						</div>
						<!--<div class="col l3 s12">
							<select name="slot">
								<?php
								$db = new db;
								$slots = $db->get('court_inventory','DISTINCT(`time`)',"WHERE `status` = 1 ORDER BY `time`");
								foreach($slots['result'] as $slot){
									echo '<option value="'.date("H:i:s",strtotime($slot[0])).'">'.date("h:i a",strtotime($slot[0])).'</option>';
								}
								?>
							</select>
						</div>-->
						<div class="col l4 s12 right-align">
							<button type="submit" class="book-btn">Search Availablity</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col s12 book-search-wrap" id="tab-2" style="display: none;">
				<?php 
					$db = new db;
					$data = $db->get('events','*',"WHERE status = 1 ORDER BY id DESC LIMIT 0,5");
					foreach($data['result'] as $key => $rw):
				?>
				<div class="col s12 book-item">
					<form action="/ticket-book/<?php echo $rw['id']; ?>/" method="post">
							<input type="hidden" class="validate" name="noOfSeats" placeholder="No. of Months" value="1" required>
						<a href="/event/<?php echo $rw['id']; ?>"><div class="col l10 s12 item-detail">
							<?php echo $rw['event_name']  ?><br>
							<small><?php echo $rw['venue'].', '.date('d M',strtotime($rw['event_starting'])).' - '.date('d M',strtotime($rw['event_ending']));  ?></small>
						</div></a>
						<div class="col l2 s12 right-align">
							<button type="submit" class="book-btn">Apply Now</button>
						</div>
					</form>
				</div>
				<?php
					endforeach;
				?>
				
			</div>
			<div class="col s12 book-search-wrap" id="tab-3" style="display: none;">
				<div class="col s12 book-item">
					<form action="/list/room/" method="post">
						<div class="col l4 s12">
							<input type="text" class="datepicker" name="check_in" id="check_in" placeholder="Select CheckIn date" onChange="checkout()" required>
						</div>
						<div class="col l4 s12">
							<input type="text" class="datepicker2" name="check_out" id="check_out" placeholder="Select CheckOut date" required>
						</div>
						<div class="col l4 s12 right-align">
							<button type="submit" class="book-btn">Check Room Availability</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>