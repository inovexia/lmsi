<?php 
  if ( ! empty ($results)):
    foreach ($results as $i => $row):
      $name =  $row['first_name'] .' '. $row['second_name'] .' '. $row['last_name'];
      ?>
<div class="card d-flex flex-row mb-3 pl-4 align-middle">
  <label class="custom-control custom-checkbox mb-1 align-self-center ">
    <input type="checkbox" class="custom-control-input">
    <span class="custom-control-label">&nbsp;</span>
  </label>
  <a class="d-flex flex-shrink-1 align-self-center"
    href="<?php echo site_url ('coaching/users/edit/'.$coaching_id.'/'.$row['role_id'].'/'.$row['member_id']); ?>">
    <?php 
              $pi = $row['pi'];
              if ($pi['type'] == 'avatar') {
                ?>
    <div class="rounded-circle m-0 align-self-center list-thumbnail-letters small text-uppercase">
      <?php echo $pi['path']; ?>
    </div>
  </a>
  <?php
              } else {
                ?>
  <img src="<?php echo $pi['path']; ?>" alt="<?php echo $name; ?>" class="rounded-circle align-self-center" width="40"
    height="40" />
  <?php
              }
              ?>
  </a>
  <div class="d-flex flex-grow-1 min-width-zero">
    <div
      class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center px-2 px-md-4">

      <a href="<?php echo site_url ('coaching/users/edit/'.$coaching_id.'/'.$row['role_id'].'/'.$row['member_id']); ?>"
        class="w-40 w-sm-100">
        <p class="list-item-heading mb-0 truncate">
          <?php echo ($row['first_name']) .' '. ($row['second_name']) .' '. ($row['last_name']); ?>
          <br>
          <?php echo $row['adm_no']; ?>
        </p>
      </a>

      <p class="mb-0 text-muted text-small w-15 w-sm-100 d-inline-block">
        <span class="d-flex py-2">
          <i class="simple-icon-phone pr-2"></i>
          <?php echo $row['primary_contact']; ?>
        </span>
        <span class="d-flex pb-2">
          <?php if ($row['email']) { ?>
          <i class="simple-icon-envelope pr-2"></i>
          <?php echo $row['email']; ?>
          <?php } ?>
        </span>
      </p>
      <p class="mb-0 text-muted text-small w-15 w-sm-100"></p>
      <div class="w-15 w-sm-100">
        <?php if ($row['status'] == USER_STATUS_ENABLED) { ?>
        <span class="badge badge-success">Enabled</span>
        <?php } else if ($row['status'] == USER_STATUS_UNCONFIRMED) { ?>
        <span class="badge badge-warning">Pending</span>
        <?php } else if ($row['status'] == USER_STATUS_DISABLED) { ?>
        <span class="badge badge-danger">Disabled</span>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="custom-control custom-checkbox mb-1 align-self-center pr-0 pr-md-3">

    <div class="dropdown w-20 w-xs-100 text-left text-md-right mt-2 mt-md-0">
      <a class="btn btn-link btn-xs mb-1 dropdown-toggle pl-0" type="button"
        id="userMenu<?php echo $row['member_id'];?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="simple-icon-options-vertical"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu<?php echo $row['member_id'];?>">
        <?php echo anchor('coaching/users/edit/'.$coaching_id.'/'.$row['role_id'].'/'.$row['member_id'], '<i class="simple-icon-pencil pr-2"></i> Edit User', array('title'=>'Edit', 'class'=>'dropdown-item')); ?>
        <?php echo anchor('coaching/users/courses/'.$coaching_id.'/'.$row['role_id'].'/'.$row['member_id'], '<i class="simple-icon-book-open pr-2"></i> Enroll In Courses', array('title'=>'Enroll In Courses', 'class'=>'dropdown-item')); ?>

        <?php if ( $row['status'] == USER_STATUS_ENABLED ) { ?>
        <a href="javascript:void(0)"
          onclick="javascript:show_confirm ( '<?php echo 'Do you want to disable this user?'; ?>', '<?php echo site_url('coaching/user_actions/disable_member/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>')"
          title="Disable" class="dropdown-item"><i class="simple-icon-user-unfollow pr-2"></i> Disable User</a>
        <?php } else if ( $row['status'] == USER_STATUS_DISABLED ) { ?>
        <a href="javascript:void(0)"
          onclick="javascript:show_confirm ( '<?php echo 'Do you want to enable this user?'; ?>', '<?php echo site_url('coaching/user_actions/enable_member/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>' )"
          class="dropdown-item"><i class="simple-icon-user-following pr-2"></i> Enable User</a>
        <?php } else if ($row['status'] == USER_STATUS_UNCONFIRMED) { ?>
        <a href="javascript:void(0)"
          onclick="javascript:show_confirm ( '<?php echo 'Do you want to approve this user?'; ?>', '<?php echo site_url('coaching/user_actions/enable_member/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>' )"
          class="dropdown-item"><i class="fa fa-check-circle pr-2"></i> Approve</a>
        <?php } ?>
        <?php //echo anchor('coaching/users/member_log/'.$coaching_id.'/'.$role_id.'/'.$row['member_id'], '<i class="fa fa-info-circle"></i> Member Log', array ('class'=>'dropdown-item') ); ?>
        <?php echo anchor('coaching/users/change_password/'.$coaching_id.'/'.$row['member_id'], '<i class="iconsminds-key-lock pr-2"></i> Change Password', array ('class'=>'dropdown-item')); ?>
        <a href="javascript:void(0)"
          onclick="show_confirm ('<?php echo 'Are you sure want to delete this users?' ; ?>','<?php echo site_url('coaching/user_actions/delete_account/'.$coaching_id.'/'.$role_id.'/'.$row['member_id']); ?>' )"
          class="dropdown-item"><i class="simple-icon-trash pr-2"></i> Delete User</a>
      </div>
    </div>
  </div>
</div>
<?php 
    endforeach;
  else: 
    ?>
<div class="card" role="">
  <div class="card-body text-center" role="">
    <h4 class="card-title">No users found</h4>
    <?php echo anchor ('coaching/user/invite/'.$coaching_id); ?>
  </div>
</div>
<?php
  endif;
?>