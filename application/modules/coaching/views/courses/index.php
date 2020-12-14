<div class="row ">
    <div class="col-12" data-check-all="checkAll"> 
    <?php 
    $i = 1;
    if ( ! empty ($courses)) { 
      foreach ($courses as $row) { 
        ?>
        <div class="card d-flex flex-row mb-3">
          <div class="d-flex flex-grow-1 min-width-zero">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div class="flex-grow-1">
                  <div class="align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <a class="list-item-heading mb-0 w-40 w-xs-100 mt-0" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>">
                        <div class="d-flex">
                          <span class="mr-2"><?php echo $i; ?>.</span>
                          <div class="flex-grow-1 my-auto truncate">
                            <?php echo $row['title']; ?>
                            <div class="text-muted text-small">
                          </div>
                        </div>
                    </a>
                    <p class="my-2 my-md-0 text-muted text-small w-15 w-xs-100">
                      <?php 
                        if ($row['status'] == COURSE_STATUS_ACTIVE) {
                          echo '<span class="badge badge-success">Published</span>';
                        } else {
                          echo '<span class="badge badge-danger">Unpublished</span>';
                        }
                        ?>
                    </p>
                    <p class="mb-2 mb-md-0 text-muted text-small w-15 w-xs-100">
                    </p>
                  </div>
                </div>
                  <div class="flex-shrink-0">
                    <a class="btn btn-primary" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>"><i class="fa fa-cog"></i> Manage </a>

                  </div>
                </div>
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