<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea",
        forced_root_block : "", 
    	force_br_newlines : true,
    	force_p_newlines : false,
    });
</script>
	<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			
			
		</div>
<ul class="collapsible collapsible-accordian popout">
	<li class="active">
		<div class="collapsible-header active"><i class="material-icons">edit</i> Edit News</div>
			<div class="collapsible-body">
			<?php 
			$id=$_GET['id'];
			$db = new db;
			$data=$db->get('news','*',"where `id`='$id'");
		
			?>
			<form method="post" action="/admin/add/news-edit/" enctype="multipart/form-data">
				<div class="row">
					<div class="col s4">Title: </div><div class="col s8"><input class="input-field" type="text" name="name" value="<?php echo $data['result'][0][2];?>"></div>
					<div class="col s4">Content : </div><div class="col s8"><textarea name="content" rows="20"><?php echo $data['result'][0][4]; ?></textarea></div>
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