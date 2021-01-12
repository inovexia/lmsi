    <div class="form-group">
        <label>Date</label>
        <?php
        if ($result['date']) {
            $date = date ('Y-m-d', $result['date']);
        } else {
            $date = date ('Y-m-d');
        }
        ?>
        <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date ('Y-m-d'); ?>" max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" value="<?php echo set_value ('date', $date); ?>">
    </div>

    <div class="form-group">
        <label>Start Time</label>
        <?php
        if ($result['start_time']) {
            $start_time = date ('H:i', $result['start_time']);
        } else {
            $start_time = date ('H:i');
        }
        ?>
        <input type="time" class="form-control" placeholder="" name="start_time" value="<?php echo $start_time; ?>">
    </div>

    <div class="form-group">
        <label>End Time</label>
        <?php
        if ($result['end_time']) {
            $end_time = date ('H:i', $result['end_time']);
        } else {
            $end_time = date ('H:i', strtotime('+1 hour'));
        }
        ?>
        <input type="time" class="form-control" placeholder="" name="end_time" value="<?php echo $end_time; ?>">
    </div>

    <div class="form-group">
        <label>Appointment Type</label>
        <?php
        if ($result['max_appointment']) {
            $max_appointment = $result['max_appointment'];
        } else {
            $max_appointment = 0;
        }
        ?>

        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="customCheck1" name="appointment_type" value="<?php echo APPOINTMENT_TYPE_SINGLE; ?>" <?php if ($result['slot_type'] == APPOINTMENT_TYPE_SINGLE) { echo 'checked="checked"';} ?> >
            <label class="custom-control-label" for="customCheck1">Single</label>
            <p class="text-muted">Only one user can book this slot</p>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="customCheck2" name="appointment_type" value="<?php echo APPOINTMENT_TYPE_MULTIPLE; ?>" <?php if ($result['slot_type'] == APPOINTMENT_TYPE_MULTIPLE) { echo 'checked="checked"';} ?>>
            <label class="custom-control-label" for="customCheck2">Multiple</label>
            <p class="text-muted">More than one user can book this slot</p>
            <label class="form-label">Maximum users </label>
            <input type="number" min="0" length="6" value="<?php echo $max_appointment; ?>" class="form-control" name="max_appointment">
            <p class="text-muted">Enter 0 for no limit</p>
        </div>
    </div>
