// JavaScript Document
$(function(){
	"use strict";
	clock();
	setInterval(function(){clock();},1000);
	 $('select').material_select();
	$('.collapsible').collapsible();
});
function clock()
{
	"use strict";
	var d= new Date();
    var h=d.getHours();
	var m=d.getMinutes();
	var s=d.getSeconds();
	var a;
	if(h>12){
		h=h-12;
		a=" PM";
	}
	else{
		a=" AM";
	}
	if(m<10){
		m= "0"+m;
	}
	if(s<10){
		s= "0"+s;
	}
	$(".time").html(h + ":" + m + ":" + s + a);
}
function menu_toggle(){
	"use strict";
	var status=$(".sidebar").css("display");
	if(status==='none'){
		$(".sidebar").css('display','block');
		$(".sidebar").removeClass('hide-on-small-only');
		$(".content-body").removeClass('m12');
		$(".content-body").addClass('m8');
	}
	else{
		$(".sidebar").css('display','none');
		$(".content-body").removeClass('m8');
		$(".content-body").addClass('m12');
	}
}