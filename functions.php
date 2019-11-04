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
	if($file!=''){
		$data = array('image'=>$file,'status'=>1);
		$id=$db->insert('gallery',$data);
		header('Location: /admin/gallery/?msg=1');
	}
	else{
		header('Location: /admin/gallery/?msg=0');
	}
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
		if($member_id > 0){
			$_SESSION['member']=$member_id;
			$callbackURL = $input->post('callbackURL');
			if($callbackURL!=''){
				redirect('/list/court/?callbackURL='.$callbackURL);
			}
			else{
				header('Location: /account/?msg=new');
			}
		}
		else{
			redirect('/register/?msg=error');
		}
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
			$callbackURL = $input->post('callbackURL');
			if($callbackURL!=''){
				redirect('/list/court/?callbackURL='.$callbackURL);
			}
			elseif($input->post('page')=='long-court'){
				?>
				<form id="page" method="post" action="/list/court-long/">
					<input type="hidden" name="startdate" value="<?php echo $input->post('startdate') ?>">
					<input type="hidden" name="enddate" value="<?php echo $input->post('enddate') ?>">
				</form>
				<script>
					document.getElementById('page').submit();
				</script>
				<?php
			}
			elseif($input->post('page')=='room'){
				?>
				<form id="page" method="post" action="/list/room/">
					<input type="hidden" name="check_in" value="<?php echo $input->post('startdate') ?>">
					<input type="hidden" name="check_out" value="<?php echo $input->post('enddate') ?>">
				</form>
				<script>
					document.getElementById('page').submit();
				</script>
				<?php
			}
			else{
				header('Location: /');
			}
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
	$data = array("status"=>2);
	$db->update('news',$data,$id);		
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
function room_delete(){

	$db=new db;
	$input=new input;
	$id =$_GET['id'];
	$data = array("status"=>2);
	$db->update('rooms',$data,$id);	
	header('Location: /admin/all-rooms/');

}
function room_edit(){
	$input = new input;
	$db = new db;
	$id =$input->post('id');
	$name=$input->post('name');
	$type=$input->post('type');
	$rent=$input->post('rent');
	$description=$input->post('description');
	$occupancy=$input->post('occupancy');
	$data = array('room_name'=>$name,'room_type'=>$type,'rent'=>$rent,'description'=>$description,'max_occupancy'=>$occupancy);
	$db->update('rooms',$data,$id);	
	header('Location: /admin/all-rooms/?msg=1');
}
function add_events(){

	$db=new db;
	$input=new input;
	$name=$input->post('name');
	$venue=$input->post('venue');
	$starting=date("Y-m-d H:i:s",strtotime($input->post('starting')));
	$ending=date("Y-m-d H:i:s",strtotime($input->post('ending')));
	$file=$input->image('events','event_image');
	$seats=$input->post('seats');
	$description=$input->post('description');
	$ticket=$input->post('ticket');
	$data = array('event_name'=>$name,'featured_img'=>$file,'venue'=>$venue,'event_starting'=>$starting,'event_ending'=>$ending,'description'=>$description,'seats'=>$seats,'ticket_charge'=>$ticket,'status'=>1);
	$db->insert('events',$data);
	header('Location: /admin/add-events/?msg=1');

}
function event_delete(){

	$db=new db;
	$input=new input;
	$id =$_GET['id'];
	$data = array("status"=>2);
	$db->update('events',$data,$id);	
	header('Location: /admin/all-events/');

}
function event_edit(){
	$input = new input;
	$db = new db;
	$id =$input->post('id');
	$name=$input->post('name');
	$venue=$input->post('venue');
	$starting=$input->post('starting');
	$ending=$input->post('ending');
	$descripton=$input->post('descripton');
	$seats=$input->post('seats');
	$rate=$input->post('rate');
	$data = array('event_name'=>$name,'venue'=>$venue,'event_starting'=>$starting,'event_ending'=>$ending,'description'=>$descripton,'seats'=>$seats,'ticket_charge'=>$rate);
	$db->update('events',$data,$id);	
	header('Location: /admin/all-events/?msg=1');

}
function about_us(){

	$db=new db;
	$input=new input;
	$user = $_SESSION['logged_admin'];
	$data = $db->get("pages","id","where `page`='about-us'"); 
	$id=$data['result'][0][0];
	$content=$input->post('content');
	if(!isset($data['result'])){
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
	$slot = $db->get('court_inventory','`id`',"WHERE `date` = '$date' AND `time` = '$time' AND `court_id`='$court_id'");
	if(isset($slot['result'])){
		$data = array('price'=>$price,'status'=>1);
		$db->update('court_inventory',$data,$slot['result'][0][0]);

	}
	else{
		$data = array('court_id'=>$court_id,'date'=>$date,'time'=>$time,'price'=>$price,'status'=>1);
		$db->insert('court_inventory',$data);
	}
	header('Location: /admin/court/?msg=4');
}
function gallery_delete(){
	$input = new input;
	$db = new db;
	$id =$input->get('id');
	$data = array("status"=>2);
	$db->update('gallery',$data,$id);	
	header('Location: /admin/gallery/');
}
function court_delete(){
	$input = new input;
	$db = new db;
	$id =$_GET['id'];
	$data = array("status"=>2);
	$db->update('courts',$data,$id);		
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
		$timeslot = $_POST['timeSlot'];
		foreach($timeslot as $slot){
			$rate = $db->get('court_inventory',"price","WHERE `id`='$slot'");
			$price=$rate['result'][0][0];
			$data = array('user'=>$user, 'timeslot'=>$slot, 'rate'=>$price,'status'=>0);//status 0 means booked not paid
			$booking_id = $db->insert('court_booking',$data);
			$booking_no = "TY"."U".$user."T".$booking_type."D".$booking_id;
			$booking_no = substr($booking_no,0,12);
			$data = array('booking_id'=>$booking_id, 'booking_no'=>$booking_no, 'booking_type'=>$booking_type, 'status'=>0);
			$invoice_id = $db->insert('invoice',$data);
			$court_invoice[]=$invoice_id;
		}
		$_SESSION['invoice'] = $court_invoice;
		$_SESSION['invoice_type'] = 'court';
		redirect('/booking/payment/');
	}
	elseif($booking_type=='room'){
		$booking_type=2;
		$no_of_rooms= $input->post('no_of_rooms');
		$check_in = date('Y-m-d',strtotime($input->post('check_in')));
		$check_out = date('Y-m-d',strtotime($input->post('check_out')));
		$rooms = $db->get('rooms','`id`',"WHERE 1");
		$j=1;
		$bcheck=0;
		$booking_no='';
		foreach($rooms['result'] as $key => $room){
			$room_id = $room['id'];
			if($j<=$no_of_rooms){
				$check = $db->get('room_booking','count(*)',"WHERE (('$check_in' BETWEEN `expected_check_in` AND `expected_check_out` - interval 1 day) OR ( '$check_out' BETWEEN `expected_check_in` AND `expected_check_out` + interval 1 day ) OR ( `expected_check_in` BETWEEN '$check_in' AND '$check_out' - interval 1 day) OR ('$check_in' <= `expected_check_in` AND '$check_out' >= `expected_check_out`)) AND (`status` = '1' AND `room_id` = '$room_id')");
				if($check['result'][0][0]==0){
					$rate = $db->get('rooms',"rent","WHERE `id`='$room_id'");
					$price=$rate['result'][0][0];
					if($bcheck==0){
						$data = array('room_id'=>$room_id, 'user'=>$user, 'expected_check_in'=>$check_in,  'expected_check_out'=>$check_out, 'persons'=>0, 'status'=>0, 'rate'=>$price);
						$booking_id = $db->insert('room_booking',$data);
						$booking_no = "TY"."U".$user."T".$booking_type."D".$booking_id;
						$booking_no = substr($booking_no,0,12);
						$data = array('booking_id'=>$booking_id, 'booking_no'=>$booking_no, 'booking_type'=>$booking_type, 'status'=>0);
						$invoice_id = $db->insert('invoice',$data);
						$bcheck = 1;
					}
					else{
						$data = array('room_id'=>$room_id, 'user'=>$user, 'expected_check_in'=>$check_in,  'expected_check_out'=>$check_out, 'persons'=>0, 'status'=>0, 'rate'=>$price);
						$booking_id = $db->insert('room_booking',$data);
						$data = array('booking_id'=>$booking_id, 'booking_no'=>$booking_no, 'booking_type'=>$booking_type, 'status'=>0);
						$invoice_id = $db->insert('invoice',$data);
					}
					$j++;
				}
			}
			else{
				break;
			}
		}
		$_SESSION['invoice'] = $invoice_id;
		redirect('/booking/payment/');
	}
	elseif($booking_type=='event'){
		$booking_type=3;
		$event_id = $input->post('event');
		$no_of_seats = $input->post('noOfSeats');
		$from_month = $input->post('from_month');
		$rate = $db->get('events',"ticket_charge","WHERE `id`='$event_id'");
		$price=$rate['result'][0][0];
		$data = array('event'=>$event_id, 'user'=>$user, 'no_of_seats'=>$no_of_seats, 'status'=>0, 'rate'=>$price, 'from_month'=>$from_month);
		$booking_id = $db->insert('event_tickets',$data);
		$booking_no = "TY"."U".$user."T".$booking_type."D".$booking_id;
		$booking_no = substr($booking_no,0,12);
		$data = array('booking_id'=>$booking_id, 'booking_no'=>$booking_no, 'booking_type'=>$booking_type, 'status'=>0);
		$invoice_id = $db->insert('invoice',$data);
		$_SESSION['invoice'] = $invoice_id;
		redirect('/booking/payment/');
	}
	elseif($booking_type=='longbook'){
		$booking_type = 4;
		$sdate = date('Y-m-d',strtotime($input->post('startdate')));
		$edate = date('Y-m-d',strtotime($input->post('enddate')));
		$slot = json_encode($_POST['slot']);
		//$court_id = $input->post('court');
		$court_id = 0;
		$data = array('user'=>$user, 'court_id'=>$court_id, 'start_date'=>$sdate, 'end_date'=>$edate, 'status'=>0, 'slot'=>$slot);
		$booking_id = $db->insert('court_long_booking',$data);
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
	if($_SESSION['invoice_type']=='court'){
		foreach($_SESSION['invoice'] as $invoice){
			$data = $db->get('invoice','booking_id,booking_type,booking_no',"WHERE `id` = '$invoice'");
			$booking_type = $data['result'][0][1];
			$booking_id = $data['result'][0][0];
			$booking_no = $data['result'][0][2];
			$data = array('status'=>2); //pay at court
			$db->update('invoice',$data,$invoice);
			$data = array('status'=>1); //booked
			if($booking_type=='1'){
				$db->update('court_booking',$data,$booking_id);
				$data = $db->get('court_booking','timeslot',"WHERE `id` = '$booking_id'");
				$timeslot = $data['result'][0][0];
				$data = array('status'=>2);
				$db->update('court_inventory',$data,$timeslot);
				redirect('/booking/success/');
			}
			else{
				redirect('/booking/failed/');
			}
		}
		$_SESSION['invoice_type']=NULL;
	}
	else{
		$data = $db->get('invoice','booking_id,booking_type,booking_no',"WHERE `id` = '$invoice'");
		$booking_type = $data['result'][0][1];
		$booking_id = $data['result'][0][0];
		$booking_no = $data['result'][0][2];
		$data = array('status'=>2); //pay at court
		$db->update('invoice',$data,$invoice);
		$data = array('status'=>1); //booked
		if($booking_type=='1'){
			$db->update('court_booking',$data,$booking_id);
			$data = $db->get('court_booking','timeslot',"WHERE `id` = '$booking_id'");
			$timeslot = $data['result'][0][0];
			$data = array('status'=>2);
			$db->update('court_inventory',$data,$timeslot);
			redirect('/booking/success/');
		}
		elseif($booking_type=='2'){
			$booking = $db->get('invoice','booking_id',"WHERE `booking_no` = '$booking_no'");
			foreach($booking['result'] as $key => $rw){
				$booking_id = $rw['booking_id'];
				$db->update('room_booking',$data,$booking_id);
			}
			$db->query("UPDATE invoice SET `status`=2 WHERE booking_no = '$booking_no'");
			redirect('/booking/success/');
		}
		elseif($booking_type=='3'){
			$db->update('event_tickets',$data,$booking_id);
			redirect('/booking/success/');
		}
		elseif($booking_type=='4'){
			$db->update('court_long_booking',$data,$booking_id);
			$data = $db->get('court_long_booking','start_date,end_date,court_id,slot',"WHERE `id` = '$booking_id'");
			$sdate = date('Y-m-d',strtotime($data['result'][0]['start_date']));
			$edate = date('y-m-d',strtotime($data['result'][0]['end_date']));
			$slots = json_decode($data['result'][0]['slot']);
			$court_id = $data['result'][0]['court_id'];
			$status = array('status'=>2);
			$current_date = $sdate;
			foreach($slots as $slot){
					$db->update('court_inventory',$status,$slot);
			}
			redirect('/booking/success/');
		}
		else{
			redirect('/booking/failed/');
		}
	}
}
function quick_dates(){
	$input = new input;
	$db = new db;
	$start_date = date("Y-m-d",strtotime($input->post('start_date')));
	$end_date = date("Y-m-d",strtotime($input->post('end_date')));
	$court = $input->post('court');
	$current_date = $start_date;
	while($current_date<=$end_date){
		foreach($_POST['timeslot'] as $slot){
			$slot = date('H:i:s',strtotime($slot));
			$data = $db->get('court_inventory',"COUNT(*)","WHERE `court_id` = '$court' AND `date` = '$current_date' AND `time` = '$slot'");
			if($data['result'][0][0]==0){
				$content = array('court_id'=>$court, 'date'=>$current_date, 'time'=>$slot, 'price'=>$input->post('price'), 'status'=>1);
				$db->insert('court_inventory',$content);
			}
		}
		$current_date = date('Y-m-d',(strtotime($current_date)+86400));
	}
	redirect('/admin/court/?msg=4');
}
function email_reset_key(){
	$db = new db;
	$input = new input;
	$email = $input->post('Email');
	$data = $db->get('members','password',"WHERE email = '$email'");
	if(isset($data['result'])){
		$subject = "Password Reset Link";
		$txt = "Someone has requested a password reset for your tylos account: \n \n
If this was a mistake, just ignore this email and nothing will happen. \n \n
To reset your password, visit the following address: \n
< http://tylosacademy.com/reset/".$data['result'][0][0]."/ >";
		$headers = "From: Tylos Academy<noreply@tylosacademy.com>";
		if(mail($email,$subject,$txt,$headers))
		{
			redirect('/forgot-password/?msg=mail-sent');
		}
		else{
			redirect('/forgot-password/?msg=not-sent');
		}
	}
	else{
		redirect('/forgot-password/?msg=not-found');
	}
}
function reset_password(){
	$input = new input;
	$db = new db;
	$key = $input->post('Key');
	$pass = sha1($input->post('Password'));
	$db->query("UPDATE `members` SET `password` = '$pass' WHERE `password` = '$key'");
	redirect('/signin/?msg=reseted-password');
}
function go_to_pay($booking_id){
	$db = new db;
	$data = $db->get('invoice','`id`',"WHERE `booking_no` = '$booking_id'");
	$_SESSION['invoice'] = $data['result'][0][0];
	redirect('/booking/payment/');
}
function cancel_booking($booking_id){
	$db = new db;
	$data = $db->get('invoice','`id`,booking_id,booking_type',"WHERE `booking_no` = '$booking_id'");
	$invoice = $data['result'];
	$invoice_id = $invoice[0][0];
	$booking_id = $invoice[0][1];
	if($invoice[0][2]=='1'){
		$status = array('status'=>2);
		$db->update('court_booking',$status,$booking_id);
		$data = $db->get('court_booking','timeslot',"WHERE `id`= '$booking_id'");
		$slot = $data['result'][0][0];
		$update = array('status'=>1);
		$db->update('court_inventory',$update,$slot);
	}
	$data = array('status'=>5);//cancelled
	$db->update('invoice',$data,$invoice_id);
	redirect('/account/?msg=cancelled');
}
function change_password_member(){
	$input = new input;
	$db = new db;
	$user = $_SESSION['member'];
	$data = $db->get('members','password',"WHERE `id` = '$user'");
	if(sha1($input->post('oldpassword'))==$data['result'][0][0]){
		$password = sha1($input->post('newpassword'));
		$data1 = array('password'=>$password);
		$db->update('members',$data1,$user);
		redirect('/account/change-password/?msg=pass-success');
	}
	else{
		redirect('/account/change-password/?msg=pass-failure');
	}
}
function contact_us(){
	$input = new input;
	$to = "sandeep@iicwebsolutions.com, info@tylosacademy.com";
	$subject = "Enquiry on Tylos Website";

	$message = "
	<html>
	<head>
	<title>Enquiry</title>
	</head>
	<body>
	<p>".$input->post('Message')."</p>
	<table>
	<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Mobile Number</th>
	</tr>
	<tr>
	<td>".$input->post('FullName')."</td>
	<td>".$input->post('Email')."</td>
	<td>".$input->post('PhoneNo')."</td>
	</tr>
	</table>
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: Tylos Academy<no-reply@tylosacademy.com>' . "\r\n";
	$headers .= 'Cc: vishnu@klivolks.com' . "\r\n";

	mail($to,$subject,$message,$headers);
	echo 'Your mail sent successfully. Click <a href="/contact-us-tylos/">here</a> to go back.';
}
function paid($booking_no){
	$db = new db;
	$data = $db->get('invoice','id',"WHERE `booking_no` = '$booking_no'");
	foreach($data['result'] as $key=>$rw){
		$id = $rw[0];
		$data = array("status"=>3);
		$db->update('invoice',$data,$id);
	}
	
}
function update_profile(){
	$input = new input;
	$db = new db;
	$id = $input->post('user_id');
	$name = $input->post('fname');
	$phone = $input->post('phone');
	$data = array("full_name"=>$name,"phone_no"=>$phone);
	$db->update('members',$data,$id);
	redirect('/account/edit-profile/?msg=success');
}
?>