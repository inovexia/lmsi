<?php echo form_open('coaching/user_actions/confirm/'.$coaching_id.'/'.$role_id.'/'.$status, array('class'=>'form-horizontal row-border bulk-action') ); ?>
<div id="bulk-up" class="d-flex align-text-center mb-3">
  <div class="btn-group" role="group">
    <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
      <label class="custom-control custom-checkbox mb-0 d-inline-block">
        <input type="checkbox" class="custom-control-input" id="checkAll">
        <span class="custom-control-label">&nbsp;</span>
      </label>
    </div>
    <button class="btn btn-primary rounded-0 do-action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" name="action" value="delete">
      <span class="action-label">Delete</span>
    </button>
    <div class="dropdown-menu">
      <button type="button" class="dropdown-item action active" value="delete" data-label="Delete">
        <i class="simple-icon-trash"></i> Delete
      </button>
      <button type="button" class="dropdown-item action" value="enable" data-label="Enable">
        <i class="simple-icon-check"></i> Enable
      </button>
      <button type="button" class="dropdown-item action" value="disable" data-label="Disable">
        <i class="simple-icon-close"></i> Disable
      </button>
    </div>
    <button type="button" name="Submit" class="btn btn-primary apply">Apply</button>
  </div>
</div>
<div class="row">
  <div class="col-12 list" data-check-all="checkAll" id="users-list">
    <?php $this->load->view ('users/inc/index', $data); ?>
  </div>
</div>
<div id="bulk-down" class="d-flex align-text-center mb-3">
  <div class="btn-group" role="group">
    <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
      <label class="custom-control custom-checkbox mb-0 d-inline-block">
        <input type="checkbox" class="custom-control-input" id="checkAll2">
        <span class="custom-control-label">&nbsp;</span>
      </label>
    </div>
    <button class="btn btn-primary rounded-0 do-action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" name="action" value="delete">
      <span class="action-label">Delete</span>
    </button>
    <div class="dropdown-menu">
      <button type="button" class="dropdown-item action active" value="delete" data-label="Delete">
        <i class="simple-icon-trash"></i> Delete
      </button>
      <button type="button" class="dropdown-item action" value="enable" data-label="Enable">
        <i class="simple-icon-check"></i> Enable
      </button>
      <button type="button" class="dropdown-item action" value="disable" data-label="Disable">
        <i class="simple-icon-close"></i> Disable
      </button>
    </div>
    <button type="button" name="Submit" class="btn btn-primary apply">Apply</button>
  </div>
</div>
<?php echo form_close(); ?> 