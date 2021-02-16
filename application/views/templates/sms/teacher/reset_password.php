<?php if ($slug != '') { ?>
	Link to create new password is <?php echo base_url ('login/user/create_password/'.$slug.'/'.$user_token); ?> This link will expire in 30 minutes.
<?php } else { ?>
	Team <?php echo APP_NAME; ?>Link to create new password is <?php echo base_url ('login/teacher/create_password/'.$user_token); ?> This link will expire in 30 minutes.
	Team <?php echo APP_NAME; ?>
<?php } ?>