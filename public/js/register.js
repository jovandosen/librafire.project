$(document).ready(function(){

	$("#password-eye").on("click", function(){
		showHidePassword();
	});

	$("#register-button").on("click", function(){
		validateRegisterData();
	});

});

function showHidePassword()
{
	var passwordEye = document.getElementById("password");

	if( passwordEye.type === "password" ){

		if( $("#password-eye").hasClass("fa-eye-slash") ){
			$("#password-eye").removeClass("fa-eye-slash");
			$("#password-eye").addClass("fa-eye");
		}

		passwordEye.type = "text";

	} else {

		if( $("#password-eye").hasClass("fa-eye") ){
			$("#password-eye").removeClass("fa-eye");
			$("#password-eye").addClass("fa-eye-slash");
		}

		passwordEye.type = "password";

	}
}

function validateRegisterData()
{
	var firstName = $("#first-name").val();
	var lastName = $("#last-name").val();
	var email = $("#email").val();
	var password = $("#password").val();

	var error = false;
	var firstNameError = '';
	var lastNameError = '';
	var emailError = '';
	var passwordError = '';

	if( firstName == '' ){
		error = true;
		firstNameError = 'First Name can not be empty.';
		$("#first-name-error-container p").text(firstNameError);
		$("#first-name").addClass("error-border");
	} else {

		var firstNameLength = firstName.length;

		if( firstNameLength < 3 ){
			error = true;
			firstNameError = 'First Name must have at least 3 characters.';
			$("#first-name-error-container p").text(firstNameError);
			$("#first-name").addClass("error-border");
		}
	}

	if( firstNameError == '' ){
		$("#first-name-error-container p").text(firstNameError);
		if( $("#first-name").hasClass("error-border") ){
			$("#first-name").removeClass("error-border");
		}
	}

	if( lastName == '' ){
		error = true;
		lastNameError = 'Last Name can not be empty.';
		$("#last-name-error-container p").text(lastNameError);
		$("#last-name").addClass("error-border");
	} else {

		var lastNameLength = lastName.length;

		if( lastNameLength < 3 ){
			error = true;
			lastNameError = 'Last Name must have at least 3 characters.';
			$("#last-name-error-container p").text(lastNameError);
			$("#last-name").addClass("error-border");
		}
	}

	if( lastNameError == '' ){
		$("#last-name-error-container p").text(lastNameError);
		if( $("#last-name").hasClass("error-border") ){
			$("#last-name").removeClass("error-border");
		}
	}

	if( email == '' ){
		error = true;
		emailError = 'Email can not be empty.';
		$("#email-error-container p").text(emailError);
		$("#email").addClass("error-border");
	} else {

		if( validateEmailAddress(email) === false ){
			error = true;
			emailError = 'Email address is not valid.';
			$("#email-error-container p").text(emailError);
			$("#email").addClass("error-border");
		}

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

}

function validateEmailAddress(email)
{
	var regularEx = /\S+@\S+\.\S+/;

	return regularEx.test(email);
}