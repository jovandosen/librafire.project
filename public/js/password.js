$(document).ready(function(){

	$("#update-password").on("click", function(){
		validatePasswordUpdate();
	});

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

function validatePasswordUpdate()
{
	var currentPassword = $("#current-password").val();
	var newPassword = $("#new-password").val();
	var newPasswordRepeat = $("#new-password-repeat").val();

	var error = false;
	var currentPasswordError = '';
	var newPasswordError = '';
	var newPasswordRepeatError = '';

	if( currentPassword == '' ){
		error = true;
		currentPasswordError = 'Current Password can not be empty.';
		$("#current-password-container-error p").text(currentPasswordError);
		$("#current-password").addClass("error-wrapper");
	} else {
		var currentPasswordLength = currentPassword.length;
		if( currentPasswordLength < 5 ){
			error = true;
			currentPasswordError = 'Current Password must have at least 5 characters.';
			$("#current-password-container-error p").text(currentPasswordError);
			$("#current-password").addClass("error-wrapper");
		}
	}

	if( currentPasswordError == '' ){
		$("#current-password-container-error p").text(currentPasswordError);
		if( $("#current-password").hasClass("error-wrapper") ){
			$("#current-password").removeClass("error-wrapper");
		}
	}

	if( newPassword == '' ){
		error = true;
		newPasswordError = 'New Password can not be empty.';
		$("#new-password-container-error p").text(newPasswordError);
		$("#new-password").addClass("error-wrapper");
	} else {
		var newPasswordLength = newPassword.length;
		if( newPasswordLength < 5 ){
			error = true;
			newPasswordError = 'New Password must have at least 5 characters.';
			$("#new-password-container-error p").text(newPasswordError);
			$("#new-password").addClass("error-wrapper");
		}
	}

	if( newPasswordError == '' ){
		$("#new-password-container-error p").text(newPasswordError);
		if( $("#new-password").hasClass("error-wrapper") ){
			$("#new-password").removeClass("error-wrapper");
		}
	}

	if( newPasswordRepeat == '' ){
		error = true;
		newPasswordRepeatError = 'Password Repeat can not be empty.';
		$("#new-password-repeat-container-error p").text(newPasswordRepeatError);
		$("#new-password-repeat").addClass("error-wrapper");
	} else {
		var newPasswordRepeatLength = newPasswordRepeat.length;
		if( newPasswordRepeatLength < 5 ){
			error = true;
			newPasswordRepeatError = 'Password Repeat must have at least 5 characters.';
			$("#new-password-repeat-container-error p").text(newPasswordRepeatError);
			$("#new-password-repeat").addClass("error-wrapper");
		}
	}

	if( newPasswordRepeatError == '' ){
		$("#new-password-repeat-container-error p").text(newPasswordRepeatError);
		if( $("#new-password-repeat").hasClass("error-wrapper") ){
			$("#new-password-repeat").removeClass("error-wrapper");
		}
	}

	if( error === false ){
		$("#password-form").submit();
	}

}