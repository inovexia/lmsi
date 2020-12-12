 <div class="row justify-content-center">
 	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-4">
		<div class="card mb-4">
            <div class="card-body">
		 		<h2 class="mb-2">Register As Teacher</h2>

		 		<?php echo form_open ('login/login_actions/register', array('id'=>'validate-user')); ?>

                    <div class="form-group-1">
                        <div class="form-group mb-2">
                            <label for="user_name">
                                Name<span class="text-danger">*</span>
                            </label>
                            <input type="text" name="first_name" class="form-control required" required="required" value="<?php echo set_value ('first_name'); ?>" id="user_name" placeholder="Enter your name" />
	                        <small id="nameHelp" class="form-text text-muted">Can contain alpha numeric characters</small>

                        </div>

                        <div class="form-group mb-2">
                            <label for="user_mobile">
                                Mobile<span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="primary_contact">+91</span>
                                </div>
                                <input type="text" name="primary_contact" class="form-control digits required" required="required" value="<?php echo set_value ('primary_contact'); ?>" id="user_mobile" placeholder="Enter your mobile number" aria-describedby="primary_contact" />
                            </div>
    		                <small id="mobileHelp" class="form-text text-muted">We will send an OTP on this number</small>
                        </div>

                        <div id="otp-field" class="form-group mb-2 d-none">
                            <label class="">
                               	Enter OTP<span class="text-danger">*</span>
                            </label>
                            <input type="text" name="otp" class="form-control required" required="required" value="<?php echo set_value ('otp'); ?>" id="mobile-otp" onkeyup="validate_otp (this.value)" placeholder="Enter OTP recieved on your phone" maxlength="6" />
                        </div>

                        <div>
                            <button type="button" id="btn-send-otp" class="btn btn-outline-secondary">Send OTP</button>
                        </div>
                    </div>

                    <div class="form-group-1 d-none" id="login-field">
                        
                        <div class="form-group mb-4">
                            <label class="">
                                <span>Password</span>
                            </label>
                            <div class="input-group">
                                <input type="password" name="password" id="reg-password" class="form-control required" placeholder="Password"  aria-label="Password" aria-describedby="show-password" required="required" />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary default" type="button" id="show-password"><i id="password-icon" class="fa fa-eye d-lg-none"></i><span class="d-none d-lg-inline-block" id="show-password-link">Show Password</span></button>
                                </div>
                            </div>
                            <p class="text-muted">Minimum 8 characters. Choosing a strong password is recommended</p>
                        </div>

                        <div class="form-group mb-4">
                            <label class="">
                                <span>Email (Optional)</span>
                            </label>
                            <input type="text" name="email" class="form-control email required" value="<?php echo set_value ('email'); ?>" placeholder="Enter Your Email" />
                        </div>

                        <div class="my-2">
                            <?php 
                            if (isset($coaching['eula_text'])) {
                                $href = site_url ('public/page/eula');
                                ?>
                                <?php
                            } else {
                                $href = '#';
                            }
                            ?>
		                    <div class="custom-control custom-checkbox mb-3 ">
		                        <input type="checkbox" class="custom-control-input required" id="terms-condition" name="agree">
		                        <label class="custom-control-label" for="terms-condition">Terms And Conditions</label>
		                    </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <input type="submit" class="btn btn-primary btn-lg btn-shadow" name="save" value="Create Account">
                        </div>

                    </div>
                   
                <?php echo form_close(); ?>
                    

            </div>
        </div>
 	</div>
 </div>
