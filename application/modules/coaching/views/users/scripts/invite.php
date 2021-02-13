<script>
function resend_invitation(id, type) {
  fetch('<?php echo site_url ('coaching/user_actions/resend_invite/'.$coaching_id); ?>/' + id + '/' + type, {
    method: 'POST',
  }).then(function(response) {
    return response.json();
  }).then(function(result) {
    if (result.status == true) {
      toastr.success(result.message);
    } else {
      toastr.error('There was an error sending invitation. Try again.');
    }
  });
}

function delete_invitation(invite_id) {
  fetch('<?php echo site_url ('coaching/user_actions/delete_invite/'.$coaching_id); ?>/' + invite_id, {
    method: 'POST',
  }).then(function(response) {
    return response.json();
  }).then(function(result) {
    if (result.status == true) {
      toastr.success(result.message);
    } else {
      toastr.error('There was an error delete invitation. Try again.');
    }
  });
}
</script>