<div class="row">   
    <div class="col-12 col-lg-6 mx-auto">
        <div class="card mb-4">
            <div class="card-body">
            <h5 class="mb-4">Create a new slot</h5>
            <?php echo form_open ('', array('id'=>'validate-slot')); ?>
                <div class="form-group col-12">
                    <label for="subject">Select Subject</label>
                    <select id="subject" class="form-control select2-single" name="subject">
                    <option value="" selected>Select a subject</option>
                    <option value="Course 1">Course 1</option>
                    <option value="Course 2">Course 2</option>
                    <option value="Course 3">Course 3</option>
                    <option value="Course 4">Course 4</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label for="date">Select Date</label> 
                    <div class="input-group date" data-date-start-date="" data-date-format="dd-mm-yyyy">
                    <input id="date" type="text" class="form-control" name="date"
                        value="" />
                    <span class="input-group-text input-group-append input-group-addon">
                        <i class="simple-icon-calendar"></i>
                    </span>
                    </div>
                </div>
                <div class="form-group col-12">
                <label for="start">Start Time</label> 
                <input id="start" class="form-control" type="time" name="start"
                    value="" />
                </div>
                <div class="form-group col-12">
                <label for="end">End Time</label> 
                <input id="end" class="form-control" type="time" name="end"
                    value="" />
                </div>
                <div class="form-group col-12">
                    <label>Appointment Type</label> 
                    <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="single" name="type" class="custom-control-input"
                        value=""
                        />
                        <label class="custom-control-label" for="single">Single</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="multiple" name="type" class="custom-control-input"
                        value=""
                        />
                        <label class="custom-control-label" for="multiple">Multiple</label>
                    </div>
                    </div>
                </div>
                <div class="form-row col-12">
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-html="true" data-placement="right"
                        data-original-title="<small>Create a New Slot</small>">
                        <i class="fas fa-plus"></i>
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>











<div class="card mb-4 d-none">
  <div class="card-body">
  <?php echo form_open ('', array('id'=>'validate-slot')); ?>
   
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="subject">Select Subject</label> <button type="button"
          class="btn btn-light bg-transparent border-0 p-0" data-toggle="tooltip" data-placement="right"
          data-html="true" data-original-title="<small>Courses created<br/>by current user.</small>"><i
            class="fas fa-question-circle"></i></button>
        <select id="subject" class="form-control select2-single" name="subject">
          <option value="" selected>Select a subject</option>
          
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="date">Select Date</label> <button type="button" class="btn btn-light bg-transparent border-0 p-0"
          data-toggle="tooltip" data-placement="right" data-html="true"
          data-original-title="<small>Select date<br/>for the slot.</small>"><i
            class="fas fa-question-circle"></i></button>
        <div class="input-group date" data-date-start-date="<?php echo date(
            'd-m-Y',
            time()
        ); ?>" data-date-format="dd-mm-yyyy">
          <input id="date" type="text" class="form-control" name="date"
            value="<?php echo isset($date) ? date('d-m-Y', $date) : null; ?>" />
          <span class="input-group-text input-group-append input-group-addon">
            <i class="simple-icon-calendar"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="start">Start Time</label> <button type="button" class="btn btn-light bg-transparent border-0 p-0"
          data-toggle="tooltip" data-placement="right" data-html="true"
          data-original-title="<small>Select start time<br/>for the slot.</small>"><i
            class="fas fa-question-circle"></i></button>
        <input id="start" class="form-control" type="time" name="start"
          value="<?php echo isset($start_time) ? date('H:i', $start_time) : null; ?>" />
      </div>
      <div class="form-group col-sm-6">
        <label for="end">End Time</label> <button type="button" class="btn btn-light bg-transparent border-0 p-0"
          data-toggle="tooltip" data-placement="right" data-html="true"
          data-original-title="<small>Select end time<br/>for the slot.</small>"><i
            class="fas fa-question-circle"></i></button>
        <input id="end" class="form-control" type="time" name="end"
          value="<?php echo isset($end_time) ? date('H:i', $end_time) : null; ?>" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label>Appointment Type</label> <button type="button" class="btn btn-light bg-transparent border-0 p-0"
          data-toggle="tooltip" data-placement="right" data-html="true"
          data-original-title="<small>Select appointment<br/>type for the slot.</small>"><i
            class="fas fa-question-circle"></i></button>
        <div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="single" name="type" class="custom-control-input"
              value=""
             />
            <label class="custom-control-label" for="single">Single</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="multiple" name="type" class="custom-control-input"
              value=""
               />
            <label class="custom-control-label" for="multiple">Multiple</label>
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-html="true" data-placement="right"
        data-original-title="<small>Create a New Slot</small>">
        <i class="fas fa-plus"></i>
        Create
      </button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
                
               