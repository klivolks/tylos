<?php
function check_session(){
	if(isset($_SESSION['logged_admin'])){
		return 1;
	}
	else{
		return 0;
	}
}
function redirect($slug){
	header("Location: $slug");
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
function member_logout(){
	session_destroy();
	header('Location: /');
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
function add_member(){
	$db = new db;
	$input = new input;
	if($input->post('klubstaId')=='0'){
		$member_type=0;
	}
	else{
		$member_type=1;
	}
	if($input->post('Password')==$input->post('RetypePassword')){
		$data = array('member_type'=>$member_type, 'full_name'=>$input->post('FullName'), 'gender'=>$input->post('Gender'), 'email'=>$input->post('Email'), 'klubsta_id'=>$input->post('klubstaId'), 'phone_no'=>$input->post('Phone'), 'location'=>$input->post('Location'), 'password'=>sha1($input->post('Password')));
		$member_id=$db->insert('members',$data);
		$_SESSION['member']=$member_id;
		header('Location: /');
	}
	else{
		header('Location: /register/?msg=error');
	}
}
function klubsta_signin(){
	$db = new db;
	$input = new input;
	$klubsta_id = $input->post('klubstaId');
	$data = $db->get('members','count(*)',"WHERE `klubsta_id` = '$klubsta_id'");
	if($data['result'][0][0]!=0){
		$data = $db->get('members','id',"WHERE `klubsta_id` = '$klubsta_id'");
		$_SESSION['member'] = $data['result'][0][0];
		echo 'success';
	}
	else{
		echo 'error';
	}
}
function member_signin(){
	$db = new db;
	$input = new input;
	$email = $input->post('Email');
	$data = $db->get('members','count(*)',"WHERE `email` = '$email'");
	if($data['result'][0][0]!=0){
		$data = $db->get('members','id,password',"WHERE `email` = '$email'");
		if(sha1($input->post('Password'))==$data['result'][0][1]){
			$_SESSION['member'] = $data['result'][0][0];
			header('Location: /');
		}
		else{
			header('Location: /signin/?msg=password-doesnt-match');
		}
	}
	else{
		header('Location: /signin/?msg=user-not-found');
	}
}
function add_court(){
	$db = new db;
	$input = new input;
	$file = $input->image('courts','court_img');
	$court_name = $input->post('CourtName');
	$tagline = $input->post('TagLine');
	$description = $input->post('Description');
	$data = array('court_name'=>$court_name, 'tagline'=>$tagline, 'description'=>$description, 'featured_img'=>$file, 'status'=>1);
	$court_id = $db->insert('courts',$data);
	$feature_count = $input->post('featureCount');
	$i=1;
	while($i<=$feature_count){
		$field="Feature".$i;
		$feature = $input->post($field);
		$i++;
		if($feature!=NULL && $feature!=''){
			$data = array('court_id'=>$court_id, 'feature'=>$feature);
			$db->insert('court_features',$data);
		}
	}
	header('Location: /admin/new-court/?msg=1');
}
function add_news(){

	$db=new db;
	$input=new input;
	$user = $_SESSION['logged_admin'];
	$file=$input->image('news','news_image');
	$title=$input->post('title');
	$content=$input->post('content');
	$data = array('user'=>$user,'title'=>$title,'featured_img'=>$file,'content'=>$content,'status'=>1);
	$db->insert('news',$data);
	header('Location: /admin/news/?msg=1');

}
function news_delete(){

	$db=new db;
	$input=new input;
	$id =$_GET['id'];
	$db->delete('news',$id);	
	header('Location: /admin/all-news/');

}
function news_edit(){

$input = new input;
$db = new db;
$id =$input->post('id');
$title=$input->post('name');
$content=$input->post('content');

$data = array('title'=>$title,'content'=>$content);
$db->update('news',$data,$id);	
header('Location: /admin/all-news/?msg=1');

}

function add_rooms(){

	$db=new db;
	$input=new input;
	$name=$input->post('name');
	$type=$input->post('type');
	$rent=$input->post('rent');
	$file=$input->image('rooms','room_image');
	$occupancy=$input->post('occupancy');
	$description=$input->post('description');

	$data = array('room_name'=>$name,'room_type'=>$type,'rent'=>$rent,'featured_img'=>$file,'description'=>$description,'max_occupancy'=>$occupancy,'status'=>1);
	$db->insert('rooms',$data);
	header('Location: /admin/add-rooms/?msg=1');

}
function add_events(){

	$db=new db;
	$input=new input;
	$name=$input->post('name');
	$venue=$input->post('venue');
	$starting=$input->post('starting');
	$ending=$input->post('ending');
	$file=$input->image('events','event_image');
	$seats=$input->post('seats');
	$description=$input->post('description');

	$data = array('event_name'=>$name,'featured_img'=>$file,'venue'=>$venue,'event_starting'=>$starting,'event_ending'=>$ending,'description'=>$description,'seats'=>$seats,'status'=>1);
	$db->insert('events',$data);
	header('Location: /admin/add-events/?msg=1');

}
function about_us(){

	$db=new db;
	$input=new input;
	$user = $_SESSION['logged_admin'];
	$data = $db->get("pages","count(*),id","where `page`='about-us'"); 
	$check=$data['result'][0][0];
	$id=$data['result'][0][1];
	$content=$input->post('content');
	if($check==0){
	$page="about-us";
	$data = array('page'=>$page,'content'=>$content,'status'=>1);
	$db->insert('pages',$data);
	
	}
	else{
	$data = array('content'=>$content);
	$db->update('pages',$data,$id);	
	}
header('Location: /admin/about-us/?msg=1');
}
function inventory_add(){
$input = new input;
$db = new db;
$date =$input->post('date');
$price =$input->post('price');
$date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
$court_id =$input->post('court_id');
$time =$input->post('time');
$data = array('court_id'=>$court_id,'date'=>$date,'time'=>$time,'price'=>$price,'status'=>1);
$db->insert('court_inventory',$data);	
header('Location: /admin/court/?msg=1');
}
function gallery_delete(){
$input = new input;
$db = new db;
$id =$_GET['id'];
$db->delete('gallery',$id);	
header('Location: /admin/gallery/');
}
function court_delete(){
$input = new input;
$db = new db;
$id =$_GET['id'];
$db->delete('courts',$id);	
header('Location: /admin/court/');
}
function edit(){
$input = new input;
$db = new db;
$id =$input->post('id');
$name=$input->post('name');
$tagline=$input->post('tagline');
$description=$input->post('description');
$data = array('court_name'=>$name,'tagline'=>$tagline,'description'=>$description);
$db->update('courts',$data,$id);	
header('Location: /admin/court/?msg=2');
}
function add_to_cart(){
	$input = new input;
	$db = new db;
	$user = $input->post('user');
	$booking_type = $input->post('bookingType');
	if($booking_type=='court'){
		$booking_type = 1;
		$timeslot = $input->post('timeSlot');
		$data = array('user'=>$user, 'timeslot'=>$timeslot, 'status'=>0);
		$booking_id = $db->insert('court_booking',$data);
		$booking_no = "TY"."U".$user."T".$booking_type."D".$booking_id;
		$booking_no = substr($booking_no,0,12);
		$data = array('booking_id'=>$booking_id, 'booking_no'=>$booking_no, 'booking_type'=>$booking_type, 'status'=>0);
		$invoice_id = $db->insert('invoice',$data);
		$_SESSION['invoice'] = $invoice_id;
		redirect('/booking/payment/');
	}
}
function pay_at_court(){
	$invoice = $_SESSION['invoice'];
	$db = new db;
	$data = $db->get('invoice','booking_id,booking_type',"WHERE `id` = '$invoice'");
	$booking_type = $data['result'][0][1];
	$booking_id = $data['result'][0][0];
	$data = array('status'=>2);
	$db->update('invoice',$data,$invoice);
	$data = array('status'=>1);
	if($booking_type=='1'){
		$db->update('court_booking',$data,$booking_id);
		redirect('/booking/success/');
	}
	else{
		redirect('/booking/failed/');
	}
}
?>