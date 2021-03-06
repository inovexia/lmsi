<?php 
    $i = 1;
    if ( ! empty ($lessons)) { 
      foreach ($lessons as $row) { 
        ?>
        <div class="card d-flex flex-row mb-3 pl-4 align-middle">
            <label class="custom-control custom-checkbox mb-1 align-self-center ">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-label">&nbsp;</span>
            </label>

            <a class="d-flex flex-shrink-1 align-self-center" href="<?php echo site_url ('coaching/lessons/pages/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id']); ?>">

            </a>
            <div class="d-flex flex-grow-1 min-width-zero">
              <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">

                <a href="<?php echo site_url ('coaching/lessons/pages/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id']); ?>" class="w-40 w-sm-100">
                    <p class="list-item-heading mb-1 truncate">
                      <?php echo $row['title']; ?><br>
                    </p>
                    <p class="mb-0 text-muted ">
                      <?php echo character_limiter ($row['description'], 100); ?>
                    </p>
                </a>
                <p class="mb-0  w-15 w-xs-100">
                  <div class="custom-switch custom-switch-primary-inverse mb-2 custom-switch-small">
                    <input class="custom-switch-input switch_demo" id="demo<?php echo $row['lesson_id']; ?>"
                      data-id="<?php echo $row['lesson_id']; ?>" type="checkbox" value="1"
                      <?php if ($row['for_demo'] == 1) echo 'checked'; ?>>
                    <label class="custom-switch-btn" for="demo<?php echo $row['lesson_id']; ?>"></label><br>
                    <span class="text-small">For Demo</span>
                  </div>
                  
                </p>
                <div class="w-15 w-xs-100">
                  <?php 
                    if ($row['status'] == LESSON_STATUS_PUBLISHED) {
                      echo '<span class="badge badge-pill badge-success mb-1">Published</span>';
                    } else {
                      echo '<span class="badge badge-pill badge-light mb-1">Unpublished</span>';
                    }
                  ?>
                </div>
              </div>
            </div>

            <div class="custom-control custom-checkbox mb-1 align-self-center pr-3">
                    
              <div class="dropdown w-20 w-xs-100 text-left text-md-right mt-2 mt-md-0">
                <a class="btn btn-link btn-xs mb-1 dropdown-toggle" type="button"
                  id="userMenu<?php echo $row['course_id'];?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="simple-icon-options-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu<?php echo $row['course_id'];?>">
                  <?php echo anchor('coaching/lessons/pages/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id'], '<i class="fa fa-cog"></i> Content ', array('title'=>'Manage Course', 'class'=>'dropdown-item')); ?>
                  <?php echo anchor('coaching/lessons/create/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id'], '<i class="fa fa-cog"></i> Edit', array('title'=>'Edit basic details', 'class'=>'dropdown-item')); ?>
                  <a href="javascript:void(0)" onclick="show_confirm ('This action is irreversible. Course once deleted cannot be recovered. Proceed?', '<?php echo site_url('coaching/lessons_actions/delete_lesson/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id']); ?>' )" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a> 
                </div>
              </div>

            </div>

          </div>
        
          <?php
        $i++;
      }
    } else {
      ?>
      <div class="card">
        <div class="card-body text-center">
          <p class="">You have not created any chapter in this course</p>
          <?php echo anchor ('coaching/lessons/create/'.$coaching_id.'/'.$course_id, 'Create Chapter', ['class'=>'btn btn-success']); ?>
        </div>
      </div>
      <?php
    }
?>