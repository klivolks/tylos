<div class="col m8 l10 s12 content-body">
<?php
	$input=new input;
if($input->get('msg')!=NULL&&$input->get('msg')!=''){
	$msg=$input->get('msg');
	if($msg=='1'){
		?>
			<div class="card-panel green white-text">Your changes saved successfully!!</div>
		<?php
	}
		else if($msg=='0'){
		?>
			<div class="card-panel red white-text">Please check for error in input!!</div>
		<?php
	}
}

?>
<ul class="collapsible collapsible-accordian popout">
	<li class="active">
		<div class="collapsible-header active"><i class="material-icons">account_circle</i> My Profile</div>
		<div class="collapsible-body"><form method="post" action="/admin/edit/profile/">
			<?php 
			$db = new db; 
			$user = $_SESSION['logged_admin'];
			$data = $db->get('users','UserName,Email,Phone',"WHERE `id` = '$user'");
			?>
			<div class="row">
				<div class="col s4">Username : </div><div class="col s8"><input class="input-field" type="text" name="username" value="<?php echo $data['result'][0][0]; ?>"></div>
				<div class="col s4">Email : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data['result'][0][1]; ?>"></div>
				<div class="col s4">Phone : </div><div class="col s8"><input class="input-field" type="text" name="phone" value="<?php echo $data['result'][0][2]; ?>"></div>
				<div class="col s12"><button type="submit" class="btn-flat blue white-text">SAVE</button></div>
			</div>
		</form></div>
	</li>
	<li>
		<div class="collapsible-header"><i class="material-icons">fingerprint</i> Change Password</div>
		<div class="collapsible-body">
		<form method="post" action="/admin/edit/password/">
			<div class="row">
				<div class="col s4">
					Current Password:
				</div>
				<div class="col s8">
					<input type="password" name="currentpassword" class="input-field" placeholder="Current Password" required>
				</div>
				<div class="col s4">
					New Password:
				</div>
				<div class="col s8">
					<input type="password" name="newpassword" class="input-field" placeholder="New Password" required>
				</div>
				<div class="col s4">
					Retype Password:
				</div>
				<div class="col s8">
					<input type="password" name="retypepassword" class="input-field" placeholder="Retype Password" required>
				</div>
				<div class="col s12">
					<button type="submit" class="btn-flat red white-text">CHANGE</button>
				</div>
			</div>
		</form>
		</div>
	</li>
	<li>
		<div class="collapsible-header"><i class="material-icons">lock</i> Account Settings</div>
		<div class="collapsible-body">
			<div class="card-panel red white-text">
				If you deactive your profile, you will not be able to login to admin panel again. You'll have to contact other users to reactivate yourself. If no other users are present you'll have to contact server admin at info@klivolks.com.<br><br><br><a class="btn-flat red darken-4 white-text" href="/admin/deactivate/self/">Deactivate Myself</a>
			</div>
		</div>
	</li>
</ul>
</div>