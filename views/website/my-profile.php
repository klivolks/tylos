<?php $member = $_SESSION['member']; $db=new db; $data = $db->get('members','*',"WHERE `id` = '$member'"); $user = $data['result'][0]; ?>
<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-2 col l8 push-l2 s12 login-box">
				<h5>My Profile</h5>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-3 col l8 push-l2 s12 login-box">
				<div class="col l4 s12 center" style="border-right: 1px #999999 solid;">
					<img src="/img/my-profile.png" class="responsive-img">
				</div>
				<div class="col l8 s12">
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $user['full_name'] ?>" disabled>
						<label>Full Name</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $user['gender'] ?>" disabled>
						<label>Gender</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $user['email'] ?>" disabled>
						<label>Email</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $user['phone_no'] ?>" disabled>
						<label>Phone Number</label>
					</div>
					<div class="col s12 input-field">
						<input type="text" value="<?php echo $user['location'] ?>" disabled>
						<label>Location</label>
					</div>
					<div class="col s12">
						<a class="red-text text-darken-2" href="/account/change-password/"><i class="material-icons">vpn_key</i> <span>Change Password</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-2 col l8 push-l2 s12 login-box">
				<a class="red-text text-darken-2" href="/account/"><i class="material-icons">arrow_back</i> <span>Back</span></a>
				<a class="red-text text-darken-2 right" href="/account/delete/"><i class="material-icons">delete</i> <span>Delete My Account</span></a>
			</div>
		</div>
	</div>
</section>