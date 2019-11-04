
<div class="col m8 l10 s12 content-body">
<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='1'){
				?>
					<div class="card-panel green white-text">Your course created successfully!!</div>
				<?php
			}
				else if($msg=='0'){
				?>
					<div class="card-panel red white-text">Please check for error in input!!</div>
				<?php
			}
		}
			
		?>
    <script type="text/javascript">
      $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
    </script>
		<div class="row" style="margin-top: 20px;">
			
			<div class="col s8">
				<h5>ADD EVENTS</h5>
			</div>
			
		</div>
<div class="row">
    <form class="col s12" method="post" action="/admin/add/events/" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text"  name="name" class="validate" required>
          <label for="first_name">Name</label>
        </div>
      </div>
    <div class="row">
     <div class="file-field input-field">
      <div class="btn">
        <span>Image</span>
        <input type="file" name="event_image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
     </div> 
        <div class="row">
        <div class="input-field col s12">
         <label >Venue</label>
          <input name="venue" type="text" class="validate">
         
        </div>
      </div>
     
      <div class = "row">
          <div class = "row">  
            <div class="datepicker-field col s12">             
               <label>Course Starting</label>              
               <input type = "date" name="starting" class = "datepicker" required />    
            </div>            
            </div> 
      </div>
      
         <div class = "row">
           <div class="datepicker-field col s12"> 
            <div class = "row">               
               <label>Course Ending</label>              
               <input type = "date" name="ending" class = "datepicker" required />    
            </div>
          </div>            
            
      </div>
      <div class="row">
        <div class="input-field col s12">
         <label >Description</label>
          <input name="description" type="text" class="validate">
         
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <label >Seat</label>
          <input name="seats" type="number" class="validate" required>
         
        </div>
       </div> 
       <div class="row">
        <div class="input-field col s12">
         <label >Fees</label>
          <input name="ticket" type="number" class="validate" required>
         
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