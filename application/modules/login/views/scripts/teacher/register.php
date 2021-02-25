<script>
$('#show-password').on ('click', function () {
	const password = $("#reg-password");
	const password_text = $("#show-password-link");
	const password_icon = $("#password-icon");
	if (password.attr('type') === "password") {
	    password.attr('type','text');
	    password_icon.addClass('fa-eye-slash').removeClass('fa-eye');
	    password_text.text('Hide Password');
	} else {
		password.attr('type','password');
		password_icon.removeClass('fa-eye-slash').addClass('fa-eye');
	    password_text.text('Show Password');
	}
});

//

$('#btn-send-otp').on ('click', function (e) {
	
	const formSelector 		= document.getElementById('basic-info-form');
	const formURL 			= '<?php echo site_url ('api/account_actions/validate_user_mobile'); ?>';
	var formData 			= new FormData(formSelector);
	e.preventDefault ();

	toastr.clear ();
	fetch (formURL, {
		method : 'POST',
		body: formData,
	}).then (function (response) {
		return response.json ();
	}).then(function(result) {
		if (result.status == true) {
			// Show success message
			toastr.success (result.message, '', {timeOut:3000});
			// Add OTP input box
			$('#otp-field').removeClass ('d-none');
			// Change button text
			$('#btn-send-otp').html ('Resend OTP');
			// Disable button
			$('#btn-send-otp').prop('disabled', true);
			// Enable after 1 minute
			setTimeout (function () { 
				$('#btn-send-otp').prop('disabled', false); 
			}, 60000);
		} else {
			toastr.error (result.error, '', {timeOut:3000});
		}
	});
});



function validate_otp (otp) {
	
	const formSelector 		= document.getElementById('basic-info-form');
	const formURL 			= '<?php echo site_url ('api/account_actions/validate_otp'); ?>';
	var formData 			= new FormData (formSelector);
	
	if (otp.length == 6) {
		toastr.clear ();
		fetch (formURL, {
			method : 'POST',
			body: formData,
		}).then (function (response) {
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				// Show success message
				toastr.success (result.message, '', {timeOut:3000});
				// Disable button
				$('#primary_contact').prop ('readonly', true);
				$('#mobile-otp').prop ('disabled', true);
				$('#btn-send-otp').addClass ('d-none');
				// Add OTP input box
				$('#login-field').removeClass ('d-none');
				$('#create-password-selector').removeClass ('d-none');
			} else {
				toastr.error (result.error, '', {timeOut:3000});
			}
		});
	}
}


const basicformSelector = document.getElementById('basic-info-form');
basicformSelector.addEventListener ('submit', e => {
	e.preventDefault ();
	const formURL = basicformSelector.getAttribute ('action');
	var formData = new FormData(basicformSelector);
	toastr.clear ();
	fetch (formURL, {
		method : 'POST',
		body: formData,
	}).then (function (response) {
		return response.json ();
	}).then(function(result) {
		toastr.clear ();
		if (result.status == true) {
			// Show success message
			toastr.success (result.message, '', {timeOut:3000});
			$('#step-1').addClass ('d-none');
			// Add OTP input box
			$('#step-2').removeClass ('d-none');
			$('#member_id').val (result.member_id);
		} else {
			toastr.error (result.error, '', {timeOut:3000});
		}

	});
});

/* STEP 2 VERIFICATION */

$('#url-selector'). on ('keyup', function () {

	const formSelector 		= document.getElementById('account-info-form');
	const urlSelector 		= $('#display-url').val ();
	const formURL 			= '<?php echo site_url ('api/account_actions/is_unique_url'); ?>';
	var formData 			= new FormData(formSelector);
	if (urlSelector.length > 3) {
		toastr.clear ();
		fetch (formURL, {
			method : 'POST',
			body: formData,
		}).then (function (response) {
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				// Show success message
				toastr.success (result.message, '', {timeOut:3000});
			} else {
				toastr.error (result.error, '', {timeOut:3000});
			}
		});	
	}
});

const accountformSelector = document.getElementById('account-info-form');
accountformSelector.addEventListener ('submit', e => {
	e.preventDefault ();
	const formURL = accountformSelector.getAttribute ('action');
	var formData = new FormData(accountformSelector);
	toastr.clear ();
	fetch (formURL, {
		method : 'POST',
		body: formData,
	}).then (function (response) {
		return response.json ();
	}).then(function(result) {
		toastr.clear ();
		if (result.status == true) {
			// Show success message
			toastr.success (result.message, '', {timeOut:3000});
			if (result.redirect) {
				document.location = result.redirect;
			}
		} else {
			toastr.error (result.error, '', {timeOut:3000});
		}

	});
});

</script>