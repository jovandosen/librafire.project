$(document).ready(function(){

	$("#login-button").on("click", function(){
		validateLoginData();
	});

});

function validateLoginData()
{
	var email = $("#email").val();
	var password = $("#password").val();
	var userEmails = $("#email-address").val();

	var error = false;
	var emailError = '';
	var passwordError = '';

	if( email == '' ){
		error = true;
		emailError = 'Email can not be empty.';
		$("#email-error-container p").text(emailError);
		$("#email").addClass("error-border");
	} else if( validateEmailAddress(email) === false ) {
		error = true;
		emailError = 'Email address is not valid.';
		$("#email-error-container p").text(emailError);
		$("#email").addClass("error-border");
	} else {
		userEmails = userEmails.split(",");
		var emailCount = 0;
		for( var i = 0; i < userEmails.length; i++ ){
			if( email == userEmails[i] ){
				emailCount = 1;
			}
		}
	}

	if( emailCount === 0 ){
		error = true;
		emailError = 'Email does not exist.';
		$("#email-error-container p").text(emailError);
		$("#email").addClass("error-border");
	}

	if( emailError == '' ){
		$("#email-error-container p").text(emailError);
		if( $("#email").hasClass('error-border') ){
			$("#email").removeClass('error-border');
		}
	}

	if( password == '' ){
		error = true;
		passwordError = 'Password can not be empty.';
		$("#password-error-container p").text(passwordError);
		$("#password").addClass("error-border");
	} else {

		passwordLength = password.length;

		if( passwordLength < 5 ){
			error = true;
			passwordError = 'Password must have at least 5 characters.';
			$("#password-error-container p").text(passwordError);
			$("#password").addClass("error-border");
		}

	}

	if( passwordError == '' ){
		$("#password-error-container p").text(passwordError);
		if( $("#password").hasClass("error-border") ){
			$("#password").removeClass("error-border");
		}
	}

	if( error === false ){
		$("#login-form").submit();
	}

}