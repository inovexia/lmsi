<div class="row mb-1">
    <div class="col-12 " >
        <form class="form-inline">
            <?php
            for ($i=0; $i<3; $i++) {
                $dt = mktime (0, 0, 0, date ('m'), date('d')+$i, date ('Y'));
                if ($dt == $date) {
                    $selected = 'btn-success';
                } else {
                    $selected = 'btn-outline-success';                    
                }
                $d = date ('D, d', strtotime('+'.$i.' days'));
                echo '<a href="'.site_url ('coaching/slots/index/'.$coaching_id.'/'.$dt).'" class="btn btn-sm '.$selected.' mb-1 mr-1">'.$d.'</a>';
            }
            $dt = mktime (0, 0, 0, date ('m'), date('d')+3, date ('Y'));
            ?>
            <input type="date" name="" class="form-control my-2" min="<?php //echo date ('Y-m-d'); ?>" max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" placeholder="Select date" value="<?php echo date ('Y-m-d', strtotime('+3 days')); ?>" onchange="change_date(<?php echo $dt; ?>)">
        </form>
    </div>
</div>


<div class="row">
    <div class="col-12 list" data-check-all="checkAll">
        <?php 
        if (! empty ($courses)) {
            foreach ($courses as $course_id=>$course) {
                $title = $course['course_title'];
                $slots = $course['slots'];
                ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title border-bottom"><?php echo $title; ?></h4>
                        <?php
                        if (! empty ($slots)) {
                            foreach ($slots as $slot) {
                                ?>
                                <button type="button" class="btn btn-xs btn-info mb-2" data-toggle="modal" data-backdrop="static" data-target="#addSlot" data-course-id="<?php echo $course_id; ?>" data-slot-id="<?php echo $slot['slot_id']; ?>">
                                    <?php echo date ('h:i a', $slot['start_time']); ?> - 
                                    <?php echo date ('h:i a', $slot['end_time']); ?>
                                </button>
                                <?php
                            }
                        }
                        ?>
                        <div class="my-2 mt-2">
                             <button type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-backdrop="static" data-target="#addSlot" data-course-id="<?php echo $course_id; ?>" data-slot-id="0">Add Slot</button>
                        </div>
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
            <?php echo form_open ('coaching/slot_actions/create_slot/'.$coaching_id, ['class'=>'validate-form']); ?>
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
                            <input type="date" class="form-control" placeholder="" name="date" min="<?php echo date ('Y-m-d'); ?>" max="<?php echo date ('Y-m-d', strtotime('+90 days')); ?>" value="<?php echo date ('Y-m-d'); ?>">
                        </div>

                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="time" class="form-control" placeholder="" name="start_time" min="<?php echo date ('h:i a'); ?>" value="<?php echo date ('h:i a'); ?>">
                        </div>

                        <div class="form-group">
                            <label>End Time</label>
                            <input type="time" class="form-control" placeholder="" name="end_time" min="<?php echo date ('h:i a'); ?>" value="<?php echo date ('h:i a', strtotime('+1 hour')); ?>">
                        </div>

                        <div class="form-group">
                            <label>Appointment Type</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customCheck1" name="appointment_type" value="<?php echo APPOINTMENT_TYPE_SINGLE; ?>" <?php echo set_radio ('appointment_type', APPOINTMENT_TYPE_SINGLE, true); ?> >
                                <label class="custom-control-label" for="customCheck1">Single</label>
                                <p class="text-muted">Only one user can book this slot</p>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customCheck2" name="appointment_type" value="<?php echo APPOINTMENT_TYPE_MULTIPLE; ?>" <?php echo set_radio ('appointment_type', APPOINTMENT_TYPE_MULTIPLE); ?>>
                                <label class="custom-control-label" for="customCheck2">Multiple</label>
                                <p class="text-muted">More than one user can book this slot</p>
                                <label class="form-label">Maximum users </label>
                                <input type="number" min="0" length="6" value="0" class="form-control" name="max_appointment">
                                <p class="text-muted">Enter 0 for no limit</p>
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