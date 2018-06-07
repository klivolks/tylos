<section class="court-banner">
	<div class="featured-img">
		<img src="/img/We_are_tylos_page_banner.jpg" style="width:100%">
	</div>
</section>
<section class="white court-common">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center-align">WE&rsquo;re Tylos<br /><small>About Us</small></h1>
			</div>
			<div class="col s12">
				<?php
					$db = new db;
					$data = $db->get("pages","content","where `page`='about-us'");
					echo $data['result'][0][0];
				?>
			</div>
		</div>
	</div>
</section>
<section class="grey lighten-3 court-common">
	<div class="container">
		<div class="row">
			<div class="col l4 s12 center-align">
				<p><img src="/img/We_are_tylos_page_Comfortable_pitch_icon.png" class="responsive-img"></p>
				<p><strong>Comfortable Pitch</strong></p>
				<p>Tylos has most comfortable court surfaces and its completely safe weather changes.</p>
			</div>
			<div class="col l4 s12 center-align">
				<p><img src="/img/icon_2_weather.png" class="responsive-img"></p>
				<p><strong>For All Weather</strong></p>
				<p>Tylos has made the perfect pitch surfaces designed for harsh weather conditions.</p>
			</div>
			<div class="col l4 s12 center-align">
				<p><img src="/img/icon_3_scheduling.png" class="responsive-img"></p>
				<p><strong>Suitable Scheduling</strong></p>
				<p>Tylos set out perfect and suitale courts and timing for players.</p>
			</div>
		</div>
	</div>
</section>
<section class="white court-common">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center-align">Online court reservation service</h1>
			</div>
			<div class="col s12">
				<p>Tylos court booking system provide badminton
		 clubs members and administrative staff the facility to manage court bookings via the  internet, without the need for any software installations. It's available from any location, at any time of the day or night, all you need is a registered account with TYLOS.</p>
				<h6><strong>How it works</strong></h6>
				<p>Member log into <strong>TYLOS</strong> with their respective username and password and from these courts can be reserved or cancelled quickly and easily. Each time a reservation is made members profiles are updated with those upcoming dates as wella displaying past bookings</p>
			</div>
			<div class="col s12">
				<h1 class="center-align">COURT Facilities</h1>
			</div>
			<div class="col l6 s12">
				<h6><strong>Courts designed for all weather changes!</strong></h6>
				<p>Facilities at the tylos badminton
		 centre include Four Clay Courts (including an exhibition court and the centre court which seats upto 1200 people), Four hard courts, Four artificial grass courts, two padel courts and a squash court</p>
				<p>Every court is floodlit and have seating for spectators.</p>
				<p>In addto its badminton
		, padel and squash courts, TYLOS offers a range of other facilities.</p>
				<p style="margin-top: 30px;"><a href="/search/court/" class="theme-btn">View Courts</a></p>
			</div>
			<div class="col l6 s12">
				<img src="/img/We_are_tylos_page_court_facilities_image.jpg" class="responsive-img">
			</div>
		</div>
	</div>
</section>