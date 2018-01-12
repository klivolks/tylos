// JavaScript Document
$(function(){
	$('.trending-wrap').multislider({
		interval: 2000
	});
	$('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 15, 
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false
  });
	$('.materialboxed').materialbox();
});
function prev_slide(){ 
	$('.trending-wrap').multislider('prev'); 
}
function next_slide(){ 
	$('.trending-wrap').multislider('next'); 
}