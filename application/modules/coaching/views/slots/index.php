<div class="row">
  <div class="col-12 mb-3">
    <form class="form-inline">
      <?php foreach (range(0, 2) as $i): ?>
      <?php $dt = date('Y') . '-' . date('m') . '-' . (date('d') + $i);?>
      <a href="<?php echo strtotime($dt) == strtotime($date) ? site_url('coaching/slots/index') : site_url('coaching/slots/index/' . $coaching_id . '/' . $dt); ?>"
        class="<?php echo strtotime($dt) == strtotime($date) ? "btn btn-sm btn-primary mr-1" : "btn btn-sm btn-outline-primary mr-1"; ?>">
        <?php echo date('D, d', strtotime('+' . $i . ' days')); ?>
      </a>
      <?php endforeach;?>
      <a href="<?php echo site_url('coaching/slots/create/' . $coaching_id); ?>" class="btn btn-sm btn-secondary mr-1"><i class="iconsminds-timer"></i> Create Common Slots</a>
      <a href="<?php echo site_url('coaching/slots/create/' . $coaching_id); ?>" class="btn btn-sm btn-info mr-1"><i class="simple-icon-eye"></i> Preview All Slots</a>
      <a href="<?php echo site_url('coaching/slots/create/' . $coaching_id); ?>" class="btn btn-sm btn-warning mr-1"><i class="iconsminds-dollar-sign-2"></i> Set Custom Pricing</a>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-12 list" data-check-all="checkAll">
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="pb-1 border-bottom mb-3">
          Common Slots
        </h4>
        <div class="mx-n2 my-n1 text-center text-md-left">
          <?php if (!empty($common_slots)): ?>
          <?php foreach ($common_slots as $i => $slot): extract($slot);?>
          <button type="button" data-coaching_id="<?php echo $coaching_id; ?>" data-slot_id="<?php echo $id; ?>" data-toggle="tooltip" data-html="true" data-placement="right"
            title="<strong>Common Slot</strong><br/><em><strong>User Limit: </strong><?php echo $max_users === 0 ? "Unlimited" : $max_users; ?></em><br/><em><strong>Booked: </strong><?php echo $max_users === 0 ? "Unlimited" : $max_users; ?></em>"
            class="btn btn-outline-primary default book-slot m-1 px-md-5">
            <?php printf("<span class='d-block ml-n4 mr-4'>%s</span> To <span class='d-block mr-n4 ml-4'>%s</span>", date('h:i A', $start_time), date('h:i A', $end_time));?>
          </button>
          <?php endforeach;?>
          <?php else: ?>
          <div class="alert alert-danger mb-0">
            <?php printf("There are no common slots created for %s.", $date);?>
          </div>
          <?php endif;?>
        </div>
      </div>
      <div class="card-footer d-none">
        <a href="<?php echo site_url('coaching/slots/create/' . $coaching_id); ?>" class="btn btn-sm btn-primary mr-1"><i class="iconsminds-timer"></i> Create Common Slots</a>
        <a href="<?php echo site_url('coaching/slots/create/' . $coaching_id); ?>" class="btn btn-sm btn-primary mr-1"><i class="simple-icon-eye"></i> Preview All Slots</a>
        <a href="<?php echo site_url('coaching/slots/create/' . $coaching_id); ?>" class="btn btn-sm btn-primary mr-1"><i class="iconsminds-dollar-sign-2"></i> Set Custom Pricing</a>
      </div>
    </div>
    <?php if (!empty($course_slots)): ?>
    <?php foreach ($course_slots as $course_id => $course): ?>
    <?php $title = $course['course_title'];?>
    <?php $slots = $course['slots'];?>
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="pb-1 border-bottom mb-3">
          <?php echo $title; ?>
        </h4>
        <div class="mx-n2 my-n1 text-center text-md-left">
          <?php if (!empty($slots)): ?>
          <?php foreach ($slots as $i => $slot): extract($slot);?>
          <button type="button" data-coaching_id="<?php echo $coaching_id; ?>" data-slot_id="<?php echo $id; ?>" data-toggle="tooltip" data-html="true" data-placement="right"
            title="<strong><?php echo $name; ?></strong><br /><em><strong>User Limit: </strong><?php echo $max_users === 0 ? "Unlimited" : $max_users; ?></em><br/><em><strong>Booked: </strong><?php echo $max_users === 0 ? "Unlimited" : $max_users; ?></em>"
            class="btn btn-outline-primary default book-slot m-1 px-md-5">
            <?php printf("<span class='d-block ml-n4 mr-4'>%s</span> To <span class='d-block mr-n4 ml-4'>%s</span>", date('h:i A', $start_time), date('h:i A', $end_time));?>
          </button>
          <?php endforeach;?>
          <?php else: ?>
          <div class="alert alert-danger mb-0">
            <?php printf("There are no slots created for %s.", $date);?>
          </div>
          <?php endif;?>
        </div>
      </div>
      <div class="card-footer">
        <a href="<?php echo site_url('coaching/slots/create_course_slot/' . $coaching_id . '/' . $course_id); ?>" class="btn btn-sm btn-primary mr-1"><i class="iconsminds-timer"></i> Create Course
          Slots</a>
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage Course Slots
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
          <a class="dropdown-item" href="javascript:void(0)">
            Dropdown link
          </a>
          <a class="dropdown-item" href="javascript:void(0)">
            Dropdown link
          </a>
        </div>
        <a class="btn btn-sm btn-info mr-1">Manage Common Slots</a>
      </div>
    </div>
    <?php endforeach;?>
    <?php else: ?>
    <div class="card mb-3">
      <div class="card-body">
        <div class="mx-n2 my-n1 text-center text-md-left">
          <div class="alert alert-danger mb-0">
            You have not created any course yet. Slots can me added inside a course only.
          </div>
        </div>
      </div>
    </div>
    <?php endif;?>
  </div>
</div>

<div class="modal fade modal-right" id="addSlot" tabindex="-1" role="dialog" aria-labelledby="addSlot" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <?php echo form_open('coaching/slot_actions/create_slot/' . $coaching_id, ['class' => 'validate-form']); ?>
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Add Slot</h5>
        <input type="hidden" name="course_id" value="0">
        <input type="hidden" name="slot_id" value="0">
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
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
        <span id="delete_container"></span>
        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>