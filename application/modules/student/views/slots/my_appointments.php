<div class="row">
  <div class="col-12">
    <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
      <li class="nav-item mx-1">
        <a class="nav-link mr-0 active" id="upcoming" data-toggle="tab" href="#upcoming-appointments" role="tab" aria-controls="upcoming-appointments" aria-selected="true">
          <span>Upcoming</span>
          <i class="iconsminds-clock-forward"></i>
        </a>
      </li>
      <li class="nav-item mx-1">
        <a class="nav-link mr-0" id="history" data-toggle="tab" href="#past-appointments" role="tab" aria-controls="past-appointments" aria-selected="false">
          <span>History</span>
          <i class="iconsminds-clock-back"></i>
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane show active" id="upcoming-appointments" role="tabpanel" aria-labelledby="upcoming">
        <?php if (!empty($upcoming_slots)): ?>
        <div class="row">
          <?php foreach ($upcoming_slots as $i => $upcoming_slot): ?>
          <div class="col-12 mb-5">
            <div class="card flex-row listing-card-container">
              <div class="d-flex align-items-center w-100">
                <div class="p-4 text-success">
                  <i class="iconsminds-clock-forward" style="font-size: 32px"></i>
                </div>
                <div class="card-body flex-grow-1">
                  <div class="d-flex align-items-center">
                    <a class="w-30" href="<?php echo site_url('student/courses/home/' . $upcoming_slot['coaching_id'] . '/' . $upcoming_slot['member_id'] . '/' . $upcoming_slot['course_id']); ?>">
                      <h4 class="mb-0 ellipsis"><?php echo $upcoming_slot['course_title']; ?></h4>
                    </a>
                    <div class="w-20 text-center">
                      <h6>Slot Date</h6>
                      <span>
                        <?php echo date('Y-m-d', $upcoming_slot['date']); ?>
                      </span>
                    </div>
                    <div class="w-20 text-center">
                      <h6>Start Time</h6>
                      <span>
                        <?php echo date('h:i A', $upcoming_slot['start_time']); ?>
                      </span>
                    </div>
                    <div class="w-20 text-center">
                      <h6>End Time</h6>
                      <span>
                        <?php echo date('h:i A', $upcoming_slot['end_time']); ?>
                      </span>
                    </div>
                    <div class="w-10 text-right">
                      <button type="button" class="btn btn-lg btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                          Action 1
                        </a>
                        <a class="dropdown-item" href="#">
                          Action 2
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
        <?php else: ?>
        <div class="alert alert-danger" role="alert">There are no upcoming slots for you right now.</div>
        <?php endif;?>
      </div>
      <div class="tab-pane fade" id="past-appointments" role="tabpanel" aria-labelledby="history">
        <?php if (!empty($past_slots)): ?>
        <div class="row">
          <?php foreach ($past_slots as $i => $past_slot): ?>
          <div class="col-12 mb-5">
            <div class="card flex-row listing-card-container">
              <div class="d-flex align-items-center w-100">
                <div class="p-4 text-danger">
                  <i class="iconsminds-clock-back" style="font-size: 32px"></i>
                </div>
                <div class="card-body flex-grow-1">
                  <div class="d-flex align-items-center">
                    <a class="w-30" href="<?php echo site_url('student/courses/home/' . $past_slot['coaching_id'] . '/' . $past_slot['member_id'] . '/' . $past_slot['course_id']); ?>">
                      <h4 class="mb-0 ellipsis"><?php echo $past_slot['course_title']; ?></h4>
                    </a>
                    <div class="w-20 text-center">
                      <h6>Slot Date</h6>
                      <span>
                        <?php echo date('Y-m-d', $past_slot['date']); ?>
                      </span>
                    </div>
                    <div class="w-20 text-center">
                      <h6>Start Time</h6>
                      <span>
                        <?php echo date('h:i A', $past_slot['start_time']); ?>
                      </span>
                    </div>
                    <div class="w-20 text-center">
                      <h6>End Time</h6>
                      <span>
                        <?php echo date('h:i A', $past_slot['end_time']); ?>
                      </span>
                    </div>
                    <div class="w-10 text-right">
                      <button type="button" class="btn btn-lg btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                          Action 1
                        </a>
                        <a class="dropdown-item" href="#">
                          Action 2
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
        <?php else: ?>
        <div class="alert alert-danger" role="alert">There are no upcoming slots for you right now.</div>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>