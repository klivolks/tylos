<div class="col m8 l10 s12 content-body">
    <div class="row" style="margin-top: 20px;">
      
      <div class="col s8">
        <h5>ALL ROOMS</h5>
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
              Type
            </th>
             <th>
            Rent
            </th>
          
            <th>
              Image
            </th>
             <th>
            Occupancy
            </th>
          
            <th>
            Description
              
            </th>
          </thead>
          <tbody>
          <?php
            $db = new db;
            $data = $db->get('rooms','*',"");
            $i=1;
            foreach($data['result'] as $key => $rw){
              
          ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $rw['room_name']; ?></td>
              <td><?php echo $rw['room_type']; ?></td>
              <td><?php echo $rw['rent']; ?></td>
              <td><img src="/img/rooms/<?php echo $rw['featured_img'] ?>" class="responsive-img" hight="50px" width="50px"></td>
              <td><?php echo $rw['max_occupancy']; ?></td>
              <td><?php echo $rw['description']; ?></td>
              
            </tr>
            <?php $i++; } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>