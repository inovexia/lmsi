<div class="row">
    <div class="col-sm-6 mb-2">
		<div class="card">
			<div class="card-body">
				
				<?php echo form_open ('coaching/user_actions/invite_by_email/'.$coaching_id, ['class'=>'validate-form']); ?>
					<h4 class="card-title">Send Invite By Email</h4>

                    <div class="input-group">
                        <input type="email" class="form-control" name="email" required="true" placeholder="Enter user email-id" >
                        <div class="input-group-append ">
                            <button type="submit" class="btn btn-primary default">
                                Invite 
                            </button>
                        </div>
                    </div>
				<?php echo form_close (); ?>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
				
		<div class="card">
			<div class="card-body">

				<?php echo form_open ('coaching/user_actions/invite_by_mobile/'.$coaching_id, ['class'=>'validate-form']); ?>
					<h4 class="card-title">Send Invite By Mobile</h4>

                    <div class="input-group">
                        <input type="text" class="form-control" name="mobile" required="true" placeholder="Enter mobile number" >
                        <div class="input-group-append ">
                            <button type="submit" class="btn btn-primary default">
                                Invite 
                            </button>
                        </div>
					<?php echo form_close (); ?>
                </div>
            </div>
        </div>
    </div>

</div>