<?php
session_start();
include( 'class_lib.php' );
$link = $_SERVER[ 'REQUEST_URI' ];
$param = explode( '/', $link );
$plugin = $param[ 1 ];
if($plugin=='admin'){
	if(isset($param[2])){
		$sub_page=$param[2];
	}
	else{
		$sub_page=null;
	}
	if($sub_page=='login'){
		$load->view('admin/login');
	}
	elseif($sub_page=='authenticate'){
		admin_authenticate();
	}
	elseif($sub_page=='dashboard'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','dashboard');
		$load->view('admin/dashboard');
		$load->view('admin/footer');
	}
	elseif($sub_page=='settings'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','settings');
		$load->view('admin/settings');
		$load->view('admin/footer');
	}
	elseif($sub_page=='all'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','admin');
		$load->view('admin/all-admin');
		$load->view('admin/footer');
	}
	elseif($sub_page=='new'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','admin');
		$load->view('admin/new-admin');
		$load->view('admin/footer');
	}
	elseif($sub_page=='edit'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		if($param[3]=='profile'){
			edit_profile();
		}
		elseif($param[3]=='password'){
			change_password();
		}
	}
	elseif($sub_page=='add'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		else{
			$module = $param[3];
			if($module=='admin'){
				add_admin();
			}
			elseif($module=='gallery'){
				gallery_upload();
			}
			elseif($module=='court'){
				add_court();
			}
			elseif($module=='news'){
				add_news();
			}
			elseif($module=='rooms'){
				add_rooms();
			}
			elseif($module=='events'){
				add_events();
			}
			elseif($module=='inventory-add'){
				inventory_add();
			}
			elseif($module=='about-us'){
				about_us();
			}
			elseif($module=='gallery-delete'){
				gallery_delete();
			}
			elseif($module=='court-delete'){
				court_delete();
			}
			elseif($module=='edit'){
				edit();
			}
			elseif($module=='news-delete'){
				news_delete();
			}
			elseif($module=='news-edit'){
				news_edit();
			}
			elseif($module=='room-delete'){
				room_delete();
			}
			elseif($module=='room-edit'){
				room_edit();
			}
			elseif($module=='event-delete'){
				event_delete();
			}
			elseif($module=='event-edit'){
				event_edit();
			}
			elseif($module=='quick-date'){
				quick_dates();
			}
		}
	}
	elseif($sub_page=='deactivate'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		else{
			deactivate($param[3]);
		}
	}
	elseif($sub_page=='activate'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		else{
			activate($param[3]);
		}
	}
	elseif($sub_page=='logout'){
		logout();
	}
	elseif($sub_page=='gallery'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','gallery');
		$load->view('admin/gallery');
		$load->view('admin/footer');
	}
	elseif($sub_page=='court'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','courts');
		$load->view('admin/court');
		$load->view('admin/footer');
	}
	elseif($sub_page=='new-court'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','courts');
		$load->view('admin/new-court');
		$load->view('admin/footer');
	}
	elseif($sub_page=='members'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','members');
		$load->view('admin/members');
		$load->view('admin/footer');
		
	}
		elseif($sub_page=='news'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','news');
		$load->view('admin/news');
		$load->view('admin/footer');
		
	}
	elseif($sub_page=='all-news'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','all-news');
		$load->view('admin/all-news');
		$load->view('admin/footer');
		
	}
	elseif($sub_page=='all-booking'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','all-booking');
		$load->view('admin/all-booking');
		$load->view('admin/footer');
	}
	elseif($sub_page=='bulk-booking'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','bulk-booking');
		$load->view('admin/long-booking');
		$load->view('admin/footer');
	}
	elseif($sub_page=='booking-details'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','booking-details');
		$load->view('admin/booking-details');
		$load->view('admin/footer');
	}
	elseif($sub_page=='inventory'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','inventory');
		$load->view('admin/inventory');
		$load->view('admin/footer');
	}
	elseif($sub_page=='quick-update'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','inventory');
		$load->view('admin/quick-update',$param[3]);
		$load->view('admin/footer');
	}
	elseif($sub_page=='add-rooms'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','add-rooms');
		$load->view('admin/add-rooms');
		$load->view('admin/footer');
	}
	elseif($sub_page=='all-rooms'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','all-rooms');
		$load->view('admin/all-rooms');
		$load->view('admin/footer');
	}
	elseif($sub_page=='room-booking'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','room-booking');
		$load->view('admin/room-booking');
		$load->view('admin/footer');
	}
	elseif($sub_page=='room-details'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','room-details');
		$load->view('admin/room-details');
		$load->view('admin/footer');
	}
	elseif($sub_page=='add-events'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','add-events');
		$load->view('admin/add-events');
		$load->view('admin/footer');
	}
	elseif($sub_page=='all-events'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','all-events');
		$load->view('admin/all-events');
		$load->view('admin/footer');
	}
	elseif($sub_page=='event-booking'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','event-booking');
		$load->view('admin/event-booking');
		$load->view('admin/footer');
	}
	elseif($sub_page=='event-details'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','event-details');
		$load->view('admin/event-details');
		$load->view('admin/footer');
	}
	elseif($sub_page=='about-us'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','about-us');
		$load->view('admin/about-us');
		$load->view('admin/footer');
	}
	elseif($sub_page=='inventory-details'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','inventory-details');
		$load->view('admin/inventory-details');
		$load->view('admin/footer');
	}
	elseif($sub_page=='court_edit'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','court_edit');
		$load->view('admin/court_edit');
		$load->view('admin/footer');
	}
	elseif($sub_page=='news-edit'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','news-edit');
		$load->view('admin/news-edit');
		$load->view('admin/footer');
	}
	elseif($sub_page=='room-edit'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','room-edit');
		$load->view('admin/room-edit');
		$load->view('admin/footer');
	}
	elseif($sub_page=='event-edit'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','event-edit');
		$load->view('admin/event-edit');
		$load->view('admin/footer');
	}
	elseif($sub_page=='bill'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$db = new db;
		$booking_no = $db->escape($param[3]);
		$data = $db->get('invoice','count(*)',"WHERE booking_no = '$booking_no'");
		if($data['result'][0][0]!=1){
			redirect('/not-found/');
		}
		else{
			$load->view('website/meta');
			$load->view('admin/print',$booking_no);
		}
	}
	else{
		if(check_session()==1){
			header('Location: /admin/dashboard/');
		}
		else{
			$load->view('admin/login');
		}
	}
}
elseif($plugin=='functions'){
	$function=$param[2];
	if($function=='add-member'){
		add_member();
	}
	elseif($function=='klubsta-signin'){
		klubsta_signin();
	}
	elseif($function=='signin'){
		member_signin();
	}
	elseif($function=='confirm'){
		add_to_cart();
	}
	elseif($function=='payment'){
		$input = new input;
		if($input->post('payment_method')=='1'){
			pay_at_court();
		}
	}
}
elseif($plugin=='register'){
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/registration');
	$load->view('website/footer');
	$load->view('website/regscript');
}
elseif($plugin=='logout'){
	member_logout();
}
elseif($plugin=='signin'){
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/signin');
	$load->view('website/footer');
}
elseif($plugin=='court'){
	$db = new db;
	$id = $db->escape($param[2]);
	$data = $db->get('courts','count(*)',"WHERE `id` = '$id'");
	if($data['result'][0][0]==0){
		redirect('/not-found/');
	}
	else{
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/court',$db->escape($param[2]));
		$load->view('website/footer');
	}
}
elseif($plugin=='room'){
	$db = new db;
	$id = $db->escape($param[2]);
	$data = $db->get('rooms','count(*)',"WHERE `id` = '$id'");
	if($data['result'][0][0]==0){
		redirect('/not-found/');
	}
	else{
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/room',$db->escape($param[2]));
		$load->view('website/footer');
	}
}
elseif($plugin=='event'){
	$db = new db;
	$id = $db->escape($param[2]);
	$data = $db->get('events','count(*)',"WHERE `id` = '$id'");
	if($data['result'][0][0]==0){
		redirect('/not-found/');
	}
	else{
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/event',$db->escape($param[2]));
		$load->view('website/footer');
	}
}
elseif($plugin=='court-book'){
	$input = new input;
	if(!isset($_SESSION['member'])){
		redirect('/signin/');
	}
	$db = new db;
	$id = $db->escape($param[2]);
	$data = $db->get('courts','count(*)',"WHERE `id` = '$id'");
	if($data['result'][0][0]==0){
		redirect('/not-found/');
	}
	else{
		$court = $db->escape($param[2]);
		if($input->post('dateOfBooking')==''){
			redirect('/court/'.$court.'/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/court-book',$param[2]);
		$load->view('website/footer');
	}
}
elseif($plugin=='room-book'){
	$input = new input;
	if(!isset($_SESSION['member'])){
		redirect('/signin/');
	}
	$db = new db;
	$id = $db->escape($param[2]);
	$data = $db->get('rooms','count(*)',"WHERE `id` = '$id'");
	if($data['result'][0][0]==0){
		redirect('/not-found/');
	}
	else{
		$room = $db->escape($param[2]);
		if($input->post('check_in')==''||$input->post('check_out')==''){
			redirect('/room/'.$room.'/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/room-book',$db->escape($param[2]));
		$load->view('website/footer');
	}
}
elseif($plugin=='ticket-book'){
	$input = new input;
	if(!isset($_SESSION['member'])){
		redirect('/signin/');
	}
	$db = new db;
	$id = $db->escape($param[2]);
	$data = $db->get('events','count(*)',"WHERE `id` = '$id'");
	if($data['result'][0][0]==0){
		redirect('/not-found/');
	}
	else{
		$event = $db->escape($param[2]);
		if($input->post('noOfSeats')==''||$input->post('noOfSeats')<=0){
			redirect('/event/'.$event.'/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/ticket-book',$db->escape($param[2]));
		$load->view('website/footer');
	}
}
elseif($plugin=='booking'){
	$input = new input;
	$court = $input->post('court');
	if($court!=''){
		$callbackURL='court&slot='.$input->post('timeSlot');
	}
	if(!isset($_SESSION['member'])){
		redirect('/signin/?callbackURL='.$callbackURL);
	}
	$step=$param[2];
	if($step=='confirm'){
		$court = $input->post('court');
		$room = $input->post('room');
		$event = $input->post('event');
		if($court!=''){
			if($input->post('timeSlot')==''&&$input->post('startdate')==''){
				redirect('/booking/failed/');
			}
		}
		elseif($room!=''){
			if($input->post('check_in')==''||$input->post('check_out')==''){
				redirect('/booking/failed/');
			}
		}
		elseif($event!=''){
			if($input->post('noOfSeats')==''||$input->post('noOfSeats')<1){
				redirect('/booking/failed/');
			}
		}
		else{
			redirect('/booking/failed/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/confirm');
		$load->view('website/footer');
	}
	elseif($step=='payment'){
		if(!isset($_SESSION['invoice'])){
			redirect('/booking/failed/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/invoice');
		$load->view('website/footer');
	}
	elseif($step=='success'){
		if(!isset($_SESSION['invoice'])){
			redirect('/booking/failed/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/success');
		$load->view('website/footer');
	}
	elseif($step=='failed'){
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/failed');
		$load->view('website/footer');
	}
	elseif($step=='details'){
		$db = new db;
		$booking_no = $db->escape($param[3]);
		$data = $db->get('invoice','count(*)',"WHERE booking_no = '$booking_no'");
		if($data['result'][0][0]!=1){
			redirect('/not-found/');
		}
		else{
		$load->view('website/meta');
		$load->view('website/print',$booking_no);
		}
	}
	else{
		redirect('/not-found/');
	}
}
elseif($plugin=='list'){
	if($param[2]=='court'){
		$input = new input;
		if($input->post('dateOfBooking')!=''){
			$load->view('website/meta');
			$load->view('website/common-header');
			$load->view('website/list-court');
			$load->view('website/footer');
		}
		if($input->get('callbackURL')!=''){
			$load->view('website/meta');
			$load->view('website/common-header');
			$load->view('website/list-court');
			$load->view('website/footer');
			$load->view('website/select-slot');
		}
		else{
			redirect('/not-found/');
		}
	}
	elseif($param[2]=='court-long'){
		$input = new input;
		if($input->post('dateOfBooking')!=''){
			$load->view('website/meta');
			$load->view('website/common-header');
			$load->view('website/list-court-long');
			$load->view('website/footer');
		}
		else{
			redirect('/not-found/');
		}
	}
	elseif($param[2]=='room'){
		$input = new input;
		if($input->post('check_in')!=''){
			$load->view('website/meta');
			$load->view('website/common-header');
			$load->view('website/list-room');
			$load->view('website/footer');
		}
		else{
			redirect('/not-found/');
		}
	}
	else{
		redirect('/not-found/');
	}
}
elseif($plugin=='gallery'){
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/gallery');
	$load->view('website/footer');
}
elseif($plugin=='about-us-tylos'){
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/about');
	$load->view('website/footer');
}
elseif($plugin=='contact-us-tylos'){
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/contact');
	$load->view('website/footer');
}
elseif($plugin=='blog'){
	$db = new db;
	$post = $db->escape($param[2]);
	if($post!=''||$post!=NULL){
		$data = $db->get('news',"count(*),title","WHERE `id` = '$post'");
		if($data['result'][0][0]!=0){
			$slug = strtolower(preg_replace('#[ -]+#', '-', $data['result'][0][1]));
			if($slug==$param[3]){
				$load->view('website/meta');
				$load->view('website/common-header');
				$load->view('website/post',$db->escape($param[2]));
				$load->view('website/footer');
			}
			else{
				redirect('/not-found/');
			}
		}
		else{
			redirect('/not-found/');
		}
	}
	else{
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/blog');
		$load->view('website/footer');
	}
}
elseif($plugin=='account'){
	$section = $param[2];
	if(!isset($_SESSION['member'])){
		redirect('/signin/');
	}
	else{
		if($section=='profile'){
			$load->view('website/meta');
			$load->view('website/common-header');
			$load->view('website/my-profile');
			$load->view('website/footer');
		}
		elseif($section=='players'){
			$load->view('website/meta');
			$load->view('website/common-header');
			$load->view('website/my-player');
			$load->view('website/footer');
		}
		elseif($section=='history'){
			$sub_section = $param[3];
			if($sub_section=='court'){
				$load->view('website/meta');
				$load->view('website/common-header');
				$load->view('website/court-booking');
				$load->view('website/footer');
			}
			elseif($sub_section=='room'){
				$load->view('website/meta');
				$load->view('website/common-header');
				$load->view('website/room-booking');
				$load->view('website/footer');
			}
			elseif($sub_section=='event'){
				$load->view('website/meta');
				$load->view('website/common-header');
				$load->view('website/event-tickets');
				$load->view('website/footer');
			}
			else{
				redirect('/not-found/');
			}
		}
		else{
			$load->view('website/meta');
			$load->view('website/common-header');
			$load->view('website/my-account');
			$load->view('website/footer');
		}
	}
}
elseif($plugin=='search'){
	$sub_section = $param[2];
	if($sub_section==''){
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/search');
		$load->view('website/footer');
	}
	elseif($sub_section=='court'){
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/court-search');
		$load->view('website/footer');
	}
	elseif($sub_section=='rooms'){
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/room-search');
		$load->view('website/footer');
	}
	elseif($sub_section=='events'){
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/event-search');
		$load->view('website/footer');
	}
	else{
		redirect('/not-found/');
	}
}
elseif($plugin==''){
	$load->view('website/meta');
	$load->view('website/home-header');
	$load->view('website/banner');
	$load->view('website/home-menu');
	$load->view('website/trending');
	$load->view('website/quick-book');
	$load->view('website/sales-accelerator');
	//$load->view('website/old-events');
	$load->view('website/home-gallery');
	$load->view('website/home-blog');
	$load->view('website/footer');
	$load->view('website/home-script');
}
else{
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/404');
	$load->view('website/footer');
}
?>