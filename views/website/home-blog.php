<?php
$db = new db;
$data1 = $db->get('news','COUNT(*)',"WHERE 1");
if($data1['result'][0][0]>0){
?>
<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col s12 center-align">
				<h1>Our Blog<br><small>Latest news from our courts</small></h1>
			</div>
			<div class="col s12 no-padding">
				<?php
					$data = $db->get('news','title,featured_img,created_at,`id`',"WHERE status = 1 ORDER BY `id` DESC LIMIT 0,2");
					if(isset($data['result'])){
						foreach($data['result'] as $key => $rw){
							$slug = strtolower($rw[0]);
					$slug = preg_replace('#[ -]+#', '-', $slug);
				?>
				<div class="col l4 s12 blog-item">
					<div class="col s12 no-padding"><img src="/img/news/<?php echo $rw[1]; ?>" class="responsive-img"></div>
					<div class="col s12 no-padding"><div class="col s6 no-padding"><small><?php echo date('d M Y',strtotime($rw[2])); ?></small></div><div class="col s6 no-padding" style="text-align: right !important;"><small>Tylos Admin</small></div></div>
					<div class="col s12 no-padding"><strong><?php echo $rw[0]; ?></strong></div>
					<a href="/blog/<?php echo $rw[3]; ?>/<?php echo $slug; ?>/"><div class="col s12 no-padding read-more">Read More</div></a>
				</div>
				<?php
						}
					}
				?>
				<div class="col l4 s12">
					<div class="col s12 card white">
					<?php
					$db = new db;
					$data = $db->get('news','title,featured_img,created_at,`id`',"WHERE status = 1 ORDER BY `id` DESC LIMIT 2,2");
					if(isset($data['result'])){
						foreach($data['result'] as $key => $rw){
							$slug = strtolower($rw[0]);
					$slug = preg_replace('#[ -]+#', '-', $slug);
				?>
						<a href="/blog/<?php echo $rw[3]; ?>/<?php echo $slug; ?>/"><div class="col s12 blog-right-item">
							<strong><?php echo $rw[0]; ?></strong><br>
							<small>By Tylos Admin, <?php echo date('d M Y',strtotime($rw[2])); ?></small>
							</div></a><a>
							<?php
						}
					}
				?>
						<a href="/blog/">
						<div class="col s12 read-more" style="padding: 30px !important;">
							View All
							</div></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}
?>