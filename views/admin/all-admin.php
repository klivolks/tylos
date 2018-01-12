<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='1'){
				?>
					<div class="card-panel green white-text">User unblocked successfully!!</div>
				<?php
			}
				else if($msg=='0'){
				?>
					<div class="card-panel red white-text">User was blocked successfully!!</div>
				<?php
			}
		}
			
		?>
			<div class="col s8">
				<h5>ALL ADMINS</h5>
			</div>
			<div class="col s4 right-align">
				<a href="/admin/new" class="btn-flat green white-text">New Admin</a>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<table class="striped responsive-table">
					<thead>
						<th>
							#
						</th>
						<th>
							UserName
						</th>
						<th>
							Email
						</th>
						<th>
							Phone
						</th>
						<th>
							
						</th>
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('users','*',"");
						$i=1;
						foreach($data['result'] as $key => $rw){
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rw['UserName']; ?></td>
							<td><?php echo $rw['Email']; ?></td>
							<td><?php echo $rw['Phone'] ?></td>
							<td><?php if($_SESSION['logged_admin']!=$rw['id']){ if($rw['Status']==1){?><a href="/admin/deactivate/<?php echo $rw['id'] ?>" class="btn-flat red white-text tooltipped"  data-position="bottom" data-delay="50" data-tooltip="Block"><i class="material-icons">block</i></a><?php }else{ ?> <a href="/admin/activate/<?php echo $rw['id'] ?>" class="btn-flat green white-text tooltipped"  data-position="bottom" data-delay="50" data-tooltip="UnBlock"><i class="material-icons">block</i></a><?php } } ?></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>