<div class="col m8 l10 s12 content-body">
	<div class="row" style="margin-top: 20px;">
			<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='1'){
				?>
					<div class="card-panel green white-text">Court added successfully!!</div>
				<?php
			}
				else if($msg=='0'){
				?>
					<div class="card-panel red white-text">Some error occured!!</div>
				<?php
			}
		}
			
		?>
			<div class="col s12">
				<h5>New Court</h5>
			</div>
		</div>
		<div class="row" style="margin-top: 15px;">
			<form class="col l8 push-l2 s12">
				<div class="col s12 input-field">
					<input type="text" name="CourtName" id="CourtName" class="validate" required>
					<label for="CourtName">Court Name</label>
				</div>
				<div class="col s12 input-field">
					<input type="text" name="TagLine" id="TagLine" class="validate" required>
					<label for="TagLine">Tag Line</label>
				</div>
				<div class="col s12 input-field">
					<textarea name="Description" id="Description" class="materialize-textarea validate"></textarea>
					<label for="Description">Description</label>
				</div>
				<div class="col s12 file-field input-field">
					<div class="btn">
						<span>Featured Image</span>
						<input type="file" name="gallery_img">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
				</div>
				<input type="hidden" name="featureCount" id="featureCount" value="1">
				<div class="col s12 no-padding" id="features">
					<div class="col s12 no-padding">
						<div class="col s10 input-field">
							<input type="text" class="validate" name="Feature1" id="Feature1">
							<label for="Feature1">Feature 1</label>
						</div>
						<div class="col s2 input-field">
							<button type="button" class="btn red white-text waves-effect" onClick="addFeatureRow()"><i class="material-icons">add_box</i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
</div>