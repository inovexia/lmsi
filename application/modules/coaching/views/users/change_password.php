<div class="row ">
	<div class="col-md-9"> 
		
		<div class="card mb-4">
			<div class="card-body">
				<h4>Option 1</h4>
				<p>Send create password link on user's email and primary contact number. User can create their own password using that link</p>
			    <a href="" id="send_password_link" class="btn btn-secondary">Send Link </a>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-body">
				<h4>Option 2</h4>
				<p>Reset and send a system generated password on user's email and primary contact number. User can login with the new password</p>
			    <a href="" id="resend_confirmation" class="btn btn-secondary">Send OTP </a>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-body">
				<h4>Option 3</h4>
				<p>Manually change user password  </p>
				<?php echo form_open( 'coaching/user_actions/change_password/'.$coaching_id.'/'.$member_id, array('class'=>'form-horizontal validate-form', 'id'=>'validate-1')); ?>
					<div class="form-group">
						<label class="" for="password">Password<span class="text-danger">*</span></label>
						<input type="password" name="password" id='password' class="form-control" placeholder="Password">
						<div id='password-strength'></div>
					</div>
					
					<div class="form-group">
						<label class="" for="conf_password">Confirm Password<span class="text-danger">*</span></label>
						<input type="password" name="repeat_password" class="form-control" id="conf_password"  placeholder="Re-enter password" >

					</div>
					
					<div class="form-group">
						<div id="pswd_info" class="col-md-9 pl-0">
							<label class="">Password must meet the following requirements</label>
							<div><i id="letter"></i>       <span>At least one capital and small letter</span></div>
							<div><i id="number"></i>       <span>At least one number</span></div>
							<div><i id="spcl_char"></i>    <span>At least one special character</span></div>
							<div><i id="length"></i>       <span>Be at least 8 characters</span></div>
							<div><i id="re_pass"></i>      <span>"Confirm Password" should match "Password".</span></div>
						</div>
					</div>

					<div class="form-group">
						<div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="inform_user">
                            <label class="custom-control-label" for="customCheck1">Inform user about password change</label>
                        </div>
					</div>
				</div>
				
				<div class="card-footer">
					<div class="col-12">
						<input type="submit" name="submit" value="Change Password" class="btn btn-primary " />
					</div>
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
