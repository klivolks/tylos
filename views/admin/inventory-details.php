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
	$db_date = date('Y-m-d',strtotime($day."-".$month."-".$year));
     $date=date('d M Y',strtotime($day."-".$month."-".$year));
     //echo $date;
		?>
  <div class="row" style="margin-top: 20px; margin-bottom: 20px">
  	<div class="col s12">
  		<h2>Update Court Price</h2>
  	</div>
  </div>
    
   <div class="col l6 s12">
    <form class="row" method="post" action="/admin/add/inventory-add/"  enctype="multipart/form-data">
        <div class="input-field col s12">
	       <select name="time">
            <option value = "00:00">12:00 AM</option>
             <option value = "00:30">12:30 AM</option>
             <option value = "01:00">1:00 AM</option>
             <option value = "01:30">1:30 AM</option>
             <option value = "02:00">2:00 AM</option>
             <option value = "02:30">2:30 AM</option>
             <option value = "03:00">3:00 AM</option>
             <option value = "03:30">3:30 AM</option>
             <option value = "04:00">4:00 AM</option>
             <option value = "04:30">4:30 AM</option>
             <option value = "05:00">5:00 AM</option>
             <option value = "05:30">5:30 AM</option>
             <option value = "06:00">6:00 AM</option>
             <option value = "06:30">6:30 AM</option>
             <option value = "07:00">7:00 AM</option>
             <option value = "07:30">7:30 AM</option>
             <option value = "08:00">8:00 AM</option>
             <option value = "08:30">8:30 AM</option>
             <option value = "09:00">9:00 AM</option>
             <option value = "09:30">9:30 AM</option>
             <option value = "10:00">10:00 AM</option>
             <option value = "10:30">10:30 AM</option>
             <option value = "11:00">11:00 AM</option>
             <option value = "11:30">11:30 AM</option>
             <option value = "12:00">12:00 PM</option>
             <option value = "12:30">12:30 PM</option>
             <option value = "13:00">1:00 PM</option>
             <option value = "13:30">1:30 PM</option>
             <option value = "14:00">2:00 PM</option>
             <option value = "14:30">2:30 PM</option>
             <option value = "15:00">3:00 PM</option>
             <option value = "15:30">3:30 PM</option>
             <option value = "16:00">4:00 PM</option>
             <option value = "16:30">4:30 PM</option>
             <option value = "17:00">5:00 PM</option>
             <option value = "17:30">5:30 PM</option>
             <option value = "18:00">6:00 PM</option>
             <option value = "18:30">6:30 PM</option>
             <option value = "19:00">7:00 PM</option>
             <option value = "19:30">7:30 PM</option>
             <option value = "20:00">8:00 PM</option>
             <option value = "20:30">8:30 PM</option>
             <option value = "21:00">9:00 PM</option>
             <option value = "21:30">9:30 PM</option>
             <option value = "22:00">10:00 PM</option>
             <option value = "22:30">10:30 PM</option>
             <option value = "23:00">11:00 PM</option>
             <option value = "23:30">11:30 PM</option>
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
<div class="col l6 s12">
	<h4>Current Price list</h4>
		<table class="striped">
			<thead>
				<th>
					Time
				</th>
				<th>
					Price
				</th>
			</thead>
			<tbody>
				<?php
				$db = new db;
				$slots= $db->get('court_inventory','time,price',"WHERE `date`='$db_date' AND `court_id` = '$court_id'");
				foreach($slots['result'] as $slot){
				?>
				<tr>
					<td>
						<?php echo date("h:i a",strtotime($slot[0])); ?>
					</td>
					<td>
						<?php echo $slot[1]; ?>
					</td>
				</tr>
				<?php
				}
					?>
			</tbody>
		</table>
		</div>		
