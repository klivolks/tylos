<div class="col m8 l10 s12 content-body">
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>ALL NEWS</h5>
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
						Title
						</th>
					
						<th>
							image
						</th>
						
					</thead>
					<tbody>
					<?php
						$db = new db;
						$data = $db->get('news','*',"");
						$i=1;
						foreach($data['result'] as $key => $rw){
							
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rw['title']; ?></td>
							
							<td><img src="/img/news/<?php echo $rw['featured_img'] ?>" class="responsive-img" hight="50px" width="50px"></td>
							
							
						</tr>
						<?php $i++; } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>