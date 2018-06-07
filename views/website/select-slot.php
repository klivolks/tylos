<?php
$input = new input;
$slot = $input->get('slot');
if($slot!=''){
	$db = new db;
	$data = $db->get("court_inventory","`court_id`","WHERE `id` = '$slot'");
	$court = $data['result'][0][0];
	?>
	<script type="text/javascript">
		window.onload = select_slot(<?php echo $slot ?>,<?php echo $court ?>);
</script>
	<?php
}
?>