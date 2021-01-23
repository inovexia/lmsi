<div class="row mb-3">
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

<div class="row">
    <div class="col-12 list" data-check-all="checkAll">
		<?php
		if (! empty ($invitations)) {
			foreach ($invitations as $row) {
				?>
		        <div class="card d-flex flex-row mb-2">
		            <div class="pl-2 d-flex flex-grow-1 min-width-zero">
		                <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
		                    <a href="" class="w-15 w-sm-100">
		                        <p class="list-item-heading mb-0 truncate">
		                        	<?php 
		                        	if (! empty ($row['email'])) {
		                        		$type = 'mobile';
		                        		echo $row['email'];
		                        	} else {
		                        		$type = 'email';
		                        		echo $row['mobile'];		                        		
		                        	}
		                        	?>
		                        </p>
		                    </a>
		                    <p class="mb-0 text-muted text-small w-50 w-sm-100">Last sent on <br> <?php echo date ('d-m-Y', $row['sent_time']); ?> at <?php echo date ('h:i a', $row['sent_time']); ?></p>
		                    <div class="w-15 w-sm-100">
					            <a class="btn btn-sm btn-outline-primary" href="#" onclick="resend_invitation (<?php echo $row['invite_id']; ?>, '<?php echo $type; ?>')">Resend</a>
		                    </div>
		                </div>
		            </div>
		        </div>

				<?php 
			}
		}
		?>
	</div>
</div>