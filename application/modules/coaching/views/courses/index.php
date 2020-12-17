<div class="row">
  <div class="col-12 list" data-check-all="checkAll">
    <?php 
    $i = 1;
    if ( ! empty ($courses)) { 
      foreach ($courses as $row) { 
        ?>
        <div class="card d-flex flex-row mb-3">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <a class="list-item-heading mb-0 truncate w-40 w-xs-100" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>">
                        <?php echo $row['title']; ?>
                    </a>
                    <p class="mb-0 text-muted text-small w-15 w-xs-100"></p>
                    <div class="w-15 w-xs-100">
                        <?php 
                          if ($row['status'] == COURSE_STATUS_ACTIVE) {
                            echo '<span class="badge badge-pill badge-primary">Published</span>';
                          } else {
                            echo '<span class="badge badge-pill badge-light">Unpublished</span>';
                          }
                        ?>
                    </div>
                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
                      <a class="btn btn-primary" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>"><i class="fa fa-cog"></i> Manage </a>
                    </p>
                </div>
                <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-label">&nbsp;</span>
                </label>
            </div>
        </div>
        
        <?php
        $i++;
      }
    } else {
      ?>
      <div class="alert alert-danger" role="alert">
          <p class="">You have not created any course</p>
      </div>
      <?php echo anchor ('coaching/courses/create/'.$coaching_id.'/'.$cat_id, 'Create a new course', ['class'=>'btn btn-primary']); ?>
      <?php
    }
    ?>
  </div>
</div>
