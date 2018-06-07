<section class="white login">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center-align">BLOG<br /><small>Latest from TYLOS</small></h1>
			</div>
			<?php
			$db = new db;
			$data = $db->get('news','`id`,`featured_img`,`title`,`content`',"WHERE `status` = '1' ORDER BY id DESC");
			$i=0;
			if(isset($data['result'])){
				foreach($data['result'] as $key => $rw){
					$slug = strtolower($rw[2]);
					$slug = preg_replace('#[ -]+#', '-', $slug);
					if($i==0){
						$i++;
						?>
							<div class="col s12">
						<?php
					}
					?>
						<div class="col l4 s12" style="margin-bottom: 20px;">
							<a href="/blog/<?php echo $rw[0]; ?>/<?php echo $slug; ?>"><div class="post-item grey-text">
								<img src="/img/news/<?php echo $rw[1] ?>">
								<p><strong class="grey-text text-darken-4"><?php echo $rw[2]; ?></strong></p>
								<?php echo substr($rw[3],0,200).'...'; ?><br><br>
								<span>Read more</span>
							</div></a>
						</div>
					<?php
					if($i==3){
						$i=0;
						echo '</div>';
					}
				}
				if($i!=0){
					echo '</div>';
				}
			}
			?>
		</div>
	</div>
</section>