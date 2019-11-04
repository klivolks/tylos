<html>
<head>   
<link href="/../css/calendar.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h4> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Choose date to update inventory<br><br></h4>
<?php
$court_id = $_GET['court_id'];
include 'calendar.php';

$calendar = new Calendar();
echo $calendar->show($court_id);
?>
<div class="col s8">
	<a href="/admin/quick-update/<?php echo $court_id; ?>/" class="btn green white-text waves-effect">QUICK UPDATE FOR MULTIPLE DATES</a>
</div>
</body>
</html>  