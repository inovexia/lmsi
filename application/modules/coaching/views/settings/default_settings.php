<div class="row justify-content-center">
	<div class="col-md-8 ">

   		<div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Theme </h5>
				<?php echo form_open ('coaching/setting_actions/save_default_theme/'.$coaching_id, array('class'=>'validate-form', 'id'=>'')); ?>
	                <div class="form-group">
	                	<label class="form-label">Default Theme</label>
						<select name="theme" class="form-control">
							<?php 
							if (! empty ($theme_list)) {
								foreach ($theme_list as $theme) {
									?>
									<option value="<?php echo $theme['id']; ?>" <?php if (isset($default['theme']) && $theme['id'] == $default['theme']) echo 'selected="selected"'; ?> ><?php echo $theme['theme_name'].'-'.$theme['variation']; ?></option>
									<?php
								}
							}
							?>
						</select>
	                </div>
	                
    	            <input type="submit" class="btn btn-primary">
	            </form>
            </div>
        </div>

  		<div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Localisation </h5>
				<?php echo form_open ('coaching/setting_actions/save_default_settings/'.$coaching_id, array('class'=>'validate-form', 'id'=>'')); ?>
	                <div class="form-group">
	                	<label class="form-label">Default Currency</label>
						<select name="currency" class="form-control">
							<?php 
							if (! empty ($country_list)) {
								foreach ($country_list as $cl) {
									if (! empty($cl['currency_code'])) {
										?>
										<option value="<?php echo $cl['currency_code']; ?>" <?php if (isset($default['currency']) && $cl['currency_code'] == $default['currency']) echo 'selected="selected"'; ?> ><?php echo $cl['currency_name'].' - '.$cl['currency_code']; ?></option>
										<?php
									}
								}
							}
							?>
						</select>
	                </div>

	                <div class="form-group">
	                	<label class="form-label">Default Dialing Code</label>
						<select name="dialing" class="form-control">
							<?php 
							if (! empty ($country_list)) {
								foreach ($country_list as $cl) {
									?>
									<option value="<?php echo $cl['dialing_code']; ?>" <?php if (isset($default['dialing']) && $cl['dialing_code'] == $default['dialing']) echo 'selected="selected"'; ?> ><?php echo $cl['country_name'].' - '.$cl['dialing_code']; ?></option>
									<?php
								}
							}
							?>
						</select>
	                </div>

    	            <input type="submit" class="btn btn-primary">
	            </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Custom Messages</h5>
				<?php echo form_open ('coaching/setting_actions/save_custom_text/'.$coaching_id, array('class'=>'validate-form', 'id'=>'')); ?>
	                <div class="form-group">
	                	<label>Login page</label>
						<input type="text" class="form-control" name="custom_text_login" value="<?php echo set_value ('custom_text_login', $settings['custom_text_login']); ?>">
	                </div>
	                <div class="form-group">
	                	<label>Register page</label>
						<input type="text" class="form-control" name="custom_text_register" value="<?php echo set_value ('custom_text_register', $settings['custom_text_register']); ?>">
	                </div>

    	            <input type="submit" class="btn btn-primary" value="Save">
	            </form>
            </div>
        </div>

   		<div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">EULA </h5>
                <p class="text-muted">You can also write HTML code here</p>
				<?php echo form_open ('coaching/setting_actions/save_eula/'.$coaching_id, array('class'=>'validate-form', 'id'=>'')); ?>
	                <div class="form-group">
						<textarea class="tinyeditor form-control" name="eula_text" rows="20"><?php echo set_value ('eula_text', $settings['eula_text']); ?></textarea>
	                </div>

    	            <input type="submit" class="btn btn-primary">
	            </form>
            </div>
        </div>

	</div>
</div>