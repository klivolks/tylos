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
				<h5></h5>
			</div>
			
		</div>
<div class="row">
    <form class="col s12" method="post" action="/admin/add/rooms/" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text"  name="name" class="validate">
          <label for="first_name">Name</label>
          <a class="waves-effect waves-light btn-large">Button</a>
        </div>
        <div class="row">
        <div class="input-field col s12">
         <label >Select Court</label>
          <input name="type" type="text" class="validate">
          <a class="waves-effect waves-light btn-large">Button</a>
        </div>
      
        </div>
      </div>
    </form>
  </div>