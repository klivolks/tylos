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
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/court',$param[2]);
	$load->view('website/footer');
}
elseif($plugin=='room'){
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/room',$param[2]);
	$load->view('website/footer');
}
elseif($plugin=='court-book'){
	$input = new input;
	if(!isset($_SESSION['member'])){
		redirect('/signin/');
	}
	$court = $param[2];
	if($input->post('dateOfBooking')==''){
		redirect('/court/'.$court.'/');
	}
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/court-book',$param[2]);
	$load->view('website/footer');
}
elseif($plugin=='room-book'){
	$input = new input;
	if(!isset($_SESSION['member'])){
		redirect('/signin/');
	}
	$room = $param[2];
	if($input->post('check_in')==''||$input->post('check_out')==''){
		redirect('/court/'.$room.'/');
	}
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/room-book',$param[2]);
	$load->view('website/footer');
}
elseif($plugin=='booking'){
	$step=$param[2];
	if($step=='confirm'){
		$input = new input;
		$court = $input->post('court');
		if($input->post('timeSlot')==''){
			redirect('/court/'.$court.'/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/confirm');
		$load->view('website/footer');
	}
	if($step=='payment'){
		if(!isset($_SESSION['invoice'])){
			redirect('/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/invoice');
		$load->view('website/footer');
	}
	if($step=='success'){
		if(!isset($_SESSION['invoice'])){
			redirect('/');
		}
		$load->view('website/meta');
		$load->view('website/common-header');
		$load->view('website/success');
		$load->view('website/footer');
	}
}
elseif($plugin=='gallery'){
	$load->view('website/meta');
	$load->view('website/common-header');
	$load->view('website/gallery');
	$load->view('website/footer');
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
	$load->view('website/old-events');
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