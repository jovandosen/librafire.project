$(document).ready(function(){

	$("#profile-update-button").on("click", function(){
		validateProfileData();
	});

	getEmails();

});

function validateProfileData()
{
	var firstName = $("#first-name-profile").val();
	var lastName = $("#last-name-profile").val();
	var email = $("#email-profile").val();
	var userEmails = $("#email-address").val();
	var hiddenEmail = $("#hidden-email").val();

	var error = false;
	var firstNameError = '';
	var lastNameError = '';
	var emailError = '';

	if( firstName == '' ){
		error = true;
		firstNameError = 'First Name can not be empty.';
		$("#profile-first-name-error p").text(firstNameError);
		$("#first-name-profile").addClass("error-border-profile");
	} else {

		var firstNameLength = firstName.length;

		if( firstNameLength < 3 ){
			error = true;
			firstNameError = 'First Name must have at least 3 characters.';
			$("#profile-first-name-error p").text(firstNameError);
			$("#first-name-profile").addClass("error-border-profile");
		}
	}

	if( firstNameError == '' ){
		$("#profile-first-name-error p").text(firstNameError);
		if( $("#first-name-profile").hasClass("error-border-profile") ){
			$("#first-name-profile").removeClass("error-border-profile");
		}
	}

	if( lastName == '' ){
		error = true;
		lastNameError = 'Last Name can not be empty.';
		$("#profile-last-name-error p").text(lastNameError);
		$("#last-name-profile").addClass("error-border-profile");
	} else {

		var lastNameLength = lastName.length;

		if( lastNameLength < 3 ){
			error = true;
			lastNameError = 'Last Name must have at least 3 characters.';
			$("#profile-last-name-error p").text(lastNameError);
			$("#last-name-profile").addClass("error-border-profile");
		}

	}

	if( lastNameError == '' ){
		$("#profile-last-name-error p").text(lastNameError);
		if( $("#last-name-profile").hasClass("error-border-profile") ){
			$("#last-name-profile").removeClass("error-border-profile");
		}
	}

	if( email == '' ){
		error = true;
		emailError = 'Email can not be empty.';
		$("#profile-email-error p").text(emailError);
		$("#email-profile").addClass("error-border-profile");
	} else if( validateEmailAddress(email) === false ){
		error = true;
		emailError = 'Email address is not valid.';
		$("#profile-email-error p").text(emailError);
		$("#email-profile").addClass("error-border-profile");
	} else {
		userEmails = userEmails.split(",");
		
		userEmails = userEmails.filter(function(item){
			return item !== hiddenEmail;
		});

		for( var i = 0; i < userEmails.length; i++ ){
			if( email == userEmails[i] ){
				error = true;
				emailError = 'Email already exists.';
				$("#profile-email-error p").text(emailError);
				$("#email-profile").addClass("error-border-profile");
			}
		}

	}

	if( emailError == '' ){
		$("#profile-email-error p").text(emailError);
		if( $("#email-profile").hasClass("error-border-profile") ){
			$("#email-profile").removeClass("error-border-profile");
		}
	}

	if( error === false ){
		$("#profile-form").submit();
	}

}

function validateEmailAddress(email)
{
	var regularEx = /\S+@\S+\.\S+/;

	return regularEx.test(email);
}

function getEmails()
{
	$.ajax({
		url: "/emails",
		method: "POST",
		success: function(response){
			if( response ){
				var emails = JSON.parse(response);
				$("#email-address").val(emails);
			} else {
				$("#email-address").val('');
			}
		},
		error: function(){
			console.log('Error');
		}
	});
}