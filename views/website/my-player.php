<?php $db = new db; $member = $_SESSION['member']; 
?>
<section class="login white">
	<div class="container">
		<div class="row grey lighten-3">
			<div class="col l3 s12 no-padding" style="border-right: 1px solid #c4c4c4; height: 100% !important;">
				<ul class="account-menu">
					<a href="/account/"><li>Dashboard</li></a>
					<a href="/account/history/court/"><li>Court Bookings</li></a>
					<a href="/account/history/room/"><li>Room Bookings</li></a>
					<a href="/account/history/event/"><li>Event Bookings</li></a>
					<a href="/account/players/"><li class="active">Player Profile</li></a>
					<a href="/account/team/"><li>Team</li></a>
					<a href="/account/profile/"><li>My Profile</li></a>
				</ul>
			</div>
			<div class="col l9 s12 no-padding">
				<div class="col s12 grey lighten-2 login-box">
					<h5>My Player Profile</h5>
				</div>
				<div class="col s12 login-box">
					<div class="col s12">
						<form class="row" method="post" action="/functions/my-player/" enctype="multipart/form-data">
							<div class="col s12 input-field">
								<input type="text" name="PlayerName" class="validate" required>
								<label>Registered Player Name</label>
							</div>
							<div class="col s12 input-field">
								<input type="text" name="DateofBirth" class="dob" required>
								<label>Date of Birth</label>
							</div>
							<div class="col s12 input-field">
								<input type="text" name="Place" class="validate" required>
								<label>Living In</label>
							</div>
							<div class="col s12 input-field">
								<input type="text" name="Height" class="validate" required>
								<label>Height</label>
							</div>
							<div class="col s12 input-field">
								<input type="text" name="Weight" class="validate" required>
								<label>Weight</label>
							</div>
							<div class="col s12 input-field">
								<select name="Hand">
									<option disabled selected>Select hand you use</option>
									<option value="Right-Handed">Right Handed</option>
									<option value="Left-Handed">Left Handed</option>
								</select>
								<label>Hand<small>(Right/Left)</small></label>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>