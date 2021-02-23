<div class="row h-100">
  <div class="col-12 col-md-10 mx-auto my-auto">
    <div class="card auth-card shadow mt-4">
      <div class="position-relative image-side text-center">
        <div class="d-flex flex-column h-100 align-items-center justify-content-center">
          <?php if ( read_file ($logo) != false) { ?>
          <img src="<?php echo $logo; ?>" height="80" title="<?php echo $page_title; ?>" class="text-center mb-4"
            alt="<?php echo $page_title; ?>">
          <?php } else { ?>
          <h2 class="text-white text-center mb-4">Welcome To <?php echo $page_title; ?></h2>
          <?php } ?>
          <p class=" text-white h6">
            ALREADY HAVE AN ACCOUNT?
          </p>
          <p class="white mb-0">
            <a href="<?php echo site_url('login/user/index/'.$slug)?>" class="btn btn-light ">Sign in as student</a>
          </p>
          <?php if ($coaching['website'] != '') { ?>
          <p class="white mb-0">
            <br>
            <a href="<?php echo $coaching['website']; ?>" class="text-white">Back to Website</a>
          </p>
          <?php } ?>
        </div>
      </div>

      <div class="form-side">

        <div class="logo-image text-center">
          <?php if ( read_file ($logo) != false) { ?>
          <img src="<?php echo $logo; ?>" height="50" title="<?php echo $page_title; ?>" class="text-center "
            alt="<?php echo $page_title; ?>">
          <?php } ?>
        </div>

        <div class="mb-4" id="step-1">
          <div class="card-body">

            <h2 class="text-center mb-4">Create a new student account</h2>

            <?php echo form_open ('api/account_actions/register', array('id'=>'basic-info-form')); ?>
            <input type="hidden" name="role_id" value="<?php echo USER_ROLE_STUDENT; ?>">
            <input type="hidden" name="coaching_id" value="<?php echo $coaching['id']; ?>">
            <div class="form-group mb-2">
              <label for="user_name">
                Your Name<span class="text-danger">*</span>
              </label>
              <input type="text" name="first_name" class="form-control required" required="required"
                value="<?php echo set_value ('first_name', ''); ?>" id="user_name" placeholder="Enter your name" />
              <p id="nameHelp" class="form-text text-muted">Can contain alpha numeric characters</p>
            </div>

            <div class="form-group mb-2">
              <label for="primary_contact">
                Mobile<span class="text-danger">*</span>
              </label>
              <div class="input-group">
                <div class="input-group-prepend" style="min-width:65px;">
                  <select name="dialing_code" class="input-group-text form-control select2-single" id="user_mobile">
                    <?php 
                                            if (! empty($country_list)) {
                                                foreach ($country_list as $cl) {
                                                    ?>
                    <option value="+<?php echo $cl['dialing_code']; ?>"
                      <?php if ($cl['dialing_code'] == $country['dialing_code']) echo 'selected="selected"'; ?>>
                      +<?php echo $cl['dialing_code']; ?></option>
                    <?php
                                                }
                                            }
                                            ?>
                  </select>
                </div>
                <input type="text" name="primary_contact" class="form-control digits required" required="required"
                  value="<?php echo set_value ('primary_contact', ''); ?>" id="primary_contact"
                  placeholder="Enter your mobile number" aria-describedby="user_mobile" />
              </div>
              <p id="mobileHelp" class="form-text text-muted">You will recieve an OTP on this number</p>
            </div>

            <div id="otp-field" class="form-group mb-2 d-none">
              <label class="">
                Enter OTP<span class="text-danger">*</span>
              </label>
              <input type="text" name="otp" class="form-control required" required="required"
                value="<?php echo set_value ('otp'); ?>" id="mobile-otp" onkeyup="validate_otp (this.value)"
                placeholder="Enter OTP recieved on your phone" maxlength="6" />
              <p class="form-text text-muted"></p>
            </div>

            <div class="mb-2">
              <button type="button" id="btn-send-otp" class="btn btn-xs btn-outline-secondary">Send OTP</button>
            </div>

            <div class="d-none" id="create-password-selector">
              <div class="form-group mb-4">
                <label class="">
                  Create Password<span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <input type="password" name="password" id="reg-password" class="form-control required"
                    placeholder="Password" aria-label="Password" aria-describedby="show-password" required="required" />
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary default" type="button" id="show-password"><i
                        id="password-icon" class="fa fa-eye d-lg-none"></i><span class="d-none d-lg-inline-block"
                        id="show-password-link">Show Password</span></button>
                  </div>
                </div>
                <p class="text-muted">Minimum 8 characters. Choosing a strong password is recommended</p>
              </div>

              <div class="my-2">
                <?php 
                                        $href = '#';
                                    ?>
                <div class="custom-control custom-checkbox mb-3 ">
                  <input type="checkbox" class="custom-control-input required" id="terms-condition" name="agree">
                  <label class="custom-control-label" for="terms-condition">I agree to the Terms And Conditions</label>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <input type="submit" class="btn btn-primary btn-lg btn-shadow" name="save" value="Create Account">
              </div>
            </div>

            <?php echo form_close (); ?>
          </div>
        </div>

      </div>
    </div>
    <div class="mt-4 text-center ">
      <?php if (isset($coaching['custom_text_register'])) { echo $coaching['custom_text_register']; } ?>
    </div>
  </div>
</div>