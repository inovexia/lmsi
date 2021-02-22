<div class="new-modal">
  <div class="modal-dialogs" role="document" style="max-width:800px; margin:0px auto">
    <div class="modal-content">
      <?php echo form_open ('coaching/slot_actions/create_slot/'.$coaching_id, ['class'=>'validate-form']); ?>
      <div class="modal-body">
        <div id="output-selector">
          <div class="form-group">
            <label class="text-primary font-weight-bold">Slot Name</label>
            <input type="text" class="form-control" placeholder="Slot name" name="slot_name">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="text-primary font-weight-bold">Start Time</label>
              <input type="time" class="form-control" placeholder="" name="start_time" min="<?php echo date ('H:i'); ?>"
                value="<?php echo date ('H:i'); ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="text-primary font-weight-bold">End Time</label>
              <input type="time" class="form-control" placeholder="" name="end_time" min="<?php echo date ('H:i'); ?>"
                value="<?php echo date ('H:i', strtotime('+1 hour')); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="text-primary font-weight-bold">Appointment Type</label>
            <div class="d-md-flex">
              <div class="custom-control custom-radio col-md-6">
                <input type="radio" class="custom-control-input type" id="customCheck1" name="appointment_type"
                  value="<?php echo APPOINTMENT_TYPE_SINGLE; ?>"
                  <?php echo set_radio ('appointment_type', APPOINTMENT_TYPE_SINGLE, true); ?>>
                <label class="custom-control-label" for="customCheck1">Single User</label>
                <p class="text-muted">Only one user can book this slot</p>
              </div>
              <div class="custom-control custom-radio col-md-6">
                <input type="radio" class="custom-control-input type" id="customCheck2" name="appointment_type"
                  value="<?php echo APPOINTMENT_TYPE_MULTIPLE; ?>"
                  <?php echo set_radio ('appointment_type', APPOINTMENT_TYPE_MULTIPLE); ?>>
                <label class="custom-control-label" for="customCheck2">Multiple User</label>
                <p class="text-muted">More than one user can book this slot</p>

              </div>
            </div>

            <div class="input-user-limit col-12 px-0" style="display:none">
              <label class="form-label">Maximum users </label>
              <input type="number" min="0" length="6" value="0" class="form-control" name="max_appointment">
              <p class="text-muted">Enter 0 for no limit</p>
            </div>
            <div class="courses-box">
              <div class="if-single-slot">
                <div class="form-group position-relative">
                  <label class="text-primary font-weight-bold">Select Course</label>
                  <div class="course-selection-checkbox">
                    <div class="custom-control custom-checkbox col-md-4">
                      <input type="checkbox" class="custom-control-input" id="jQueryCustomCheck1" name="jQueryCheckbox"
                        required="">
                      <label class="custom-control-label" for="jQueryCustomCheck1">Machine Learning</label>
                    </div>
                    <div class="custom-control custom-checkbox col-md-4">
                      <input type="checkbox" class="custom-control-input" id="jQueryCustomCheck2" name="jQueryCheckbox"
                        required="">
                      <label class="custom-control-label" for="jQueryCustomCheck2">Mathematics</label>
                    </div>
                    <div class="custom-control custom-checkbox col-md-4">
                      <input type="checkbox" class="custom-control-input" id="jQueryCustomCheck3" name="jQueryCheckbox"
                        required="">
                      <label class="custom-control-label" for="jQueryCustomCheck3">English Grammer</label>
                    </div>
                    <div class="custom-control custom-checkbox col-md-4">
                      <input type="checkbox" class="custom-control-input" id="jQueryCustomCheck4" name="jQueryCheckbox"
                        required="">
                      <label class="custom-control-label" for="jQueryCustomCheck4">Biology</label>
                    </div>
                  </div>
                  <div class="course-selection-radio" style="display:none">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="machine_learning" name="courseselection" class="custom-control-input"
                        required="">
                      <label class="custom-control-label" for="machine_learning">
                        Machine Learning
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="mathematics" name="courseselection" class="custom-control-input"
                        required="">
                      <label class="custom-control-label" for="mathematics">
                        Mathematics
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="english_grammer" name="courseselection" class="custom-control-input"
                        required="">
                      <label class="custom-control-label" for="english_grammer">
                        English Grammer
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="biology" name="courseselection" class="custom-control-input" required="">
                      <label class="custom-control-label" for="biology">
                        Biology
                      </label>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="slot-type mb-2">
            <div class="d-md-flex">

              <div class="custom-control custom-radio col-md-6">
                <input type="radio" class="custom-control-input repeat-or-single" id="oneday-slot" name="slot_type"
                  value="non-repeat" checked="checked">
                <label class="custom-control-label" for="oneday-slot">One Day Slot</label>
                <p class="text-muted">One day slot</p>
              </div>
              <div class="custom-control custom-radio col-md-6">
                <input type="radio" class="custom-control-input repeat-or-single" id="recursive-slot" name="slot_type"
                  value="recursive">
                <label class="custom-control-label" for="recursive-slot">Recursive Slot</label>
                <p class="text-muted">Repeatable slot</p>
              </div>
            </div>
          </div>
          <div class="slot-type-area">
            <div class="oneday-slot-area">
              <div class="form-row">
                <label class="text-primary font-weight-bold">Start Date</label>
                <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date ('Y-m-d'); ?>"
                  max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" value="<?php echo date ('Y-m-d'); ?>">
              </div>
            </div>
            <div class="recursive-slot-area" style="display:none">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="text-primary font-weight-bold">Start Date</label>
                  <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date ('Y-m-d'); ?>"
                    max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" value="<?php echo date ('Y-m-d'); ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="text-primary font-weight-bold">End Date</label>
                  <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date ('Y-m-d'); ?>"
                    max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" value="<?php echo date ('Y-m-d'); ?>">
                </div>
              </div>
              <div class="day-selection-checkbox">
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day1" name="dayselection" required="">
                  <label class="custom-control-label" for="day1">Mon</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day2" name="dayselection" required="">
                  <label class="custom-control-label" for="day2">Tue</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day3" name="dayselection" required="">
                  <label class="custom-control-label" for="day3">Wed</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day4" name="dayselection" required="">
                  <label class="custom-control-label" for="day4">Thu</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day5" name="dayselection" required="">
                  <label class="custom-control-label" for="day5">Fri</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day6" name="dayselection" required="">
                  <label class="custom-control-label" for="day6">Sat</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day7" name="dayselection" required="">
                  <label class="custom-control-label" for="day7">Sun</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group position-relative mt-4">
            <label class="text-primary font-weight-bold">Slot Mode</label>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="offline" name="slot-mode" required="">
              <label class="custom-control-label" for="offline">Offline</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="online" name="slot-mode" required="">
              <label class="custom-control-label" for="online">Online</label>
            </div>
            <div class="invalid-tooltip">
              Checkboxes are required!
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
    <?php echo form_close (); ?>
  </div>
</div>