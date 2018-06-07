// JavaScript Document
$(function(){
	var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);
	$('.datepicker').pickadate({
	disable: [
    	{ from: [0,0,0], to: yesterday }
  	],
    selectMonths: true,
    selectYears: 15, 
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false
  });
	var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);
	$('.dob').pickadate({
    selectMonths: true,
    selectYears: 15, 
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false
  });
	$('.timepicker').pickatime({
    default: 'now', 
	interval: 60,
    twelvehour: true, 
    donetext: 'OK', 
    cleartext: 'Clear', 
    canceltext: 'Cancel', 
    autoclose: false, 
    ampmclickable: true
  });
	$('.materialboxed').materialbox();
	$('body').css('display', 'none');
	$('body').fadeIn(200);
	$('a').click(function(e) {
		e.preventDefault();
		newLocation = this.href;
		var currentLocation =window.location.href+"#";
		if(newLocation!=currentLocation){
			$('body').fadeOut(200, newpage);
		}
	});
	if ((/iphone|ipod|ipad.*os 5/gi).test(navigator.appVersion)) {
		window.onpageshow = function(evt) {
			if (evt.persisted) {
				document.body.style.display = "none";
				location.reload();
			}
		};
	}
	$('select').material_select();
	$(".daterange").daterangepicker({
		minDate: new Date(),
		autoUpdateInput: false,
		locale: {
		  format: 'D MMMM, Y'
		}
	});
	$('.daterange').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('D MMMM, Y') + ' - ' + picker.endDate.format('D MMMM, Y'));
  });
	$(".button-collapse").sideNav();
});
function prev_slide(){ 
	$('.trending-wrap').multislider('prev'); 
}
function next_slide(){ 
	$('.trending-wrap').multislider('next'); 
}
function newpage() {
window.location = newLocation;
}
function Reload() {
	try {
		var headElement = document.getElementsByTagName("head")[0];
		if (headElement && headElement.innerHTML)
		headElement.innerHTML += "<meta http-equiv=\"refresh\" content=\"1\">";
	}
	catch (e) {}
}
function socialMediaLogin(){
	ocalogin(function(response){
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
function Klubstasignin(){
	var callbackURL = $("#callbackURL").val();
	ocalogin(function(response){
		$.ajax({
			url:"/functions/klubsta-signin/",
			method:"post",
			type:"post",
			data:{
				klubstaId : response.user_id
			},
			success:function(data){
				if(data==='error'){
					window.location.assign('/register/?msg=notregistered&callbackURL='+callbackURL);
				}
				else{
					if(callbackURL!=null){
						window.location.assign('/list/court/?callbackURL='+callbackURL);
					}
					else{
						window.location.assign('/');
					}
				}
			}
		});
	});
}
function add_price(price){
	$("#price").vale(price);
}
function verify_input(field){
	if($("#"+field).val()==''){
		if(field=='dateOfBooking'){
			$("#msg").html('<div class="card card-panel red white-text">Select date of booking to continue</div>');
		}
		if(field=='check_in'){
			$("#msg").html('<div class="card card-panel red white-text">Select check in and check out dates to continue</div>');
		}
		return false;
		
	}
	else{
		return true;
	}
}
function activate_tab(n){
	$("#tab-1").hide();
	$("#tab-2").hide();
	$("#tab-3").hide();
	$("#tab-"+n).show(500);
	$(".icon").removeClass('active');
	$("#icon-"+n).addClass('active');
}
function scrolltoquick(){
	var scroll = parseInt($(".quick-book").offset().top);
	$("html, body").animate({ scrollTop: scroll }, 1000);
}
function select_slot(slot,court){
	$(".slot").removeClass('active');
	$("#slot_"+slot).addClass('active');
	$("#court").val(court);
	$("#timeSlot").val(slot);
	$("#book-btn").show();
	var scroll = parseInt($("#book-btn").offset().top);
	$("html, body").animate({ scrollTop: scroll }, 1000);
}
function validate_reg(event){
	var nam = $("#FullName").val();
	var phone = $("#Phone").val();
	if(!(/^[a-zA-Z_ ]*$/.test(nam))){
		$(".msg").html('Use only letters for FullName');
		$("#FullName").addClass('invalid');
		return false;
	}
	else if(!(/^[0-9]*$/.test(phone))&&phone<999999999999){
		$(".msg").html('Use only numbers maximum of 12 digits for phone');
		$("#Phone").addClass('invalid');
		return false;
	}
	else if($("#Password").val()!=$("#RetypePassword").val()){
		$(".msg").html("Passwords doesn\'t match");
		return false;
	}
}