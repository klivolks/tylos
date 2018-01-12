<div class="header row">
	<div class="col m4 l2 s3 black-text menu-header grey lighten-3">
		<img src="/img/logo.png" class="logo" alt="" height="40"><span class="logo-text hide-on-med-and-down"></span>
	</div>
	<div class="col m8 l10 s9 right-icons">
		<a href="#" class=""><div class="button account-button right">
			<i class="material-icons">account_circle</i>
			<div class="account-details grey darken-3">
				<i class="material-icons mi-48">account_circle</i>
				<?php
					$db = new db;
					$user = $_SESSION['logged_admin'];
					$data = $db->get('users','UserName,Email,Phone',"WHERE `id`='$user'");
				?>
				<div class="sub-details">
					<?php echo $data['result'][0][0]; ?><br>
					<small><?php echo $data['result'][0][1]; ?></small><br>
					<small><?php echo $data['result'][0][2]; ?></small>				</div>
			</div>
		</div></a>
		<a href="/admin/logout/"><div class="button logout-button right">
			<i class="material-icons">exit_to_app</i>
		</div></a>
		<a href="#" class="hide-on-large-only" onClick="menu_toggle()"><div class="button menu-button">
			<i class="material-icons">menu</i>
		</div></a>
	</div>
</div>
<div class="row content">