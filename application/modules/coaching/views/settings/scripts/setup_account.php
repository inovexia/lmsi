<script>
	$('#url-selector'). on ('keyup', function () {

	const formSelector 		= document.getElementById('account-info-form');
	const formURL 			= '<?php echo site_url ('api/account_actions/is_unique_url'); ?>';
	var formData 			= new FormData(formSelector);

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
});
</script>