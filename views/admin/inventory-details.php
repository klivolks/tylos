<div class="col m8 l10 s12 content-body">
<?php
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='1'){
				?>
					<div class="card-panel green white-text">Your inventory is Added successfully!!</div>
				<?php
			}
				else if($msg=='0'){
				?>
					<div class="card-panel red white-text">Please check for error in input!!</div>
				<?php
			}
		}
		 $court_id = $_GET['court_id'];
	   $day=$_GET['day'];
     $month=$_GET['month'];
     $year=$_GET['year'];
     $date=$day."-".$month."-".$year;
     //echo $date;
		?>
  <div class="row" style="margin-top: 20px;">
    
<div class="row">
    <form class="col s12" method="post" action="" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <div class = "row">
            <label>Select Time</label>
<select>
         <option value = "21">8 AM</optio>
         <option value = "21">9 AM</option>
         <option value = "22">10 AM</option>
         <option value = "23">11 AM</option>
         <option value = "12">12 PM</option>
         <option value = "13">1 PM</option>
         <option value = "14">2 PM</option>
         <option value = "15">3 PM</option>
         <option value = "16">4 PM</option>
         <option value = "17">5 PM</option>
         <option value = "18">6 PM</option>
         <option value = "19">7 PM</option>
         <option value = "20">8 PM</option>
         <option value = "21">9 PM</option>
         <option value = "22">10 PM</option>
         <option value = "23">11 PM</option>
 </select>               
 </div>
</div>
<div class="row">
    <div class="input-field col s12">
          <input type="text"  id="title" value="<?php echo $date; ?>"  name="title"  class="validate">
          <label for="title">Date</label>
     </div>
</div>
</div>
	 <div class="col s12">
      <button type="submit" class="btn-flat red white-text">Submit</button>
    </div>			                             
</div>
</div>
