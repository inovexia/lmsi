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
               
                <h4 class="text-center mb-4">Create New Password</h4>

                <?php if ($valid_request == false) { ?>
                        <p class="text-center text-danger">
                            This link has expired
                            <?php echo anchor ('login/user/reset_password/'.$slug, 'Try Again', ['class'=>'btn btn-link']); ?>
                        </p>
                <?php } else { ?>

                    <?php echo form_open ('login/user_actions/create_password', array('class'=>'validate-form')); ?>
                        <input type="hidden" name="user_token" value="<?php echo $user_token; ?>">
                        <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                        <div class="form-group ">
                            <p><?php echo $user['first_name']; ?></p>
                        </div>
                        <div class="form-group ">
                            <input type="text" name="password" class="form-control" placeholder="Enter password" required="true">
                        </div>
                        <div class="form-group ">
                            <input type="text" name="repeat_password" class="form-control" placeholder="Repeat password" required="true">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    <?php echo form_close(); ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>