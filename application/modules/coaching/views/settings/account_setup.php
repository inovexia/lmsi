<div class="row justify-content-center">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="mb-2">Setup your account</h2>

                <?php echo form_open ('api/account_actions/validate_user_account', array('id'=>'account-info-form')); ?>
                    
                    <input type="hidden" name="member_id" id="member_id" value="0">

                    <div class="form-group mb-2">
                        <label class="">
                            Display Name<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="display_name" class="form-control required" placeholder="Display name"  required="required" />
                        <p class="form-text text-muted">This will be your brand name. Users will see this name on their pages</p>
                    </div>

                    <div class="form-group mb-2">
                        <label class="">
                            URL<span class="text-danger">*</span>
                        </label>
                        <p class="" ><?php echo base_url (); ?></p>
                        <input type="text" name="url" class="form-control required" required="required" value="<?php echo set_value ('url'); ?>" id="url-selector" placeholder="Eg, apexcoachings, jhonwick03" aria-describedby="url" />
                        <p class="form-text text-muted">A unique combination of letters and/or numbers. This will be the url your students will use to reach your page. Eg, <b>apexcoachings, jhonwick03</b>  </p>
                    </div>

                    <div class="form-group mb-4">
                        <label class="">
                            <span>Email (Optional)</span>
                        </label>
                        <input type="text" name="email" class="form-control email required" value="<?php echo set_value ('email'); ?>" placeholder="Enter Your Email" />
                    </div>


                    <div class="d-flex align-items-center">
                        <input type="submit" class="btn btn-primary btn-lg btn-shadow" name="save" value="Setup Account">
                    </div>
                   
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>