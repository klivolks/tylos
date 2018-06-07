<div class="col m8 l10 s12 content-body">
	<div class="row">
    <div class="col s12 m4">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Total Court Bookings</span>
          <?php
			$db = new db;
			$data = $db->get("court_booking","COUNT(*)","WHERE status = '1'");
			?>
       <h1><?php echo $data['result'][0][0]; ?> slots</h1>
        </div>
        <div class="card-action">
          <a href="/admin/all-booking/">All booking</a>
          <a href="/admin/court/">Court Management</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4">
      <div class="card purple darken-4">
        <div class="card-content white-text">
          <span class="card-title">Total Bulk Bookings</span>
          <?php
			$db = new db;
			$data = $db->get("court_long_booking","COUNT(*)","WHERE status = '1'");
			?>
       <h1><?php echo $data['result'][0][0]; ?> times</h1>
        </div>
        <div class="card-action">
          <a href="/admin/all-booking/">All booking</a>
          <a href="/admin/court/">Court Management</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4">
      <div class="card pink darken-1">
        <div class="card-content white-text">
          <span class="card-title">Total Room Bookings</span>
          <?php
			$db = new db;
			$data = $db->get("room_booking","COUNT(*)","WHERE status = '1'");
			?>
       <h1><?php echo $data['result'][0][0]; ?> rooms</h1>
        </div>
        <div class="card-action">
          <a href="/admin/room-booking/">All booking</a>
          <a href="/admin/all-rooms/">Room Management</a>
        </div>
      </div>
    </div>
  </div>
</div>