<div class="col m8 l10 s12 content-body">
		<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
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
		<div class="row">
			<div class="col s12" style="margin-bottom: 20px;"><h5>New Admin</h5></div>
			
			<form method="post" action="/admin/add/admin">
			<div class="col s4">
				Username
			</div>
			<div class="col s8">
				<input type="text" class="input-field" name="username" autocomplete="off" placeholder="UserName" required>
			</div>
			<div class="col s4">
				Email
			</div>
			<div class="col s8">
				<input type="text" class="input-field" name="email" autocomplete="off" placeholder="Email" required>
			</div>
			<div class="col s4">
				Phone
			</div>
			<div class="col s8">
				<input type="text" class="input-field" name="phone" autocomplete="off" placeholder="Phone" required>
			</div>
			<div class="col s4">
				Password
			</div>
			<div class="col s8">
				<input type="password" class="input-field" name="password" autocomplete="off" placeholder="Password" required>
			</div>
			<div class="col s4">
				Retype Password
			</div>
			<div class="col s8">
				<input type="password" class="input-field" name="retypepassword" autocomplete="off" placeholder="Retype Password" required>
			</div>
			<div class="col s12">
				<button type="submit" class="btn-flat red white-text">CREATE</button>
			</div>
			</form>
		</div>
	</div>