<div class="row h-100">
    <div class="col-12 col-md-10 mx-auto my-auto">
        <div class="card auth-card shadow">
            <div class="position-relative image-side text-center">
                <div class="d-flex flex-column h-100 align-items-center justify-content-center">
                    <?php if ( read_file ($logo) != false) { ?>
                        <img src="<?php echo $logo; ?>" height="80" title="<?php echo $page_title; ?>" class="text-center mb-4" alt="<?php echo $page_title; ?>">
                    <?php } else { ?>
                        <h2 class="text-white text-center mb-4"><?php echo $page_title; ?></h2>
                    <?php } ?>
                    <p class=" text-white h6">
                        DON'T HAVE AN ACCOUNT? <br>SIGN-UP
                    </p>
                    <p class="white mb-0">
                        <br> 
                        <a href="<?php echo site_url('login/user/register/'.$slug)?>" class="btn btn-light ">Register as a student</a>
                    </p>
                </div>
            </div>
            <div class="form-side">

                <h2 class="text-primary text-center mb-4"><?php echo $page_title; ?></h2>
               
                <h4 class="text-center mb-4">Sign in with your credentials</h4>
                <?php echo form_open ('login/user_actions/validate_login', array('id'=>'login-form')); ?>
                    <div class="form-group mb-4">
                        <label class="">
                            Mobile/Email<span class="text-danger">*</span>
                        </label>
                        <input class="form-control" placeholder="Mobile No/Email-id" type="text" name="username" required="true">
                    </div>

                    <div class="form-group mb-4">
                        <label class="">
                            Password<span class="text-danger">*</span>
                        </label>
                        <input class="form-control" placeholder="Password" type="password" name="password" required="true">
                        <a href="<?php echo site_url ('login/student/reset_password'); ?>" class="text-info">Forgot password?</a>
                    </div>
                    
                    <div class="form-group mb-4 captcha">
                        <label for="captcha" class="control-label px-0">Type captcha code<span class="text-danger">*</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="captcha" name="captcha" style="height:30px" class="form-control" required>
                            </div>
                            <div id="captImg" class="col-6 captcha-img img-responsive pl-2 mx-0">
                                <?php echo $captcha; ?>
                            </div>
                        
                        </div>
                        <p class="refresh-captcha pt-2">
                            Refresh Captcha <a href="#" class="reload-captcha refreshCaptcha" ><i class="iconsminds-repeat-2" style="color:#0f3d64; font-weight:bold;"></i></a>
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="mt-4 text-center ">
            <?php //if (isset($coaching['custom_text_login'])) { echo $coaching['custom_text_login']; } ?>
        </div>
    </div>
</div>