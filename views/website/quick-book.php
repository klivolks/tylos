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
						Events
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
				<?php 
					$db = new db;
					$data = $db->get('courts','*',"WHERE status = 1 ORDER BY id DESC LIMIT 0,5");
					foreach($data['result'] as $key => $rw):
				?>
				<div class="col s12 book-item">
					<form action="/court-book/<?php echo $rw['id']; ?>/" method="post">
						<div class="col l2 s12">
							<input type="text" class="datepicker" name="dateOfBooking" placeholder="Select date" required>
						</div>
						<a href="/court/<?php echo $rw['id']; ?>"><div class="col l8 s12 item-detail">
							<?php echo $rw['court_name']  ?><br>
							<small><?php echo $rw['tagline']  ?></small>
						</div></a>
						
						<div class="col l2 s12 right-align">
							<button type="submit" class="book-btn">Book Now</button>
						</div>
					</form>
				</div>
				<?php
					endforeach;
				?>
				
			</div>
			<div class="col s12 book-search-wrap" id="tab-2" style="display: none;">
				<?php 
					$db = new db;
					$data = $db->get('events','*',"WHERE status = 1 ORDER BY id DESC LIMIT 0,5");
					foreach($data['result'] as $key => $rw):
				?>
				<div class="col s12 book-item">
					<form action="/ticket-book/<?php echo $rw['id']; ?>/" method="post">
						<div class="col l2 s12">
							<input type="number" class="validate" name="noOfSeats" placeholder="No. of Seats" required>
						</div>
						<a href="/event/<?php echo $rw['id']; ?>"><div class="col l8 s12 item-detail">
							<?php echo $rw['event_name']  ?><br>
							<small><?php echo $rw['venue'].', '.date('d M',strtotime($rw['event_starting'])).' - '.date('d M',strtotime($rw['event_ending']));  ?></small>
						</div></a>
						<div class="col l2 s12 right-align">
							<button type="submit" class="book-btn">Book Now</button>
						</div>
					</form>
				</div>
				<?php
					endforeach;
				?>
				
			</div>
			<div class="col s12 book-search-wrap" id="tab-3" style="display: none;">
				<?php 
					$db = new db;
					$data = $db->get('rooms','*',"WHERE status = 1 ORDER BY id DESC LIMIT 0,5");
					foreach($data['result'] as $key => $rw):
				?>
				<div class="col s12 book-item">
					<form action="/room-book/<?php echo $rw['id']; ?>/" method="post">
						<div class="col l2 s12">
							<input type="text" class="datepicker" name="dateOfBooking" placeholder="Select date" required>
						</div>
						<a href="/room/<?php echo $rw['id']; ?>"><div class="col l8 s12 item-detail">
							<?php echo $rw['room_name']  ?><br>
							<small><?php echo $rw['room_type'];  ?></small>
						</div></a>
						<div class="col l2 s12 right-align">
							<button type="submit" class="book-btn">Book Now</button>
						</div>
					</form>
				</div>
				<?php
					endforeach;
				?>
				
			</div>
		</div>
	</div>
</section>