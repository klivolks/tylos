<?php $db = new db; $input =  new input; $search_term = $input->post('search'); ?>
<section class="search-term white">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<small>Result for searching : </small> &ldquo; <?php echo $search_term; ?> &rdquo;
			</div>
		</div>
	</div>
</section>
<section class="search-result grey lighten-2">
	<div class="container">
		<div class="row">
			<div class="col s12">
				
			</div>
		</div>
	</div>
</section>