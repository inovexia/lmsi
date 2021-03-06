<div class="card">
  <?php echo form_open ('coaching/lesson_actions/create_lesson/'.$coaching_id.'/'.$course_id.'/'.$lesson_id, array('class' => 'card', 'class'=>'validate-form',  'id' => 'validate-1')); ?>
  <div class="card-body">

    <div class="form-group">
      <label for="title">Title<span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="title" placeholder="Title of the chapter" required
        value="<?php echo set_value ('title', $lesson['title']); ?>">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control tinyeditor" name="description" rows="10"
        placeholder="How you describe this lesson?"><?php echo set_value ('description', $lesson['description']); ?></textarea>
    </div>

    <div class="form-group row">
      <div class="col-md-4">
        <label for="duration">Duration </label>
        <?php
					if ($lesson['duration']) {
						$duration = $lesson['duration'];
					} else {
						$duration = 0;
					}
					?>
        <input type="number" class="form-control required" name="duration"
          value="<?php echo set_value ('duration', $duration); ?>" min=0 max="500">
        <p class="text-muted">Estimated duration of this chapter. Set 0 if you are not sure</p>
      </div>

      <div class="col-md-2">
        <label for="title">Unit </label>
        <select class="form-control" name="duration_type">
          <option value="<?php echo LESSON_DURATION_MIN; ?>"
            <?php if ($lesson['duration_type'] == LESSON_DURATION_MIN) echo 'selected="selected"'; ?>>Minute(s)</option>
          <option value="<?php echo LESSON_DURATION_HOUR; ?>"
            <?php if ($lesson['duration_type'] == LESSON_DURATION_HOUR) echo 'selected="selected"'; ?>>Hour(s)</option>
          <option value="<?php echo LESSON_DURATION_WEEK; ?>"
            <?php if ($lesson['duration_type'] == LESSON_DURATION_WEEK) echo 'selected="selected"'; ?>>Week(s)</option>
        </select>
      </div>
    </div>

    <div class="form-group row mb-1">
      <label class="col-12 col-form-label">Publish</label>
      <div class="col-12">
        <?php
						if ($lesson_id == 0) {
							$checked = 'checked';
						} else if ($lesson_id > 0 && $lesson['status'] == 1) {
							$checked = 'checked';
						} else {
							$checked = '';
						}
					?>
        <div class="custom-switch custom-switch-primary-inverse mb-2 custom-switch-small">
          <input name="status" class="custom-switch-input" id="status" type="checkbox" <?php echo $checked; ?>
            value="1">
          <label class="custom-switch-btn" for="status"></label>
        </div>
      </div>
    </div>

  </div>

  <div class="card-footer">
    <input type="submit" name="submit" class="btn btn-primary" value="Save" data-toggle="tooltip" data-placement="right"
      title="Save">
    <a href="#"
      onclick="show_confirm ('Delete this chapter? Please note that this is a permanent action and cannot be un-do.', '<?php echo site_url ('coaching/lesson_actions/delete_lesson/'.$coaching_id.'/'.$course_id.'/'.$lesson_id); ?>')"
      class="btn btn-link text-danger ">Delete Chapter</a>
  </div>
  <?php echo form_close(); ?>
</div>