<?php $post = $sub_page;
$db = new db;
$input = new input;
$url = urlencode($input->url());
$data = $db->get('news','featured_img,title,content,created_at',"WHERE `id` = '$post'");
$result = (object)$data['result'][0];
?>
<section class="white court-common">
	<div class="container">
		<div class="row">
			<div class="col l8 s12 blog-content">
				<h1><?php echo $result->title; ?><br><small>Posted on <?php echo date("d M,Y",strtotime($result->created_at)); ?></small></h1>
				<?php if($result->featured_img!=''||$result->featured_img!=NULL){ ?>
				<img src="/img/news/<?php echo $result->featured_img; ?>" class="left responsive-img" style="padding: 0px 15px 15px 0px;">
				<?php }
					echo $result->content;
				?>
			</div>
			<div class="col l4 hide-on-med-and-down">
				<h6 style="margin:15px !important; text-align:center;"><strong>Latest Posts</strong></h6>
				<div class="col s12 card white">
					<?php
					$db = new db;
					$data = $db->get('news','title,featured_img,created_at,`id`',"WHERE status = 1 ORDER BY `id` DESC LIMIT 0,5");
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
				<div class="fb-page" data-href="https://www.facebook.com/TYLOS-Academy-387548051664078/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TYLOS-Academy-387548051664078/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TYLOS-Academy-387548051664078/">TYLOS Academy</a></blockquote></div>
			</div>
		</div>
	</div>
</section>
<section class="court-common grey lighten-3">
	<div class="container">
		<div class="row">
			<div class="col s12">
				Share Now : <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-share-button" data-href="<?php echo $input->url(); ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
				<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share"></script>
				<script async defer src="//assets.pinterest.com/js/pinit.js"></script><a data-pin-do="buttonBookmark" href="https://www.pinterest.com/pin/create/button/"></a>
			</div>
		</div>
	</div>
</section>