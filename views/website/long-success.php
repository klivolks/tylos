<?php $invoice_id = $_SESSION['invoice']; $db = new db; $data = $db->get('invoice','booking_no',"WHERE `id` = '$invoice_id'"); ?>
<section class="white login">
	<div class="container">
		<div class="row">
			<div class="grey lighten-3 col l6 push-l3 s12 login-box">
				<div class="col s12 center-align" style="margin-top: 30px;">
					<img src="/img/success_icon.png" class="responsive-img">
				</div>
				<div class="col s12 center-align" style="margin-bottom: 30px; margin-top: 30px;">
					<hr />
					<h5 style="margin-top: -15px;"><span class="grey lighten-3"> &nbsp; &nbsp; Booking Successful &nbsp; &nbsp; </span></h5>
				</div>
				<div class="col s12 center-align" style="margin-bottom: 25px;">
					Your reservation was confirmed successfully. Our representative will contact you back.
				</div>
				<div class="col s12 center-align" style="margin-bottom: 25px;">
					Booking ID : <a href="/booking/details/<?php echo $data['result'][0][0]; ?>/"><strong><?php echo $data['result'][0][0]; ?></strong></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="grey lighten-2 col l6 push-l3 s12 login-box">
				<a href="/account/"><i class="material-icons">account_circle</i> <span>My Account</span></a> <a href="/functions/cancel/<?php echo $data['result'][0][0]; ?>/" class="right"><i class="material-icons">block</i> <span>Cancel my booking</span></a>
			</div>
		</div>
	</div>
</section>