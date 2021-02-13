<?php
function is_404($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    /* Get the HTML or whatever is linked in $url. */
    $response = curl_exec($handle);

    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);

    /* If the document has loaded successfully without any redirection or error */
    if ($httpCode >= 200 && $httpCode < 300) {
        return false;
    } else {
        return true;
    }
}
?>
<?php if ( ! empty ($results)): ?>
<?php foreach ($results as $i => $row): ?>
<div class="card d-flex flex-row mb-3 pl-1">
  <div class="d-flex flex-grow-1 min-width-zero pl-4">
    <label class="custom-control custom-checkbox mb-1 align-self-center pr-1">
      <input type="checkbox" name="mycheck[]" value="<?php echo $row['member_id']; ?>"
        class="custom-control-input user-check" />
      <span class="custom-control-label">&nbsp;</span>
    </label>
    <span class="align-self-center heading-icon px-1" style="font-size:0.8rem;"><?php echo $i+1; ?>-</span>
    <div
      class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center pl-0">
      <div class=" w-30 w-xs-100 truncate d-block d-md-flex">
        <div class="heading-icon media-left pr-2 d-none" style="font-size:0.8rem;"><?php echo $i+1; ?> - </div>
        <div class="media-left pr-2">
          <?php
          if(is_404(site_url ('contents/users/pi_'.$row['member_id'].'.gif'))){ ?>
          <img src="<?php echo site_url ('contents/users/default.png'); ?>" alt="User Avatar"
            class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
          <?php } else { ?>
          <img src="<?php echo site_url ('contents/users/pi_'.$row['member_id'].'.gif'); ?>" alt=""
            class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
          <?php }
        ?>

        </div>
        <div class="media-right">
          <a class="list-item-heading mb-0 truncate btn-link"
            href="<?php echo site_url ('coaching/users/edit/'.$coaching_id.'/'.$row['role_id'].'/'.$row['member_id']); ?>">
            <?php echo ($row['first_name']) .' '. ($row['second_name']) .' '. ($row['last_name']); ?>
          </a>
          <br />
          <p class="m-0"><?php echo $row['adm_no']; ?></p>
        </div>

      </div>
      <p class="mb-0 w-20 w-xs-100 mb-2 m-md-0">
        <i class="iconsminds-mail-link pr-1"></i>

        <?php
          if($row['email'] == ""){
            echo "Not Updated";
          }
          else{
              echo $row['email'];
          }

        ?>
      </p>
      <p class="mb-0 w-20 w-xs-100 mb-2 m-md-0">
        <i class="simple-icon-phone pr-2"></i>
        <?php echo $row['primary_contact']; ?>
      </p>

      <div class="w-10 w-xs-100">
        <?php if ($row['status'] == USER_STATUS_ENABLED) { ?>
        <span class="badge badge-success">Enabled</span>
        <?php } else if ($row['status'] == USER_STATUS_UNCONFIRMED) { ?>
        <span class="badge badge-warning">Pending</span>
        <?php } else if ($row['status'] == USER_STATUS_DISABLED) { ?>
        <span class="badge badge-danger">Disabled</span>
        <?php } ?>
      </div>
      <div class="dropdown w-20 w-xs-100 text-left text-md-right mt-2 mt-md-0">
        <a class="btn btn-primary btn-sm mb-1 text-white dropdown-toggle" type="button"
          id="userMenu<?php echo $row['member_id'];?>" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Action</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu<?php echo $row['member_id'];?>">
          <?php echo anchor('coaching/users/edit/'.$coaching_id.'/'.$row['role_id'].'/'.$row['member_id'], '<i class="fa fa-edit"></i> Profile', array('title'=>'Edit', 'class'=>'dropdown-item')); ?>
          <?php if ( $row['status'] == USER_STATUS_ENABLED ) { ?>
          <a href="javascript:void(0)"
            onclick="javascript:show_confirm ( '<?php echo 'Do you want to disable this user?'; ?>', '<?php echo site_url('coaching/user_actions/disable_member/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>' )"
            title="Disable" class="dropdown-item"><i class="fa fa-times-circle"></i> Disable Account</a>
          <?php } else if ( $row['status'] == USER_STATUS_DISABLED ) { ?>
          <a href="javascript:void(0)"
            onclick="javascript:show_confirm ( '<?php echo 'Do you want to enable this user?'; ?>', '<?php echo site_url('coaching/user_actions/enable_member/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>' )"
            class="dropdown-item"><i class="fa fa-check-circle"></i> Enable Account</a>
          <?php } else if ($row['status'] == USER_STATUS_UNCONFIRMED) { ?>
          <a href="javascript:void(0)"
            onclick="javascript:show_confirm ( '<?php echo 'Do you want to approve this user?'; ?>', '<?php echo site_url('coaching/user_actions/enable_member/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>' )"
            class="dropdown-item"><i class="fa fa-check-circle"></i> Approve</a>
          <?php } ?>
          <?php //echo anchor('coaching/users/member_log/'.$coaching_id.'/'.$role_id.'/'.$row['member_id'], '<i class="fa fa-info-circle"></i> Member Log', array ('class'=>'dropdown-item') ); ?>
          <?php echo anchor('coaching/users/change_password/'.$coaching_id.'/'.$row['member_id'], '<i class="fa fa-key"></i> Change Password', array ('class'=>'dropdown-item')); ?>
          <a href="javascript:void(0)"
            onclick="show_confirm ('<?php echo 'Are you sure want to delete this users?' ; ?>','<?php echo site_url('coaching/user_actions/delete_account/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>' )"
            class="dropdown-item"><i class="fa fa-trash"></i> Delete Account</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php else: ?>
<div class="alert alert-danger" role="alert">
  <span class="text-danger">No users found</span>
</div>
<?php endif; ?>