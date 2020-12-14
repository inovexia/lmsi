<div class="row">
  <?php if(!empty($slots)): ?>
  <div class="col-12 list" data-check-all="checkAll">
    <?php foreach($slots as $i => $slot): ?>
    <?php extract($slot); ?>
    <div class="card d-flex flex-row mb-3">
      <div class="d-flex flex-grow-1 min-width-zero">
        <label class="custom-control custom-checkbox checkbox-left mb-1 align-self-center pr-4">
          <input type="checkbox" class="custom-control-input" name="" value="<?php echo $slot_id; ?>">
          <span class="custom-control-label">&nbsp;</span>
        </label>
        <div
          class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
          <a class="list-item-heading mb-0 truncate w-20 w-xs-100"
            href="<?php echo site_url("/coaching/slots/create/$slot_id"); ?>">
            <?php echo $subject; ?>
          </a>
          <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo date ('d-m-Y', $date); ?></p>
          <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo date ('H:i', $start_time); ?></p>
          <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo date ('H:i', $end_time); ?></p>
          <div class="w-15 w-xs-100">
            <span
              class="badge badge-pill badge-<?php echo $slot_type == APPOINTMENT_TYPE_SINGLE? "primary":"secondary"; ?>"><?php echo $slot_type == APPOINTMENT_TYPE_SINGLE? "Single":"Multiple"; ?></span>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        <strong>Slots are empty!</strong> There aren't any slots created yet.
      </div>
      <?php echo anchor ('coaching/slots/create/'.$coaching_id.'/'.$slot_id, 'Create a new slot', ['class'=>'btn btn-primary']); ?>
    </div>
  <?php endif; ?>
</div>