<script>
function resend_invitation (id, type) {
	fetch ('<?php echo site_url (); ?>coaching/user_actions/invite_by_'+type+'/'+'<?php echo $coaching_id; ?>', {
		method: 'POST',		
	}).then (function (response) {
		return response.json ();
	}).then (function (result) {
		if (result.status == true) {

		} else {
			alert ()
		}
	});
}
</script>