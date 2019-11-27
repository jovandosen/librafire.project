$(document).ready(function(){

	$("#add-item").on("click", function(){
		//validateItemData();
		$("#item-form").submit();
	});

});

function validateItemData()
{
	var name = $("#name").val();
	var description = $("#description").val();
	var price = $("#price").val();
	var payment = $("#payment").val();
	var delivery = $("#delivery").val();

	var error = false;
	var nameError = '';
	var descriptionError = '';
	var priceError = '';
	var paymentError = '';
	var	deliveryError = '';

	if( name == '' ){
		error = true;
		nameError = 'Name can not be empty.';
		$("#item-name-error-container p").text(nameError);
		$("#name").addClass("error-box");
	}

	if( nameError == '' ){
		$("#item-name-error-container p").text(nameError);
		if( $("#name").hasClass("error-box") ){
			$("#name").removeClass("error-box");
		}
	}

	if( description == '' ){
		error = true;
		descriptionError = 'Description can not be empty.';
		$("#item-description-error-container p").text(descriptionError);
		$("#description").addClass("error-box");
	}

	if( descriptionError == '' ){
		$("#item-description-error-container p").text(descriptionError);
		if( $("#description").hasClass("error-box") ){
			$("#description").removeClass("error-box");
		}
	}

	if( price == '' ){
		error = true;
		priceError = 'Price can not be empty.';
		$("#item-price-error-container p").text(priceError);
		$("#price").addClass("error-box");
	}

	if( priceError == '' ){
		$("#item-price-error-container p").text(priceError);
		if( $("#price").hasClass("error-box") ){
			$("#price").removeClass("error-box");
		}
	}

	if( payment == '' ){
		error = true;
		paymentError = 'Payment can not be empty.';
		$("#item-payment-error-container p").text(paymentError);
		$("#payment").addClass("error-box");
	}

	if( paymentError == '' ){
		$("#item-payment-error-container p").text(paymentError);
		if( $("#payment").hasClass("error-box") ){
			$("#payment").removeClass("error-box");
		}
	}

	if( delivery == '' ){
		error = true;
		deliveryError = 'Delivery can not be empty.';
		$("#item-delivery-error-container").text(deliveryError);
		$("#delivery").addClass("error-box");
	}

	if( deliveryError == '' ){
		$("#item-delivery-error-container").text(deliveryError);
		if( $("#delivery").hasClass("error-box") ){
			$("#delivery").removeClass("error-box");
		}
	}

	if( error === false ){
		$("#item-form").submit();
	}

}