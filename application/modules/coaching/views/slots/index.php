<div class="row">
    <div class="col-12 list" data-check-all="checkAll">
        <?php 
        if (! empty ($courses)) {
            foreach ($courses as $title=>$slots) {
                ?>
                <div class="card ">
                    <div class="card-body">
                        <h4 class="card-title border-bottom"><?php echo $title; ?></h4>
                        <?php
                        if (! empty ($slots)) {
                            foreach ($slots as $slot) {
                                ?>
                                <span class="badge badge-pill badge-secondary">
                                    <?php echo date ('h:i a', $slot['start_time']); ?> - 
                                    <?php echo date ('h:i a', $slot['end_time']); ?>
                                </span>
                                <?php
                            }
                        }
                        ?>
                        <div class="my-2 mt-2">
                             <button type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal"
                                data-backdrop="static" data-target="#addSlot" data-course-id="<?php echo $slot['course_id']; ?>" data-slot-id="<?php echo $slot_id; ?>">Add Slot</button>
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
            <div class="modal-header">
                <h5 class="modal-title">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open ('coaching/slot_actions/create_slot/'.$coaching_id); ?>
                    <input type="" name="course_id">
                    <input type="" name="slot_id">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea placeholder="" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control">
                            <option label="&nbsp;">&nbsp;</option>
                            <option value="Flexbox">Flexbox</option>
                            <option value="Sass">Sass</option>
                            <option value="React">React</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                id="customCheck1">
                            <label class="custom-control-label"
                                for="customCheck1">Completed</label>
                        </div>
                    </div>
                <?php echo form_close (); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary"
                    data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>