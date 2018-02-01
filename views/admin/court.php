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
		<div class="row" style="margin-top:20px;">
			<div class="col s12 white" style="padding: 15px !important;">
				<?php
					$db = new db;
					$data = $db->get('courts','*',"WHERE status = 1 ORDER BY `id` DESC");
					$i = 0;
					foreach($data['result'] as $key => $rw):
					$i++;
					$court_id=$rw['id'];
					if($i==1){
						echo '<div class="col s12 no-padding">';
					}
				?>
					<div class="col l3 m6 s12" style="position: relative; margin-bottom: 15px;">
						<div class="fixed-action-btn horizontal" style="position: absolute; right: -10px; top: -10px;">
							<a class="btn-floating btn-large red">
							  <i class="large material-icons">menu</i>
							</a>
							<ul>
							  <li><a class="btn-floating red"><i class="material-icons">delete</i></a></li>
							  <li><a class="btn-floating yellow darken-4" ><i class="material-icons">edit</i></a></li>
							  <li><a class="btn-floating blue darken-1"  <?php echo' href="/admin/inventory/?court_id='.$court_id.'"'?>><i class="material-icons">remove_red_eye</i></a></li>
							</ul>
						  </div>
						<img src="/img/courts/<?php echo $rw['featured_img'] ?>" class="responsive-img"><br>
						<p class="center-align"><strong><?php echo $rw['court_name'] ?></strong></p>
					</div>
				<?php
				
				if($i==4){ echo '</div>'; $i=0; }
			endforeach;
			if($i!=0){
				echo '</div>';
			}
		?>
			</div>
		</div>
</div>