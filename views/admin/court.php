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
			<div class="col s8">
				<h5>Courts</h5>
			</div>
			<div class="col s4 right-align">
				<a href="/admin/new-court/" class="btn-flat green white-text">New Court</a>
			</div>
		</div>
</div>