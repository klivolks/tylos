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
				<h5>ALL MEMBERS</h5>
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
							Name
						</th>
						<th>
							Gender
						</th>
						<th>
							Email
						</th>
						<th>
							Phone
						</th>
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('members','*',"");
						$i=1;
						foreach($data['result'] as $key => $rw){
							$member_type=$rw['member_type'];
							
							
							
						if($member_type==1){
							$type="Social Media";
						}
						else
						{
							$type="Registered Directly";
						}
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rw['full_name']; ?></td>
							<td><?php echo $rw['gender']; ?></td>
							<td><?php echo $rw['email'] ?></td>
							<td><?php echo $rw['phone_no'] ?></td>
							
						</tr>
						<?php $i++; } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>