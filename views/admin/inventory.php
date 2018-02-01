<html>
<head>   
<link href="/../css/calendar.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
$court_id = $_GET['court_id'];
include 'calendar.php';

$calendar = new Calendar();
echo $calendar->show($court_id);
?>
</body>
</html>  