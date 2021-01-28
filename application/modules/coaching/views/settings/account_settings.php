<div class="row justify-content-center">
	<div class="col-md-8 ">

		<div class="card">
			<?php echo form_open ('coaching/setting_actions/update_account/'.$coaching_id, array('class'=>'form-horizontal row-border validate-form', 'id'=>'validate-1')); ?>
				<div class="card-body">
					<div class="form-group">
						<label class="control-label">Display Name<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="coaching_name" class="form-control required" value = "<?php echo set_value('coaching_name', $coaching['coaching_name']) ; ?>">
						</div>
					</div>
					
					<div class="form-group ">					
						<label class="control-label">Address<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="address" class="form-control required" value = "<?php echo set_value('address', $coaching['address']) ; ?>">
						</div>
					</div>
					
					<div class="form-group ">					
						<label class="control-label">City<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="city" class="form-control required" value = "<?php echo set_value('city', $coaching['city']) ; ?>">
						</div>
					</div> 

					<div class="form-group ">					
						<label class="control-label">State<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="state" class="form-control required" value = "<?php echo set_value('state', $coaching['state']) ; ?>">
						</div>
					</div> 

					<div class="form-group ">
						<label class="control-label">PIN Code<span class="text-danger">*</span></label>
						<div class="">
							<input type="text" name="pin" class="form-control required" value = "<?php echo set_value('pin', $coaching['pin']) ; ?>">
						</div>
					</div>

					<div class="form-group ">
						<label class="control-label">Website</label>
						<div class="">
							<input type="text" name="website" class="form-control " value = "<?php echo set_value('website', $coaching['website']) ; ?>">
						</div>
					</div>
				</div>
				
				<div class="card-footer border-top-0 pt-0 bg-transparent">
					<input type="submit" name="submit" value="Save" class="btn btn-primary">
				</div>
			<?php echo form_close (); ?>
		</div>
	</div>
</div>