<div class="card">
  <div class="card-body">
    <div class="text-center">

      <?php 
        if ($pi['type'] == 'avatar') {
          ?>
      <div class="rounded-circle m-0 align-self-center list-thumbnail-letters mx-auto text-uppercase">
        <?php echo $pi['path']; ?>
      </div>
      <!-- </a> -->
      <?php
        } else {
          ?>
      <img src="<?php echo $pi['path']; ?>" alt="<?php echo $this->session->userdata ('user_name'); ?>"
        class="img-thumbnail border-0 rounded-circle mb-4 border"
        alt="<?php echo $this->session->userdata ('user_name'); ?>" />
      <?php
        }
      ?>

      <h4 class="list-item-heading mb-1 py-3" style="font-weight:bold">
        <?php echo $result['first_name'].' '.$result['last_name']; ?>
      </h4>
      <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#add_image"><i
          class="fa fa-edit"></i> Edit</button>
    </div>
  </div>

  <ul class="list-group list-group-menu user-action-menu">
    <li
      class="list-group-item border-left-0 border-right-0 user-menu-list<?php echo ($user_active_item == "create")? " bg-primary":null; ?>">
      <a class="d-block<?php echo ($user_active_item == "create")? " text-white":null; ?>"
        href="<?php echo site_url ('coaching/users/create/'.$coaching_id.'/'.$role_id.'/'.$member_id); ?>">Basic
        Details</a>
    </li>

    <li
      class="list-group-item border-left-0 border-right-0 user-menu-list<?php echo ($user_active_item == "change_password")? " bg-primary":null; ?>">
      <?php 
				$url = 'coaching/users/change_password/'.$coaching_id.'/'.$member_id;
			?>
      <a class="d-block<?php echo ($user_active_item == "change_password")? " text-white":null; ?>"
        href="<?php echo site_url ($url); ?>">Change Password</a>
    </li>

    <li
      class="list-group-item border-left-0 border-right-0 user-menu-list<?php echo ($user_active_item == "courses")? " bg-primary":null; ?>">
      <?php 
				$url = 'coaching/users/courses/'.$coaching_id.'/'.$role_id.'/'.$member_id;
			?>
      <a class="d-block<?php echo ($user_active_item == "courses")? " text-white":null; ?>"
        href="<?php echo site_url ($url); ?>">Enrolled Courses</a>
    </li>

    <li
      class="list-group-item border-left-0 border-right-0 user-menu-list<?php echo ($user_active_item == "tests_taken")? " bg-primary":null; ?>">
      <?php 
				$url = 'coaching/users/tests_taken/'.$coaching_id.'/'.$role_id.'/'.$member_id;
			?>
      <a class="d-block<?php echo ($user_active_item == "tests_taken")? " text-white":null; ?>"
        href="<?php echo site_url ($url); ?>">Tests Taken</a>
    </li>

    <?php if ($member_id <> $this->session->userdata ('member_id')) { ?>
    <li class="list-group-item border-left-0 border-right-0">
      <a href="javascript:void(0)"
        onclick="show_confirm ('<?php echo 'Are you sure want to delete this users?' ; ?>','<?php echo site_url('coaching/user_actions/delete_account/'.$coaching_id.'/'.$role_id.'/'.$member_id); ?>' )"
        class="d-block text-danger">Delete Account</a>
    </li>
    <?php } ?>
  </ul>
</div>


<!-- Add Image -->
<div class="modal" tabindex="-1" role="dialog" id="add_image">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <?php echo form_open_multipart ('coaching/user_actions/upload_profile_picture/'.$member_id.'/'.$coaching_id, array ('class'=>'form-horizontal row-border validate-form', 'id'=>'upload_image')); ?>
      <div class="modal-header">
        <h5 class="modal-title">Profile Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-12">
            <div id="profile_messages"></div>
            <div id="image_preview" class="text-center">
              <?php 
                if ($pi['type'] == 'avatar') {
                  ?>
              <div class="rounded-circle m-0 align-self-center list-thumbnail-letters ">
                <?php echo $pi['path']; ?>
              </div>
              </a>
              <?php
                } else {
                  ?>
              <img src="<?php echo $pi['path']; ?>" alt="<?php echo $this->session->userdata ('user_name'); ?>"
                class="img-thumbnail border-0 rounded-circle mb-4 border"
                alt="<?php echo $this->session->userdata ('user_name'); ?>" />
              <?php
                }
              ?>
            </div>
            <?php echo form_label('Upload Image', '', array('class'=>'control-label')); ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-outline-danger default" id="remove_image" type="button" data-toggle="tooltip"
                  data-placement="right" title="Click to Remove Image"
                  onclick="show_confirm ('Remove this image?', '<?php echo site_url('coaching/user_actions/remove_profile_image/'.$member_id.'/'.$coaching_id.'/'.$role_id); ?>')"><i
                    class="simple-icon-trash"></i></button>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input required" id="userfile" name="userfile" accept="image/*"
                  data-style="fileinput" data-inputsize="medium" />
                <label class="custom-file-label" for="userfile">Select file to upload...</label>
              </div>
            </div>
            <small class="form-text text-muted">Images only (image/*)</small>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="btn-toolbar">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="submit" value="<?php echo ('Upload'); ?>" class="btn btn-primary pull-right" />
        </div>
      </div>
      <?php echo form_close (); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->