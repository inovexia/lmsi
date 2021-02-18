<script>
$(document).ready (function () {
	$('#resend_confirmation').on ('click', function(e) {
		e.preventDefault ();
		var x = confirm ('Password will be reset and send to user.');
		if (x) {
			var url = '<?php echo site_url ('coaching/user_actions/send_otp/'.$coaching_id.'/'.$member_id);?>';
			fetch (url, {
				method : 'POST',
				body: url,
			}).then (function (response) {
				return response.json ();
			}).then(function(result) {
				toastr.success (result.message);
			});
		}
	});

	$('#send_password_link').on ('click', function(e) {
		e.preventDefault ();
		var x = confirm ('Send self-password creation link on user email and mobile?');
		if (x) {
			var url = '<?php echo site_url ('coaching/user_actions/create_password_link/'.$coaching_id.'/'.$member_id);?>';
			fetch (url, {
				method : 'POST',
				body: url,
			}).then (function (response) {
				return response.json ();
			}).then(function(result) {
				toastr.success (result.message);
			});
		}
	});

});
</script>