<div class="row justify-content-center">
  <div class="col-lg-6">
    <?php echo form_open('coaching/slot_actions/create_common_slot/' . $coaching_id, ['class' => 'validate-form']); ?>
    <div class="card">
      <div class="card-body">
        <h1 class="text-primary font-weight-bold" style="font-size:22px;">Add Common Slot</h1>
        <div id="output-selector">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="form-label text-primary font-weight-bold" for="max_users">Maximum users</label>
              <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus" data-placement="right"
                title="Users limit of the slot.">
              </button>
              <input type="number" min="0" length="6" value="0" class="form-control" id="max_users" name="max_users" required />
              <p class="text-muted mb-0">Enter 0 for no limit</p>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="text-primary font-weight-bold" for="start_time">Start Time</label>
              <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus" data-placement="right"
                title="Start Time the slot."></button>
              <input type="time" class="form-control" placeholder="" name="start_time" id="start_time" value="<?php echo date('H:i'); ?>" required />
            </div>
            <div class="form-group col-md-6">
              <label class="text-primary font-weight-bold" for="end_time">End Time</label>
              <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus" data-placement="right"
                title="End Time the slot."></button>
              <input type="time" class="form-control" placeholder="" name="end_time" id="end_time" value="<?php echo date('H:i', strtotime('+1 hour')); ?>" required />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="text-primary font-weight-bold" for="slot_date">Start Date</label>
              <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus" data-placement="right"
                title="Date of the slot."></button>
              <input type="date" class="form-control" placeholder="" id="slot_date" name="slot_date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+90 days')); ?>"
                value="<?php echo date('Y-m-d'); ?>" required />
            </div>
          </div>
          <div class="recursive-slot-area mt-3">
            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="repeat-session" name="repeat_slot" />
                <label class="custom-control-label text-primary font-weight-bold" for="repeat-session">Repeat
                  Session</label>
                <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus"
                  data-placement="right" title="Repeat
                slot same time for future dates."></button>
              </div>
            </div>
            <div class="day-selection-checkbox" style="display:none;">
              <div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day1" value="1" name="days[]" />
                  <label class="custom-control-label" for="day1">Mon</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day2" value="2" name="days[]" />
                  <label class="custom-control-label" for="day2">Tue</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day3" value="3" name="days[]" />
                  <label class="custom-control-label" for="day3">Wed</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day4" value="4" name="days[]" />
                  <label class="custom-control-label" for="day4">Thu</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day5" value="5" name="days[]" />
                  <label class="custom-control-label" for="day5">Fri</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day6" value="6" name="days[]" />
                  <label class="custom-control-label" for="day6">Sat</label>
                </div>
                <div class="custom-control custom-checkbox mr-4 d-inline-block">
                  <input type="checkbox" class="custom-control-input" id="day7" value="7" name="days[]" />
                  <label class="custom-control-label" for="day7">Sun</label>
                </div>
              </div>
              <div class="form-row mt-3">
                <div class="form-group col-12">
                  <label class="text-primary font-weight-bold" for="end_date">End Date</label>
                  <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus"
                    data-placement="right" title="End Date of the slot repeat."></button>
                  <input type="date" class="form-control" placeholder="" id="end_date" name="end_date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+90 days')); ?>"
                    value="<?php echo date('Y-m-d'); ?>" />
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="text-primary font-weight-bold" for="price_all_slots">General Price Per Student</label>
              <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus" data-placement="right"
                title="General cost of the slot per student."></button>
              <div class="slot-price d-flex">
                <div class="currency-symbol form-control text-primary font-weight-bold" style="width:35px; padding-top:13px">
                  $
                </div>
                <input type="number" class="form-control price" min="0" value="0" placeholder="Price" id="price_all_slots" name="price_all_slots" />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="text-primary font-weight-bold">Slot Mode</label>
              <button type="button" class="btn p-0 btn-link text-primary simple-icon-question" style="cursor:pointer;font-weight:600;" data-toggle="tooltip" data-trigger="focus" data-placement="right"
                title="Kind of Slot Offline, Online or both."></button>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="offline" name="slot_mode" value="1" required />
                <label class="custom-control-label" for="offline">Offline</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="online" name="slot_mode" value="2" required />
                <label class="custom-control-label" for="online">Online</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="both" name="slot_mode" value="3" required />
                <label class="custom-control-label" for="both">Both</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <input type="hidden" name="slot_id" value="0" />
        <button type="submit" class="btn btn-sm btn-primary mr-2">Save</button>
        <span id="delete_container"></span>
        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>