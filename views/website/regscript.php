<?php
$input = new input;
if($input->get('callbackURL')!=''){
	?>
<script type="text/javascript">
window.onload = function(){
	getklubstaprofile(function(response){
		var profile = response.profile[0];
		var email = response.email[0].email;
		var mobile = response.mobile[0].mobile;
		$("#FullName").focus();
		$("#FullName").val(profile.fname+" "+profile.lname);
		$("#Gender").val(profile.gender);
		$('select').material_select();
		$("#Email").val(email);
		$("#Phone").val(mobile);
		$("#klubstaId").val(response.user_id);
		$("#Email").focus();
		$("#Phone").focus();
		$("#Password").focus();
	});
}
</script>
	<?
}
?>