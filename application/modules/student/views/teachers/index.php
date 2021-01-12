<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header pl-0 pr-0">
        <ul class="nav nav-tabs nav-fill card-header-tabs ml-0 mr-0" role="tablist">
          <li class="nav-item text-center">
            <a class="nav-link active" id="courses_tab" data-toggle="tab" href="javascript:void(0);"
              data-target="#courses" role="tab" aria-controls="courses" aria-selected="true">Courses</a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link" id="slots_tab" data-toggle="tab" href="javascript:void(0);" data-target="#slots"
              role="tab" aria-controls="slots" aria-selected="false">Slots</a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link" id="profile_tab" data-toggle="tab" href="javascript:void(0);" data-target="#profile"
              role="tab" aria-controls="profile" aria-selected="false">Profile</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane fade active show" id="courses" role="tabpanel" aria-labelledby="courses_tab">
            <table class="table">
              <tbody>
                <?php foreach ($courses as $course): ?>
                <tr>
                  <td width="90%" class="align-middle">
                    <p class="list-item-heading"><?php echo $course['title']; ?></p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-xs btn-primary slots-toggle"
                      data-course_id="<?php echo $course['course_id']; ?>">Slots</button>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="slots" role="tabpanel" aria-labelledby="slots_tab">
            <div class="form-group mb-1">
              <button type="button" data-value="<?php echo date('d-m-Y'); ?>"
                class="btn btn-xs btn-primary active set-date">Today</button>
              <button type="button" data-value="<?php echo date('d-m-Y', strtotime(date('m/d/Y') . "+1 days")); ?>"
                class="btn btn-xs btn-primary set-date">
                <?php echo date('j<\s\up>S</\s\up> M', strtotime(date('m/d/Y') . "+1 days")); ?>
              </button>
              <button type="button" data-value="<?php echo date('d-m-Y', strtotime(date('m/d/Y') . "+2 days")); ?>"
                class="btn btn-xs btn-primary set-date">
                <?php echo date('j<\s\up>S</\s\up> M', strtotime(date('m/d/Y') . "+2 days")); ?>
              </button>
              <button type="button" data-value="<?php echo date('d-m-Y', strtotime(date('m/d/Y') . "+3 days")); ?>"
                class="btn btn-xs btn-primary set-date">
                <?php echo date('j<\s\up>S</\s\up> M', strtotime(date('m/d/Y') . "+3 days")); ?>
              </button>
            </div>
            <div class="form-group mb-1">
              <label>Select Date</label>
              <div class="input-group date">
                <input type="text" value="<?php echo date('d-m-Y'); ?>" data-date-orientation="bottom"
                  data-date-format="dd-mm-yyyy" class="form-control datepicker" id="booking_date" />
                <span class="input-group-text input-group-append input-group-addon">
                  <i class="simple-icon-calendar"></i>
                </span>
              </div>
            </div>
            <div id="courses">
              <?php foreach ($courses as $course): ?>
              <div class="form-group mb-1" data-course_id="<?php echo $course['course_id']; ?>">
                <a href="javascript:void(0);" data-toggle="collapse"
                  data-target="#course-<?php echo $course['course_id']; ?>" aria-expanded="false"
                  aria-controls="collapseOne">
                  <h4 class="pb-2 border-bottom">
                    <?php echo $course['title']; ?>
                  </h4>
                </a>
                <div id="course-<?php echo $course['course_id']; ?>" class="collapse" data-parent="#courses">
                  <?php foreach ($course['slots'] as $i => $slot): extract($slot);?>
                  <div class="d-flex mb-2">
                    <label class="flex-grow-1 my-auto"><?php echo "$start_time - $end_time"; ?></label>
                    <button type="button" data-coaching_id="<?php echo $coaching_id; ?>"
                      data-course_id="<?php echo $course['course_id']; ?>"
                      data-slot_id="<?php echo $slot['slot_id']; ?>" class="btn btn-xs btn-primary book-slot">
                      Book
                    </button>
                  </div>
                  <?php endforeach;?>
                </div>
              </div>
              <?php endforeach;?>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile_tab">
            <h3 class="mb-4">About</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident accusamus dolor officia iusto
              nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit repellat delectus qui
              perferendis nulla dolores.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident accusamus dolor officia iusto
              nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit repellat delectus qui
              perferendis nulla dolores.</p>
            <h3 class="mb-4">Certificates</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident accusamus dolor officia iusto
              nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit repellat delectus qui
              perferendis nulla dolores.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident accusamus dolor officia iusto
              nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit repellat delectus qui
              perferendis nulla dolores.</p>
            <h3 class="mb-4">Videos</h3>
            <div class="row no-gutters">
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+1" class="img-fluid mb-4" />
              </div>
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+2" class="img-fluid mb-4" />
              </div>
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+3" class="img-fluid mb-4" />
              </div>
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+4" class="img-fluid mb-4" />
              </div>
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+5" class="img-fluid mb-4" />
              </div>
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+6" class="img-fluid mb-4" />
              </div>
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+4" class="img-fluid mb-4" />
              </div>
              <div class="col-3 px-2">
                <img src="//via.placeholder.com/160x120.png?text=Video+8" class="img-fluid mb-4" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>