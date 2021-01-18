<div class="card">
	<div class="card-body">
		<h4 class="card-title">Send Invite By Email</h4>

		<?php echo form_open ('coaching/user_actions/invite/'.$coaching_id, ['class'=>'validate-form']); ?>

			<div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First Name" required="true">
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" required="true">
                </div>
            </div>

			<div class="form-row">
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
    				<input type="text" name="mobile" class="form-control required" required="true">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
    				<input type="email" name="email" class="form-control required" required="true">
                </div>
            </div>

			<div class="form-group">
			</div>
			<div>
				<input type="submit" name="">
			</div>
		<?php echo form_close (); ?>
	</div>
</div>
