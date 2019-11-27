$(document).ready(function(){

	//

});

function hideShowPassword(element)
{
	var obj = $(element).parent().find('input');

	var id = $(element).attr("id");
	
	var field = obj[0];

	if( field.type === "password" ){

		if( $(element).hasClass("fa-eye-slash") ){
			$(element).removeClass("fa-eye-slash");
			$(element).addClass("fa-eye");
		}

		field.type = "text";

	} else {

		if( $(element).hasClass("fa-eye") ){
			$(element).removeClass("fa-eye");
			$(element).addClass("fa-eye-slash");
		}

		field.type = "password";

	}
}