$(function() {

	$("#name_error_message").hide();
	$("#firstname_error_message").hide();
	$("#password_error_message").hide();
	$("#passwordconfirm_error_message").hide();
	$("#email_error_message").hide();

	var error_name = false;
	var error_firstname = false;
	var error_password = false;
	var error_passwordconfirm = false;
	var error_email = false;

	$("#form_name").focusout(function() {

		check_name();
		
	});

	$("#form_firstname").focusout(function() {

		check_firstname();
		
	});

	$("#form_password").focusout(function() {

		check_password();
		
	});

	$("#form_passwordconfirm").focusout(function() {

		check_passwordconfirm();
		
	});

	$("#form_email").focusout(function() {

		check_email();
		
	});

	function check_name() {
	
		var name_length = $("#form_name").val().length;
		
		if(name_length < 5 || name_length > 20) {
			$("#name_error_message").html("Should be between 5-20 characters");
			$("#name_error_message").show();
			error_name = true;
		} else {
			$("#name_error_message").hide();
		}
	}

	function check_firstname() {
	
		var firstname_length = $("#form_firstname").val().length;
		
		if(firstname_length < 5 || firstname_length > 20) {
			$("#firstname_error_message").html("Should be between 5-20 characters");
			$("#firstname_error_message").show();
			error_firstname = true;
		} else {
			$("#firstname_error_message").hide();
		}
	
	}

	function check_password() {
	
		var password_length = $("#form_password").val().length;
		var patternPassword = new RegExp($/\A(?=[\x20-\x7E]*?[A-Z])(?=[\x20-\x7E]*?[a-z])(?=[\x20-\x7E]*?[0-9])[\x20-\x7E]{6,}\z/i);
		
		if(password_length < 8) {
			$("#password_error_message").html("At least 8 characters");
			$("#password_error_message").show();
			error_password = true;
		} 

		else if ($password =! patternPassword) {
			$("#password_error_message").html("At least 1 Upper case, 1 lower case and 1 digit");
			$("#password_error_message").show();
		}


		else {
			$("#password_error_message").hide();
		}
	
	}

	function check_passwordconfirm() {
	
		var password = $("#form_password").val();
		var passwordconfirm = $("#form_passwordconfirm").val();
		
		if(password !=  passwordconfirm) {
			$("#passwordconfirm_error_message").html("Passwords don't match");
			$("#passwordconfirm_error_message").show();
			error_passwordconfirm = true;
		} else {
			$("#passwordconfirm_error_message").hide();
		}
	
	}

	function check_email() {

		var patternMail = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	
		if(pattern.test($("#form_email").val())) {
			$("#email_error_message").hide();
		} else {
			$("#email_error_message").html("Invalid email address");
			$("#email_error_message").show();
			error_email = true;
		}
	
	}

	$("#registration_form").submit(function() {
											
		error_name = false;
		error_firstname = false;
		error_password = false;
		error_passwordconfirm = false;
		error_email = false;
											
		check_name();
		check_firstname();
		check_password();
		check_passwordconfirm();
		check_email();
		
		if(error_name == false && error_firstname == false && error_password == false && error_passwordconfirm == false && error_email == false) {
			return true;
		} else {
			return false;	
		}

	});

});