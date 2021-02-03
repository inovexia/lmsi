<div class="row">
  <div class="col-12 list" data-check-all="checkAll">
    <?php 
    $i = 1;
    if ( ! empty ($courses)) { 
      foreach ($courses as $row) { 
        ?>
        <div class="card mb-3">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <a class="list-item-heading mb-0 truncate w-40 w-xs-100" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>">
                        <?php echo $row['title']; ?>
                    </a>
                    <p class="mb-0 text-muted text-small w-15 w-xs-100"></p>
                    <div class="w-15 w-xs-100">
                        <?php 
                          if ($row['status'] == COURSE_STATUS_ACTIVE) {
                            echo '<span class="badge badge-pill badge-success mb-1">Published</span>';
                          } else {
                            echo '<span class="badge badge-pill badge-light mb-1">Unpublished</span>';
                          }
                        ?>
                    </div>
                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
                      <a class="btn btn-primary" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>"><i class="fa fa-cog"></i> Manage </a>
                    </p>
                </div>
            </div>
        </div>
        
        <?php
        $i++;
      }
    } else {
      ?>
      <div class="alert alert-danger" role="alert">
          <div>You have not created any course</div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
