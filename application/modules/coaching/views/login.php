 <div class="row justify-content-center">
 	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-4">
		<div class="card mb-4">
            <div class="card-body">
		 		<h2 class="mb-2">Login</h2>

		 		<?php echo form_open ('api/login_actions/validate_login', array('id'=>'validate-user')); ?>

                    <div class="form-group mb-2">
                        <label for="user_name">
                            Mobile Number<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="first_name" class="form-control required" required="required" value="<?php echo set_value ('first_name'); ?>" id="user_name" placeholder="Enter your name" />
                        <small id="nameHelp" class="form-text text-muted">Can contain alpha numeric characters</small>

                    </div>

                    <div class="form-group mb-4">
                        <label for="user_name">
                            Password<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="first_name" class="form-control required" required="required" value="<?php echo set_value ('first_name'); ?>" id="user_name" placeholder="Enter your name" />
                        <small id="nameHelp" class="form-text text-muted">Can contain alpha numeric characters</small>

                    </div>

                    <div class="d-flex justify-content-between align-items-center ">
                        <input type="submit" class="btn btn-primary btn-lg btn-shadow" name="save" value="Login">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>