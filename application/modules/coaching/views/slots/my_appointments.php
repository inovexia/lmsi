<div class="row">
  <div class="col-12 list" data-check-all="checkAll">
    <?php foreach ($appointments as $i => $appointment): ?>
    <div class="card d-flex flex-row mb-3">
      <div class="d-flex flex-grow-1 min-width-zero">
        <label class="custom-control custom-checkbox checkbox-left mb-1 align-self-center pr-4">
          <input type="checkbox" class="custom-control-input"name="mycheck[]" value="<?php echo $i; ?>" />
          <span class="custom-control-label">&nbsp;</span>
        </label>
        <div
          class="card-body p-4 align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
          <a class="list-item-heading mb-0 truncate w-20 w-xs-100" href="#" title="Student Name">
            <?php echo 'Student ' . ++$i; ?>
          </a>
          <p class="mb-0 text-muted text-small w-10 w-xs-100"><?php echo 'Subject ' .
              ($i + 10); ?></p>
          <p class="mb-0 text-muted text-small">02.04.2018</p>
          <p class="mb-0 text-muted text-small w-5 w-xs-100">16:30</p>
          <p class="mb-0 text-muted text-small w-5 w-xs-100">18:00</p>
          <div>
            <span
              class="badge badge-pill badge-<?php echo $acted[$i%2]['class']; ?>"><?php echo $acted[$i%2]['label']; ?></span>
          </div>
          <div class="text-right text-lg-left">
            <?php if(!empty($actions)): ?>
            <div class="btn-group" role="group" aria-label="Actions">
              <?php foreach($actions as $action): extract($action); ?>
              <button type="button" <?php echo "class=\"btn btn-$class\""; ?> data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $label; ?>">
                <?php echo "<i class=\"fas fa-$icon\"></i> <span class=\"d-none d-lg-inline-block\">$label</span>"; ?>
              </button>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>