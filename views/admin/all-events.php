<div class="col m8 l10 s12 content-body">
    <div class="row" style="margin-top: 20px;">
        <?php
    if(isset($_REQUEST['msg'])){
      $msg=$_REQUEST['msg'];
      if($msg=='1'){
        ?>
          <div class="card-panel green white-text">Events Edited successfully!!</div>
        <?php
      }
      
        
    }
      
    ?>
      <div class="col s8">
        <h5>ALL EVENTS</h5>
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
              Event Starting
            </th>
             <th>
            Event Ending
            </th>
            <th>
            Description
            </th>
            <th>
            Seats
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
              <td><?php echo $rw['seats']; ?></td>
              <td>
                 <a <?php echo  'href="/admin/add/event-delete/?id='.$id.'"' ?>  class="btn-floating red" ><i class="material-icons">delete</i></a>
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