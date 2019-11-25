$(document).ready(function(){

	$("#password-eye").on("click", function(){
		showHidePassword();
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