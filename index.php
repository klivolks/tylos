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
		
	}
		elseif($sub_page=='news'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','news');
		$load->view('admin/news');
		
	}
	elseif($sub_page=='all-news'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','all-news');
		$load->view('admin/all-news');
		
	}
	elseif($sub_page=='all-booking'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','all-booking');
		$load->view('admin/all-booking');
		
	}
	elseif($sub_page=='booking-details'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','booking-details');
		$load->view('admin/booking-details');
		
	}
	elseif($sub_page=='inventory'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','inventory');
		$load->view('admin/inventory');
		
	}
	elseif($sub_page=='add-rooms'){
		if(check_session()==0){
			header('Location: /admin/login/');
		}
		$load->view('admin/meta');
		$load->view('admin/header');
		$load->view('admin/sidebar','add-rooms');
		$load->view('admin/add-rooms');
		
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