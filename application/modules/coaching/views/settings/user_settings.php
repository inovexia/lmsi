<div class="row justify-content-center">
	<div class="col-md-8 ">

		<div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Localisation </h5>
				<?php echo form_open ('coaching/setting_actions/save_user_settings/'.$coaching_id.'/'.$member_id, array('class'=>'validate-form', 'id'=>'')); ?>
	                <div class="form-group">
	                	<label class="form-label"> Set Timezone</label>
						<select name="setting[timezone]" class="form-control">
							<?php 
							$current_tz = '';
							$tz_list = $timezones;
							if (! empty ($tz_list)) {
								foreach ($tz_list as $i=>$tz_name) {
									?>
									<option value="<?php echo $i; ?>" <?php if (isset($default['timezone']) && $i == $default['timezone']) {echo 'selected="selected"'; $current_tz = $tz_name; } ?> ><?php echo $tz_name; ?></option>
									<?php
								}
							}
							?>
						</select>
	                	<label class="form-label"> Current Time <strong><?php echo date ('l, d F, Y h:i a'); ?></strong></label>
	                </div>

    	            <input type="submit" class="btn btn-primary" name="Save">
	            </form>
            </div>
        </div>

	</div>
</div>