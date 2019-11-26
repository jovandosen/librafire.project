$(document).ready(function(){

	$("#user-details-wrapper, #user-details-links").mouseover(function(){
		$("#user-details-links").css({"display":"block"});
	});

	$("#user-details-wrapper, #user-details-links").mouseout(function(){
		$("#user-details-links").css({"display":"none"});
	});

});