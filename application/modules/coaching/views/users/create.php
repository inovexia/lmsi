<div class="row">
  <?php if ($member_id > 0) { ?>
  <div class="col-md-9">
    <?php } else { ?>
    <div class="col-md-12">
      <?php } ?>
      <div class="card mb-4">
        <div class="card-body">
          <?php echo form_open ('coaching/user_actions/create_account/'.$coaching_id.'/'.$role_id.'/'.$member_id, array ('class'=>'form-horizontal validate-form', 'id'=>'validate-1')); ?>

          <input type="hidden" name="user_role" value="<?php echo USER_ROLE_STUDENT; ?>">

          <?php
				    $readonly = '';
				    if ($member_id > 0) { 
				    	$readonly = 'readonly="true"';
				    	?>
          <input type="hidden" name="adm_no" value="<?php echo $result['adm_no']; ?>" id="adm_no">
          <?php } ?>

          <div class="form-group ">
            <label for="first_name" class="">Name <span class="text-danger">*</span></label>
            <div class="row">
              <div class="col-md-4 mb-1">
                <input name='first_name' class="form-control required " required="" id="first_name"
                  placeholder="First name" type="text"
                  value="<?php echo set_value('first_name', $result['first_name']);?>">
              </div>
              <div class="col-md-4 mb-1">
                <input name='second_name' class="form-control " id="second_name" placeholder="Middle name" type="text"
                  value="<?php echo set_value('second_name', $result['second_name']);?>">
              </div>
              <div class="col-md-4 mb-1">
                <input name='last_name' class="form-control required " id="last_name" placeholder="Last name"
                  type="text" value="<?php echo set_value('last_name', $result['last_name']);?>">
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <?php echo form_label('Contact No<span class="text-danger">*</span>', '', array('class'=>'')); ?>
              <input type="text" name="primary_contact" class="form-control digits"
                value="<?php echo set_value('primary_contact', $result['primary_contact']); ?>"
                <?php echo $readonly; ?>>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
              <?php echo form_label('E-mail <span class="text-danger"></span>', '', array('class'=>'', 'for' =>"email")); ?>
              <input type="text" name="email" class="form-control email"
                value="<?php echo set_value('email', $result['email']); ?>" <?php echo $readonly; ?>>
            </div>

          </div>


          <div class="form-group row">
            <div class="col-md-6">
              <label class="form-label"><?php echo 'Status'; ?></label>
              <select name="status" class="form-control select2-single" id="search-status">
                <option value="<?php echo USER_STATUS_ENABLED; ?>"
                  <?php if ($result['status']==USER_STATUS_ENABLED) echo 'selected="selected"'; ?>>Enabled</option>
                <option value="<?php echo USER_STATUS_DISABLED; ?>"
                  <?php if ($result['status']==USER_STATUS_DISABLED) echo 'selected="selected"'; ?>>Disabled</option>
                <option value="<?php echo USER_STATUS_UNCONFIRMED; ?>"
                  <?php if ($result['status']==USER_STATUS_UNCONFIRMED) echo 'selected="selected"'; ?>>Pending</option>
              </select>
            </div>

            <div class="col-md-6">
              <?php echo form_label('Serial No', '', array('class'=>'', 'for' =>"sr_no")); ?>
              <div class="">
                <?php echo form_input(array('name'=>'sr_no', 'class'=>'form-control', 'id'=>'sr_no', 'value'=>set_value('sr_no', $result['sr_no'])));?>
              </div>
            </div>
          </div>

          <div class="form-group row ">
            <div class="col-md-6">
              <?php echo form_label('Date Of Birth', '', array('class'=>'')); ?>
              <?php 
							if ($result["dob"] && $result['dob'] > 0) {
								$dob = date('d-m-Y', strtotime($result["dob"]));
							} else {
								$dob = '';
							}
							echo form_input(array('type'=>'', 'name'=>'dob', 'data-date-end-date'=>'0d', 'data-date-format'=> 'dd-mm-yyyy', 'class'=>'form-control datepicker', 'value'=>set_value('dob', $dob)));
							?>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
              <?php echo form_label('Gender', '', array('class'=>'form-label')); ?>
              <?php
								$status_none = false;
								$status_male = false;
								$status_female = false;
								if ($result['gender'] == 'm')
									$status_male = true;
								else if ($result['gender'] == 'f')
									$status_female = true;
								else
									$status_none = true;
							?>
              <div class="d-block">
                <div class="btn-group-toggle gender-toggle" data-toggle="buttons">
                  <label
                    class="btn position-relative btn-outline-primary p-1 mb-1<?php echo ($status_male)?" btn-primary text-white":""; ?>"><?php echo form_radio(array('name'=>'gender', 'value'=>'m', 'checked'=>$status_male, 'class'=>'')); ?><i
                      class="iconsminds-male pr-2"></i><?php echo ('Male'); ?></label>
                  <label
                    class="btn position-relative btn-outline-primary p-1 mb-1<?php echo ($status_female)?" btn-primary text-white":""; ?>"><?php echo form_radio(array('name'=>'gender', 'value'=>'f', 'checked'=>$status_female, 'class'=>'radio-primary form-check-input')); ?><i
                      class="iconsminds-female pr-2"></i><?php echo ('Female'); ?></label>
                  <label
                    class="btn position-relative btn-outline-primary p-1 mb-1<?php echo ($status_none)?" btn-primary text-white":""; ?>"><?php echo form_radio(array('name'=>'gender', 'value'=>'n', 'checked'=>$status_none, 'class'=>'radio-primary form-check-input')); ?><i
                      class="iconsminds-woman-man pr-2"></i><?php echo ('Not Specified'); ?></label>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="card-footer">
          <?php
					/*
					if ($num_users >= $max_users && $member_id == 0) {
						echo '<input type="button" class="btn btn-danger" disabled value="User Limit Reached">';
					} else {						
						echo form_submit (array('name'=>'submit', 'value'=>'Save ', 'class'=>'btn btn-primary')); 
					}
					*/
					echo form_submit (array('name'=>'submit', 'value'=>'Save ', 'class'=>'btn btn-primary')); 
					?>
        </div>
        </form>
      </div>
    </div>
    <?php if ($member_id > 0) { ?>
    <div class="col-md-3">
      <?php $this->load->view('inc/user_menu', $data); ?>
    </div>
    <?php } ?>
  </div>