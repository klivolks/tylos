<div class="col m8 l10 s12 content-body">
<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='1'){
				?>
					<div class="card-panel green white-text">Your room created successfully!!</div>
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
			
			<div class="col s8">
				<h5>ADD ROOMS</h5>
			</div>
			
		</div>
<div class="row">
    <form class="col s12" method="post" action="/admin/add/rooms/" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text" class="validate">
          <label for="first_name">Name</label>
        </div>
        <div class="row">
        <div class="input-field col s12">
         <label >Type</label>
          <input id="type" type="text" class="validate">
         
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <label >Rent</label>
          <input id="rent" type="text" class="validate">
         
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
         <div class="row">
        <div class="input-field col s12">
         <label >Description</label>
          <input id="description" type="text" class="validate">
         
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <label >Max Occupancy</label>
          <input id="occupancy" type="text" class="validate">
         
        </div>
      </div>
       <div class="row">
       	<div class="col s12">
			<button type="submit" class="btn-flat red white-text">Submit</button>
		</div>
      </div>    
        </div>
      </div>
    </form>
  </div>