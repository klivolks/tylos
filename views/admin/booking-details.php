<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>BOOKING DETAILS</h5>
			</div>
			
		</div>



<ul class="collapsible collapsible-accordian popout">
	<li class="active">
		<div class="collapsible-header active"><i class="material-icons">description</i> Member Details</div>
			<div class="collapsible-body">
			<?php 
			$booking_id = $_GET['booking_id'];
			$court_id = $_GET['court_id'];

			$db = new db;
			$data=$db->get('members','*',"where `id`='$booking_id '");
			$data1=$db->get('court_inventory','*',"where `court_id`='$court_id '");
			$data2=$db->get('courts','*',"where `id`='$court_id'");

			?>
				<div class="row">
					<div class="col s4">Name : </div><div class="col s8"><input class="input-field" type="text" name="name" value="<?php echo $data['result'][0][2];?>"></div>
					<div class="col s4">Gender : </div><div class="col s8"><input class="input-field" type="text" name="gender" value="<?php echo $data['result'][0][3]; ?>"></div>
					<div class="col s4">Email : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data['result'][0][4]; ?>"></div>
					<div class="col s4">Phone : </div><div class="col s8"><input class="input-field" type="text" name="phone" value="<?php echo $data['result'][0][6]; ?>"></div>
			
			</div>
		</div>
	</li>
</ul>
<ul class="collapsible collapsible-accordian popout">
  <li class="active">
	<div class="collapsible-header active"><i class="material-icons">description</i> Court Details</div>
		<div class="collapsible-body">
		  <div class="row">
				<div class="col s4">Court Id : </div><div class="col s8"><input class="input-field" type="text" name="court" value="<?php echo $court_id; ?>"></div>
				<div class="col s4">Court Name : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data2['result'][0][1]; ?>"></div>
				<div class="col s4">Tagline : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data2['result'][0][2]; ?>"></div>
				
				<div class="col s4">Date : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data1['result'][0][2]; ?>"></div>
				<div class="col s4">Time : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data1['result'][0][3]; ?>"></div>
				<div class="col s4">Price : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data1['result'][0][4]; ?>"></div>
				<div class="col s4">Status : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data1['result'][0][5]; ?>"></div>
				
				
		</div>
	 </div>
  </li>
</ul>
			