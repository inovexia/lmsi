<div class="row justify-content-center">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">
		<div class="card mb-4" id="step-1">
            <div class="card-body">
		 		<h2 class="mb-2">Step 1 - Basic Information</h2>

		 		<?php echo form_open ('api/account_actions/register_teacher', array('id'=>'basic-info-form')); ?>

                    <div class="form-group mb-2">
                        <label for="user_name">
                            Your Name<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="first_name" class="form-control required" required="required" value="<?php echo set_value ('first_name', ''); ?>" id="user_name" placeholder="Enter your name" />
                        <p id="nameHelp" class="form-text text-muted">Can contain alpha numeric characters</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="primary_contact">
                            Mobile<span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="user_mobile">+91</span>
                            </div>
                            <input type="text" name="primary_contact" class="form-control digits required" required="required" value="<?php echo set_value ('primary_contact', ''); ?>" id="primary_contact" placeholder="Enter your mobile number" aria-describedby="user_mobile" />
                        </div>
		                <p id="mobileHelp" class="form-text text-muted">We will send an OTP on this number</p>
                    </div>

                    <div id="otp-field" class="form-group mb-2 d-none">
                        <label class="">
                           	Enter OTP<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="otp" class="form-control required" required="required" value="<?php echo set_value ('otp'); ?>" id="mobile-otp" onkeyup="validate_otp (this.value)" placeholder="Enter OTP recieved on your phone" maxlength="6" />
                        <p class="form-text text-muted"></p>
                    </div>

                    <div class="mb-2">
                        <button type="button" id="btn-send-otp" class="btn btn-xs btn-outline-secondary">Send OTP</button>
                    </div>

                    <div class="d-none" id="create-password-selector">
                        <div class="form-group mb-4">
                            <label class="">
                                <span>Create Password</span>
                            </label>
                            <div class="input-group">
                                <input type="password" name="password" id="reg-password" class="form-control required" placeholder="Password"  aria-label="Password" aria-describedby="show-password" required="required" />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary default" type="button" id="show-password"><i id="password-icon" class="fa fa-eye d-lg-none"></i><span class="d-none d-lg-inline-block" id="show-password-link">Show Password</span></button>
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


        <div class="card mb-4 d-none" id="step-3">
            <div class="card-body">
                <h2 class="mb-2">Step 2 - Setup your account</h2>

                <?php echo form_open ('api/account_actions/validate_user_account', array('id'=>'account-info-form')); ?>
                        
                    <div class="form-group mb-2">
                        <label class="">
                            <span>Display Name</span>
                        </label>
                        <input type="text" name="display_name" class="form-control required" placeholder="Display name"  required="required" />
                        <p class="form-text text-muted">This will be your brand name</p>
                    </div>

                    <div class="form-group mb-2">
                        <label class="">
                            <span>URL</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="url"><?php echo base_url (); ?></span>
                            </div>    
                            <input type="text" name="url" class="form-control required" required="required" value="<?php echo set_value ('url'); ?>" id="url" placeholder="Eg, apexcoachings, jhonwick03" aria-describedby="url" />
                        </div>
                        <small class="form-text text-muted">A unique combination of letters and/or numbers. This will be the url your students will use to reach your page. Eg, <b>apexcoachings, jhonwick03</b>  </small>
                    </div>

                    <div class="form-group mb-4">
                        <label class="">
                            <span>Email (Optional)</span>
                        </label>
                        <input type="text" name="email" class="form-control email required" value="<?php echo set_value ('email'); ?>" placeholder="Enter Your Email" />
                    </div>


                    <div class="d-flex justify-content-between align-items-center">
                        <input type="submit" class="btn btn-primary btn-lg btn-shadow" name="save" value="Create Account">
                    </div>
                   
                <?php echo form_close(); ?>                    

            </div>
        </div>
 	</div>
 </div>
