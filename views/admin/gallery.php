<div class="col m8 l10 s12 content-body">
	<div class="row" style="margin-top: 20px;">
			<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='1'){
				?>
					<div class="card-panel green white-text">Imaged uploaded successfully.</div>
				<?php
			}
				else if($msg=='0'){
				?>
					<div class="card-panel red white-text">Image was not uploaded.</div>
				<?php
			}
		}
			
		?>
			<div class="col s8">
				<h5>GALLERY</h5>
			</div>
			<div class="col s4 right-align">
			</div>
		</div>
	<form class="row" action="/admin/add/gallery/" method="post" enctype="multipart/form-data">
		<div class="col s8" style="margin-bottom: 30px;">
			<div class="file-field input-field">
				<div class="btn">
					<span>File</span>
					<input type="file" name="gallery_img">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text">
				</div>
			</div>
		</div>
		<div class="col s4">
			<button type="submit" class="btn btn-block green darken-2 white-text">UPLOAD</button>
		</div>
	</form>
	<div class="col s12 card white">
		<?php
			$db = new db;
			$data = $db->get('gallery','*',"WHERE status = 1 ORDER BY `id` DESC");
			$i = 0;
			foreach($data['result'] as $key => $rw):
			$i++;
			if($i==1){
				echo '<div class="col s12 no-padding">';
			}
		?>
			<div class="col l3 s12" style="position: relative;">
				<img src="/img/gallery/<?php echo $rw['image'] ?>" class="responsive-img gallery-img">
				<a href="#" class="btn-floating right red" style="position: absolute; top: 0; right: 0;"><i class="material-icons">close</i></a>
			</div>
			<?php
				
				if($i==4){ echo '</div>'; $i=0; }
			?>
		<?php
			endforeach;
			if($i!=0){
				echo '</div>';
			}
		?>
	</div>
</div>