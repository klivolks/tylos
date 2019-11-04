<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			
			
		</div>
<ul class="collapsible collapsible-accordian popout">
	<li class="active">
		<div class="collapsible-header active"><i class="material-icons">edit</i> Edit Events</div>
			<div class="collapsible-body">
			<?php 
			$id=$_GET['id'];
			$db = new db;
			$data=$db->get('events','*',"where `id`='$id'");
		
			?>
			<form method="post" action="/admin/add/event-edit/" enctype="multipart/form-data">
				<div class="row">
					<div class="col s4">Name: </div><div class="col s8"><input class="input-field" type="text" name="name" value="<?php echo $data['result'][0][1];?>"></div>
					<div class="col s4">Venue : </div><div class="col s8"><input class="input-field" type="text" name="venue" value="<?php echo $data['result'][0][3]; ?>"></div>
					<div class="col s4">Event Starting : </div><div class="col s8"><input class="input-field" type="text" name="starting" value="<?php echo $data['result'][0][4]; ?>"></div>
					<div class="col s4">Event Ending : </div><div class="col s8"><input class="input-field" type="text" name="ending" value="<?php echo $data['result'][0][5]; ?>"></div>
					<div class="col s4">Descripton : </div><div class="col s8"><input class="input-field" type="text" name="descripton" value="<?php echo $data['result'][0][6]; ?>"></div>
					<div class="col s4">Seats : </div><div class="col s8"><input class="input-field" type="text" name="seats" value="<?php echo $data['result'][0][7]; ?>"></div>
					<div class="col s4">Rate : </div><div class="col s8"><input class="input-field" type="text" name="rate" value="<?php echo $data['result'][0][8]; ?>"></div>
					<div class="col s4"></div>
					<div class="col s8">
					<input class="input-field" type="hidden" name="id" value="<?php echo $data['result'][0][0]; ?>"></div>
					<div class="col s4"></div><div class="col s8"><button type="submit" class="btn-flat red white-text">Save</button>
					</div>
					</div>
					</form>
			</div>
			</div>

		</div>
	</li>
</ul>