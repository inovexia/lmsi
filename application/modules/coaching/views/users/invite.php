<div class="row mb-3">
  <div class="col-sm-6 mb-2">
    <div class="card">
      <div class="card-body">

        <?php echo form_open ('coaching/user_actions/invite_by_email/'.$coaching_id, ['class'=>'validate-form']); ?>
        <h4 class="card-title">Send Invite By Email</h4>

        <div class="input-group">
          <input type="email" class="form-control" name="email" required="true" placeholder="Enter user email-id">
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
          <div class="input-group-prepend">
            <select name="dialing_code" class="input-group-text" id="user_mobile">
              <?php 
                if (! empty($country_list)) {
                  foreach ($country_list as $cl) {
                    ?>
              <option value="<?php echo $cl['dialing_code']; ?>"
                <?php if ($cl['dialing_code'] == $country['dialing_code']) echo 'selected="selected"'; ?>>
                <?php echo $cl['dialing_code']; ?>
              </option>
              <?php
                  }
                }
                ?>
            </select>
          </div>
          <input type="text" class="form-control" name="mobile" required="true" placeholder="Enter mobile number"
            aria-describedby="user_mobile">
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
        <div
          class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
          <a href="" class="w-100 w-md-30">
            <p class="list-item-heading mb-0 truncate">
              <?php 
		                        	if (! empty ($row['email'])) {
		                        		$type = 'email';
		                        		echo $row['email'];
		                        	} else {
		                        		$type = 'mobile';
		                        		echo $row['mobile'];		                        		
		                        	}
		                        	?>
            </p>
          </a>
          <p class="mb-0 text-muted text-small w-100 w-md-40">Last sent on <br>
            <?php echo date ('d-m-Y', $row['sent_time']); ?> at <?php echo date ('h:i a', $row['sent_time']); ?></p>
          <div class="w-100 w-md-30 text-left text-md-right mt-3 mt-md-0">
            <button class="btn btn-sm btn-outline-primary mr-2" type="button"
              onclick="resend_invitation (<?php echo $row['invite_id']; ?>, '<?php echo $type; ?>')">Resend</button>
            <button class="btn btn-sm btn-outline-danger" type="button"
              onclick="show_confirm ('Do you want to delete this invitation?', '<?php echo site_url('coaching/user_actions/delete_invite/'.$coaching_id.'/'.$row['invite_id']); ?>')">Remove</button>


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