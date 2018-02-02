<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			
			
		</div>
<ul class="collapsible collapsible-accordian popout">
	<li class="active">
		<div class="collapsible-header active"><i class="material-icons">edit</i> Edit Court</div>
			<div class="collapsible-body">
			<?php 
			$id=$_GET['id'];
			$db = new db;
			$data=$db->get('courts','*',"where `id`='$id'");
		
			?>
			<form method="post" action="/admin/add/edit/" enctype="multipart/form-data">
				<div class="row">
					<div class="col s4">Name : </div><div class="col s8"><input class="input-field" type="text" name="name" value="<?php echo $data['result'][0][1];?>"></div>
					<div class="col s4">Tag Line : </div><div class="col s8"><input class="input-field" type="text" name="tagline" value="<?php echo $data['result'][0][2]; ?>"></div>
					<div class="col s4">Description : </div><div class="col s8"><input class="input-field" type="text" name="description" value="<?php echo $data['result'][0][3]; ?>">
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