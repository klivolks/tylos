<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea",
        forced_root_block : "", 
    	force_br_newlines : true,
    	force_p_newlines : false,
    });
</script>
<div class="col m8 l10 s12 content-body">
<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='1'){
				?>
					<div class="card-panel green white-text">Your news created successfully!!</div>
				<?php
			}
				else if($msg=='0'){
				?>
					<div class="card-panel red white-text">Please check for error in input!!</div>
				<?php
			}
		}
			
		?>
		<div class="row" style="margin-top: 20px;">
		<div class="row">
			<div class="col s8">
				<h5>ADD NEWS</h5>
			</div>
<form method="post" action="/admin/add/news/" enctype="multipart/form-data">
<div class="row">
    <form class="col s12">
      <div class="row">
    <div class="input-field col s12">
          <input type="text"  id="title"  name="title"  class="validate">
          <label for="title">Title</label>
     </div>
    <div class="row">
   	  <div class="input-field col s12">
          <textarea id="textarea1" name="content" class="materialize-textarea"></textarea>
        
      </div>
    </div>

      <div class="row">
   	 <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="news_image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
     </div> 
    </div>
  </div>
 <div class="row">
       	<div class="col s12">
			<button type="submit" class="btn-flat red white-text">Submit</button>
		</div>
      </div>
 </div>
 </form>
 </div>
   </form>   
  </div>
        