<div class="new-modal">
  <div class="modal-dialogs" role="document" style="max-width:800px; margin:0px auto">
    <div class="modal-content p-3 p-md-4 p-lg-5">
      <h1 class="text-primary font-weight-bold" style="font-size:22px;">Common Slot</h1>
      <?php echo form_open ('coaching/slot_actions/create_slot/'.$coaching_id, ['class'=>'validate-form']); ?>
      <div class="modal-body p-0">
        <div id="output-selector">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="form-label text-primary font-weight-bold">Maximum users </label>
              <input type="number" min="0" length="6" value="0" class="form-control" name="max_appointment">
              <p class="text-muted">Enter 0 for no limit</p>
            </div>
            <div class="form-group col-md-6">
              <label class="text-primary font-weight-bold">Start Date</label>
              <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date ('Y-m-d'); ?>"
                max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" value="<?php echo date ('Y-m-d'); ?>">
            </div>
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
          <div class="recursive-slot-area mt-3" style="">
            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="repeat-session" name="slot-type" required="">
                <label class="custom-control-label text-primary font-weight-bold" for="repeat-session">Repeat
                  Session</label>
              </div>
            </div>
            <div class="day-selection-checkbox" style="display:none;">
              <div class="">
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
              <div class="form-row mt-3">
                <div class="form-group col-12">
                  <label class="text-primary font-weight-bold">End Date</label>
                  <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date ('Y-m-d'); ?>"
                    max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" value="<?php echo date ('Y-m-d'); ?>">
                </div>
              </div>
            </div>

          </div>

          <div class="form-group">
            <label class="text-primary font-weight-bold">General Price Per Student</label>
            <div class="slot-price d-flex">
              <div class="currency-symbol form-control text-primary font-weight-bold"
                style="width:35px; padding-top:13px">
                $
              </div>
              <input type="text" class="form-control price " placeholder="Price" name="price">
            </div>
          </div>
          <div class="form-group">
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