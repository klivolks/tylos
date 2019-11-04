<section class="login white">
	<div class="container">
		<div class="row">
			<div class="grey lighten-2 col l6 push-l3 s12 login-box">
				<h5>Step 2 : Choose payment method</h5>
			</div>
			
		</div>
		<div class="row">
			<div class="grey lighten-3 col l6 push-l3 s12 login-box">
				<form method="post" action="/functions/payment/" class="row">
					<div class="col s12 input-field" style="margin-bottom: 30px;">
						<p>
							<input class="with-gap" name="payment_method" type="radio" id="pay-at-court" value="1" checked />
							<label for="pay-at-court">Pay At Office</label>
						</p>
					</div>
					<div class="col s12 input-field">
						<button type="submit" class="theme-btn full-width"><span>PAY NOW</span> <i class="material-icons">arrow_right</i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>