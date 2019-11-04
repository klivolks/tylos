<div class="col m8 l10 s12 content-body">
    <div class="row" style="margin-top: 20px;">
        <?php
    if(isset($_REQUEST['msg'])){
      $msg=$_REQUEST['msg'];
      if($msg=='1'){
        ?>
          <div class="card-panel green white-text">Courses Edited successfully!!</div>
        <?php
      }
      
        
    }
      
    ?>
      <div class="col s8">
        <h5>ALL COURSES</h5>
      </div>
      
    </div>
    <div class="row">
      <div class="col s12">
        <table class="striped responsive-table">
          <thead>
            <th>
              #
            </th>
            <th>
            Name
            </th>
          
            <th>
              Image
            </th>
             <th>
            Venue
            </th>
          
            <th>
              Course Starting
            </th>
             <th>
            Course Ending
            </th>
            <th>
            Description
            </th>
          </thead>
          <tbody>
          <?php
            $db = new db;
            $data = $db->get('events','*',"");
            $i=1;
            foreach($data['result'] as $key => $rw){
              $id=$rw['id'];
          ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $rw['event_name']; ?></td>
              <td><img src="/img/events/<?php echo $rw['featured_img'] ?>" class="responsive-img" hight="50px" width="50px"></td>
              <td><?php echo $rw['venue']; ?></td>
              <td><?php echo $rw['event_starting']; ?></td>
              
              <td><?php echo $rw['event_ending']; ?></td>
              <td><?php echo $rw['description']; ?></td>
              <td>
                 <a <?php echo  'href="/admin/add/event-delete/?id='.$id.'"' ?>  class="btn-floating red" ><i class="material-icons" onClick="confirm_btn()">delete</i></a>
              </td>
              <td>
                
               <a <?php echo  'href="/admin/event-edit/?id='.$id.'"' ?> class="btn-floating yellow darken-4" ><i class="material-icons">edit</i></a>
              </td>
            </tr>
            <?php $i++; } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
	function confirm_btn(){
		if(window.confirm('You really want to delete?') == true){ 
			//window.location.assign('/functions/cancel/<?php echo $data['result'][0][0]; ?>/');
		}
		else{
			event.preventDefault(); 
		}
	}
</script>