<?php echo form_open('coaching/user_actions/confirm/'.$coaching_id.'/'.$role_id.'/'.$status, array('class'=>'form-horizontal row-border validate-form', 'id'=>'validate-1') ); ?>
<div class="d-flex align-text-center mb-3">
  <div class="btn-group" role="group">
    <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
      <label class="custom-control custom-checkbox mb-0 d-inline-block">
        <input type="checkbox" class="custom-control-input" id="checkAll">
        <span class="custom-control-label">&nbsp;</span>
      </label>
    </div>
    <select name="action" class="custom-select pr-4 w-auto">
      <option value="0">---With Selected---</option>
      <option value="delete">Delete</option>
      <option value="enable">Enable Account</option>
      <option value="disable">Disable Account</option>
    </select>
    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>
<div class="row">
  <div class="col-12 list" data-check-all="checkAll" id="users-list">
    <?php $this->load->view ('users/inc/index', $data); ?>
  </div>
</div>
<div class="d-flex align-text-center mb-3">
  <div class="btn-group" role="group">
    <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
      <label class="custom-control custom-checkbox mb-0 d-inline-block">
        <input type="checkbox" class="custom-control-input" id="checkAll2">
        <span class="custom-control-label">&nbsp;</span>
      </label>
    </div>
    <select name="action" class="custom-select pr-4 w-auto">
      <option value="0">---With Selected---</option>
      <option value="delete">Delete</option>
      <option value="enable">Enable Account</option>
      <option value="disable">Disable Account</option>
    </select>
    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>
<?php echo form_close(); ?>