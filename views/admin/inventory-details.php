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
	 $court_id =$_GET['court_id'];
	 $day=$_GET['day'];
     $month=$_GET['month'];
     $year=$_GET['year'];
     $date=date('d M Y',strtotime($day."-".$month."-".$year));
     //echo $date;
		?>
  <div class="row" style="margin-top: 20px;">
    
<div class="row">
    <form class="col s12" method="post" action="/admin/add/inventory-add/"  enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
	       <select name="time">
             <option value = "08:00">8 AM</optio>
             <option value = "09:00">9 AM</option>
             <option value = "10:00">10 AM</option>
             <option value = "11:00">11 AM</option>
             <option value = "12:00">12 PM</option>
             <option value = "13:00">1 PM</option>
             <option value = "14:00">2 PM</option>
             <option value = "15:00">3 PM</option>
             <option value = "16:00">4 PM</option>
             <option value = "17:00">5 PM</option>
             <option value = "18:00">6 PM</option>
             <option value = "19:00">7 PM</option>
             <option value = "20:00">8 PM</option>
             <option value = "21:00">9 PM</option>
             <option value = "22:00">10 PM</option>
             <option value = "23:00">11 PM</option>
        </select> 
             <label>Select Time</label>        
        </div>
          <div class="input-field col s12">
          <input type="text"  id="title" value = "<?php echo $date; ?>"  name="date"   class="validate">
          <label for="title">Date</label>
        </div>
          <div class="input-field col s12">
          <input type="hidden"   value = "<?php echo $court_id; ?>"  name="court_id"   class="validate">
        <div class="input-field col s12">
          <input type="text"  id="title" value = ""  name="price"   class="validate">
          <label for="title">Price</label>
        </div>
        </div>
         <div class="col s12 input-field">
            <button type="submit" class="btn-flat red white-text">Submit</button>
        </div>
</form>			                             
</div>
</div>
