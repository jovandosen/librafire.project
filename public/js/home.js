$(document).ready(function(){

	$("#user-details-wrapper, #user-details-links").mouseover(function(){
		$("#user-details-links").css({"display":"block"});
	});

	$("#user-details-wrapper, #user-details-links").mouseout(function(){
		$("#user-details-links").css({"display":"none"});
	});

	checkFlashMessage();

});

function checkFlashMessage()
{
	var message = $("#flash-message-container p").text();

	if( message != '' ){
		setTimeout(function(){
			$("#flash-message-container").css({"display":"none"});
		}, 5000);
	}
}