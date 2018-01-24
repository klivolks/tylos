<section class="header common-header white">
	<div class="container">
		<div class="row">
			<a href="/"><div class="col l2 m3 s6">
				<img src="/img/logo.png" height="40" alt="Logo">
			</div></a>
			<div class="col l6 hide-on-med-and-down">
				<div class="row search-common">
					<form class="col s12 no-padding" action="/search/" method="post">
						<div class="col l10 s8 no-padding">
							<input type="text" class="search-input-common" name="search" placeholder="Search for events and much more at Tylos" required>
						</div>
						<div class="col l2 s4 no-padding">
							<button type="submit" class="search-btn-common">SEARCH</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col l4 m9 s6 right-align login-box">
				<?php
					if(isset($_SESSION['member'])){
						$db = new db;
						$member = $_SESSION['member'];
						$data = $db->get('members','full_name',"WHERE `id` = '$member'");
						?>
						<span>Hi,</span> <a href="/account/profile"><?php echo $data['result'][0][0]; ?></a> <span>|</span> <a href="/logout/" style="top: 0;"><i class="material-icons">power_settings_new</i></a> <a href="/account/" style="top: 0;"><img src="/img/account-icon.png" width="30"></a>
						<?php
					}
					else{
				?>
					<a href="/signin/">Sign In</a> <span>|</span> <a href="/register/">Register</a> <img src="/img/account-icon.png" width="30">
				<?php
					}
				?>
			</div>
		</div>
	</div>
</section>
<section class="menu white">
	<div class="container">
		<div class="row">
			<div class="col s1">
				<a href="#"><img src="/img/menu-icon.png" height="30"></a>
			</div>
			<div class="col s10">
				<ul class="hide-on-med-and-down">
					<li><a href="#">We're tylos</a></li>
					<li><a href="#">Courts</a></li>
					<li><a href="#">Rooms</a></li>
					<li><a href="#">Events</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="/gallery/">Gallery</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div>
			<div class="col s1 right-align notification-icon">
				<div class="offer-count">1</div>
				<img src="/img/notification-icon.png" class="" height="30">
				<div class="notifications left-align">
					<ul>
						<li>
							<a href="#">
								<i class="material-icons left">card_giftcard</i> 10% off when you purchase court before 14 February 2017.
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>