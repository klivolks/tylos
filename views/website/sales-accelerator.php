<section class="sales-accelerator">
	<div class="container">
		<div class="row">
			<div class="col l7 s12">
				<h2 class="white-text">Get Your Court Now</h2>
				<h2 class="white-text">REGISTER HERE</h1>
				<p class="white-text">Modern Academy with 4 imported wooden courts with approved Lightings. Proper accommodation facilities for Trainers and Players.</p>
			</div>
			<div class="col l5 s12">
				<div class="row sales-form-wrap">
					<form class="col s12 no-padding" action="/functions/add-member/" onSubmit="return validate_reg()" method="post">
					<?php
					$input = new input;
					$callbackURL = $input->get('callbackURL');
					if($callbackURL!=''){
						$callbackURL=$callbackURL.'&slot='.$input->get('slot');
						?>
						<input type="hidden" name="callbackURL" value="<?php echo $callbackURL ?>" id="callbackURL">
						<?php
					}
					?>
					<input type="hidden" name="klubstaId" id="klubstaId" value="0">
					<div class="input-field">
						<input type="text" name="FullName" id="FullName" class="validate" required>
						<label for="FullName">Full Name</label>
					</div>
					<div class="input-field">
						<input type="email" name="Email" id="Email" class="validate" required>
						<label for="Email">Email</label>
					</div>
					<div class="input-field">
						<input type="number" name="Phone" id="Phone" class="validate" required>
						<label for="Phone">Phone</label>
					</div>
					<div class="input-field">
						<input type="password" name="Password" id="Password" class="validate" required>
						<label for="Password">Password</label>
					</div>
					<div class="input-field">
						<input type="password" name="RetypePassword" id="RetypePassword" class="validate" required>
						<label for="RetypePassword">Retype Password</label>
					</div>
					<div class="msg red-text"></div>
					<div class="input-field" style="margin-top: -20px;">
						<button type="submit" class="theme-btn center">REGISTER NOW</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</section>