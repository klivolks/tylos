<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-3 col l6 push-l3 s12 login-box">
				<p><button type="button" onClick="socialMediaLogin()" class="theme-btn full-width">Register with Social Media</button></p>
				<p class="center-align"><strong>OR</strong></p>
				<h5 class="center-align">Register Now</h5>
				<form class="col s12 no-padding" action="/functions/add-member/" method="post">
					<input type="hidden" name="klubstaId" id="klubstaId" value="0">
					<div class="input-field">
						<input type="text" name="FullName" id="FullName" class="validate" required>
						<label for="FullName">Full Name</label>
					</div>
					<div class="input-field">
						<select id="Gender" name="Gender">
							<option value="" disabled selected>Choose your option</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="transgender">Transgender</option>
						</select>
						<label>Gender</label>
					</div>
					<div class="input-field">
						<input type="email" name="Email" id="Email" class="validate" required>
						<label for="Email">Email</label>
					</div>
					<div class="input-field">
						<input type="text" name="Phone" id="Phone" class="validate" required>
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
					<div class="input-field">
						<button type="submit" class="theme-btn center">REGISTER NOW</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-2 col l6 push-l3 s12 login-box center-align">
				Already registered? <a href="/signin/">Sign In</a>.
			</div>
		</div>
	</div>
</section>