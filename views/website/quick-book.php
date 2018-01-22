<section class="quick-book white">
	<div class="book-head-wrap">
		<div class="container">
			<div class="col s12 center-align">
				<h1>Book Me<br>
				<small>Booking made simple using advanced booking system</small></h1>
			</div>
			<div class="col s12">
				<a>
					<div class="icon active">
						<img src="/img/court-book-icon.png" height="50"><br>
						Court
					</div>
				</a>
				<a>
					<div class="icon">
						<img src="/img/event-book-icon.png" height="50"><br>
						Events
					</div>
				</a>
				<a>
					<div class="icon">
						<img src="/img/room-book-icon.png" height="50"><br>
						Rooms
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row" id="quick-book">
			<div class="col s12 book-search-wrap">
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
		</div>
	</div>
</section>