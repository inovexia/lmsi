<div class="row h-100">
    <div class="col-12 col-md-10 mx-auto my-auto">
        <div class="card auth-card shadow">
            <div class="position-relative image-side text-center">
                <div class="d-flex flex-column h-100 align-items-center justify-content-center">
                    <?php if ( is_file ($logo)) { ?>
                        <img src="<?php echo $logo; ?>" height="50" title="<?php echo $page_title; ?>" class="text-center mb-4" alt="<?php echo $page_title; ?>">
                    <?php } else { ?>
                        <h2 class="text-white text-center mb-4"><?php echo $page_title; ?></h2>
                    <?php } ?>
                    <p class=" text-white h6">
                       ALREADY HAVE AN ACCOUNT? <br>SIGN-IN
                   </p>
                    <p class="white mb-0">
                        <a href="<?php echo site_url('login/user/index/'.$slug)?>" class="btn btn-light ">Sign-in as teacher</a>
                    </p>
                </div>
            </div>
            <div class="form-side">

                <h2 class="text-primary text-center mb-4"><?php echo $page_title; ?></h2>
               
                <h4 class="text-center mb-4">Reset Password</h4>

                <div class="border-info text-info p-3 h6">
                    You will recieve a link on your registered mobile number and email (if provided) to create a new password. After creating new password, you can login using the new password.
                </div>

                <?php echo form_open ('login/user_actions/reset_password/mobile', array('class'=>'validate-form')); ?>
                    <input type="hidden" name="slug" value="<?php echo $slug; ?>" >
                    <div class="input-group my-3">
                        <input type="text" name="mobile" class="form-control" placeholder="Enter mobile number"
                            aria-label="Enter mobile number" aria-describedby="mobile-number" required="true">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Send Link</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>

                <div class="text-center my-4">OR</div>

                <?php echo form_open ('login/user_actions/reset_password/email', array('class'=>'validate-form')); ?>
                    <input type="hidden" name="slug" value="<?php echo $slug; ?>" >
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Enter email id"
                            aria-label="Enter email id" aria-describedby="email-id" required="true">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Send Link</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>