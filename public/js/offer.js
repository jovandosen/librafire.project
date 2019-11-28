$(document).ready(function(){

	$("#offer-button").on("click", function(){
		validateOfferData();
	});

});

function validateOfferData()
{
	var offer = $("#offer").val();

	var error = false;
	var offerError = '';

	if( offer == '' ){
		error = true;
		offerError = 'Offer can not be empty.';
		$("#offer-error-container p").text(offerError);
		$("#offer").addClass("offer-error-wrapper");
	} else {
		var minPrice = $("#minPrice").val();
		offer = parseInt(offer);
		minPrice = parseInt(minPrice);
		if( offer < minPrice ){
			error = true;
			offerError = 'Offer can not be lower than Price.';
			$("#offer-error-container p").text(offerError);
			$("#offer").addClass("offer-error-wrapper");
		}
	}

	if( offerError == '' ){
		$("#offer-error-container p").text(offerError);
		if( $("#offer").hasClass("offer-error-wrapper") ){
			$("#offer").removeClass("offer-error-wrapper");
		}
	}

	if( error === false ){
		$("#offer-form").submit();
	}
}