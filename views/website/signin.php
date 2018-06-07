<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-3 col l6 push-l3 s12 login-box">
				<!--<p><button type="button" onClick="Klubstasignin()" class="theme-btn full-width">SignIn with Social Media</button></p>
				<p class="center-align"><strong>OR</strong></p>-->
				<h5 class="center-align">Sign In Now</h5>
				<form class="col s12 no-padding" action="/functions/signin/" method="post">
					<?php
					$input = new input;
					$callbackURL = $input->get('callbackURL');
					if($callbackURL!=''){
						$callbackURL.='&slot='.$input->get('slot');
						?>
						<input type="hidden" name="callbackURL" value="<?php echo $callbackURL ?>" id="callbackURL">
						<?php
					}
					?>
					<div class="input-field">
						<input type="email" name="Email" id="Email" class="validate" autocomplete="off" required>
						<label for="Email">Email</label>
					</div>
					<div class="input-field">
						<input type="password" name="Password" id="Password" autocomplete="off" class="validate" required>
						<label for="Password">Password</label>
					</div>
					<div class="input-field">
						<a href="#" style="top: 0;">Forgot Password ?</a><button type="submit" class="theme-btn right">SIGN IN</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-2 col l6 push-l3 s12 login-box center-align">
				Not Yet Registered? <a href="/register/">Register</a>.
			</div>
		</div>
	</div>
</section>