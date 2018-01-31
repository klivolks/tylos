<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>ROOM DETAILS</h5>
			</div>
			
		</div>



<ul class="collapsible collapsible-accordian popout">
	<li class="active">
		<div class="collapsible-header active"><i class="material-icons">description</i> Member Details</div>
			<div class="collapsible-body">
			<?php 
			$user_id=$_GET['user_id'];
			$room_id = $_GET['room_id'];
			

			$db = new db;
			$data=$db->get('members','*',"where `id`='$user_id '");
		
			$data2=$db->get('rooms','*',"where `id`='$room_id'");

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
	<div class="collapsible-header active"><i class="material-icons">description</i> Room Details</div>
		<div class="collapsible-body">
		  <div class="row">
				<div class="col s4">Room Id : </div><div class="col s8"><input class="input-field" type="text" name="court" value="<?php echo $room_id; ?>"></div>
				<div class="col s4">Room Name : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data2['result'][0][1]; ?>"></div>
				<div class="col s4">Room Type : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data2['result'][0][2]; ?>"></div>
				
				<div class="col s4">Rent : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data2['result'][0][3]; ?>"></div>
				<div class="col s4">Max_Occupancy : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data2['result'][0][6]; ?>"></div>
				<div class="col s4">Staus : </div><div class="col s8"><input class="input-field" type="email" name="email" value="<?php echo $data2['result'][0][7]; ?>"></div>
				
				
		</div>
	 </div>
  </li>
</ul>
			