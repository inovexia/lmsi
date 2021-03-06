<div class="row mb-1">
  <div class="col-12 ">
    <form class="form-inline">
      <?php
$dt = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
?>
      <input type="date" name="" class="form-control my-2" min="" max="<?php echo date('Y-m-d'); ?>" placeholder="Select date" value="<?php echo date('Y-m-d'); ?>"
        onchange="change_date(<?php echo $dt; ?>)">
    </form>
  </div>
</div>
<div class="row">
  <div class="col-12 list" data-check-all="checkAll">
    <?php
if (!empty($courses)) {
  foreach ($courses as $course_id => $course) {
    $title = $course['course_title'];
    $slots = $course['slots'];
    ?>
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title border-bottom"><?php echo $title; ?></h4>
        <?php
if (!empty($slots)) {
      foreach ($slots as $slot) {
        ?>
        <button type="button" class="btn btn-xs btn-secondary mb-2" data-toggle="modal" data-backdrop="static" data-target="#addSlot" data-course-id="<?php echo $course_id; ?>"
          data-slot-id="<?php echo $slot['slot_id']; ?>">
          <?php echo date('h:i a', $slot['start_time']); ?> -
          <?php echo date('h:i a', $slot['end_time']); ?>
        </button>
        <?php
}
    }
    ?>
      </div>
    </div>
    <?php
}
}
?>
  </div>
</div>
<div class="modal fade modal-right" id="addSlot" tabindex="-1" role="dialog" aria-labelledby="addSlot" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open('coaching/slot_actions/create_slot/' . $coaching_id, ['class' => 'validate-form']); ?>
      <div class="modal-header">
        <h5 class="modal-title">Add Slot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="course_id">
        <input type="hidden" name="slot_id">
        <div id="output-selector">
          <div class="form-group">
            <label>Date</label>
            <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+90 days')); ?>"
              value="<?php echo date('Y-m-d'); ?>">
          </div>
          <div class="form-group">
            <label>Start Time</label>
            <input type="time" class="form-control" placeholder="" name="start_time" min="<?php echo date('H:i'); ?>" value="<?php echo date('H:i'); ?>">
          </div>
          <div class="form-group">
            <label>End Time</label>
            <input type="time" class="form-control" placeholder="" name="end_time" min="<?php echo date('H:i'); ?>" value="<?php echo date('H:i', strtotime('+1 hour')); ?>">
          </div>
          <div class="form-group">
            <label>Appointment Type</label>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input type" id="customCheck1" name="appointment_type" value="<?php echo APPOINTMENT_TYPE_SINGLE; ?>"
                <?php echo set_radio('appointment_type', APPOINTMENT_TYPE_SINGLE, true); ?>>
              <label class="custom-control-label" for="customCheck1">Single</label>
              <p class="text-muted">Only one user can book this slot</p>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input type" id="customCheck2" name="appointment_type" value="<?php echo APPOINTMENT_TYPE_MULTIPLE; ?>"
                <?php echo set_radio('appointment_type', APPOINTMENT_TYPE_MULTIPLE); ?>>
              <label class="custom-control-label" for="customCheck2">Multiple</label>
              <p class="text-muted">More than one user can book this slot</p>
              <div class="input-user-limit" style="display:none">
                <label class="form-label">Maximum users </label>
                <input type="number" min="0" length="6" value="0" class="form-control" name="max_appointment">
                <p class="text-muted">Enter 0 for no limit</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        <div id="delete_container"></div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>