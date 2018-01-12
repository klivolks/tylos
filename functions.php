<?php
function check_session(){
	if(isset($_SESSION['logged_admin'])){
		return 1;
	}
	else{
		return 0;
	}
}
function admin_authenticate(){
	$input = new input;
	$db = new db;
	$username = $input->post('username');
	$password = $input->post('password');
	$data = $db->get('users','id,Password',"WHERE (UserName='$username' OR Email='$username' OR Phone='$username') AND Status=1");
	if(isset($data['result'])){
		if(sha1($password)==$data['result'][0][1]){
			$_SESSION['logged_admin']=$data['result'][0][0];
			header('Location: /admin/dashboard/');
		}
		else{
			echo 'Password error';
		}
	}
	else{
		echo 'username not found';
	}
}
function edit_profile(){
	$input = new input;
	$db = new db;
	$data=array("UserName"=>$input->post('username'),"Email"=>$input->post('email'),"Phone"=>$input->post('phone'));
	$db->update('users',$data,$_SESSION['logged_admin']);
	header('Location: /admin/settings/?msg=1');
}
function change_password(){
	$input = new input;
	$db = new db;
	$old_password = $input->post('currentpassword');
	$new_password = $input->post('newpassword');
	$retype_password = $input->post('retypepassword');
	if($retype_password==$new_password){
		$admin = $_SESSION['logged_admin'];
		$data=$db->get('users','Password',"WHERE `id` = '$admin'");
		if(sha1($old_password)==$data['result'][0][0]){
			$data = array("Password"=>sha1($new_password));
			$db->update('users',$data,$_SESSION['logged_admin']);
			header('Location: /admin/settings/?msg=1');
		}
		else{
			header('Location: /admin/settings/?msg=0');
		}
	}
	else{
		header('Location: /admin/settings/?msg=0');
	}
}
function deactivate($user){
	$db = new db;
	if($user=='self'){
		$user = $_SESSION['logged_admin'];
	}
	$data = array('Status'=>0);
	$db->update('users',$data,$user);
	if($user=='self'){
		logout();
	}
	else{
		header('Location: /admin/all');
	}
}
function activate($user){
	$db = new db;
	$data = array('Status'=>1);
	$db->update('users',$data,$user);
	header('Location: /admin/all');
}
function logout(){
	session_destroy();
	header('Location: /admin/login');
}
function add_admin(){
	$db = new db;
	$input = new input;
	$password=$input->post('password');
	if($password==$input->post('retypepassword')){
		$data = array('UserName'=>$input->post('username'),'Email'=>$input->post('email'),'Phone'=>$input->post('phone'),'Password'=>sha1($password),'Status'=>1);
		$db->insert('users',$data);
		header('Location: /admin/new/?msg=1');
	}
	else{
		header('Location: /admin/new/?msg=0');
	}
}
function gallery_upload(){
	$input = new input;
	$db = new db;
	$file = $input->image('gallery','gallery_img');
	$data = array('image'=>$file,'status'=>1);
	$db->insert('gallery',$data);
	header('Location: /admin/gallery/');
}
?>