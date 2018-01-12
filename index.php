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
	else{
		if(check_session()==1){
			header('Location: /admin/dashboard/');
		}
		else{
			$load->view('admin/login');
		}
	}
}
else{
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
}
?>