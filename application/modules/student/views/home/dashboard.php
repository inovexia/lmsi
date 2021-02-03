<div class="row">
  <div class="col-md-6 col-xl-3 col-12 mb-4">
    <div class="card">
      <div class="card-body pb-0 text-center">
        <h5 class="card-title mb-2">My Appointments</h5>
      </div>
      <div class="card-header pl-0 pr-0">
        <ul class="nav nav-tabs card-header-tabs ml-0 mr-0" role="tablist">
          <li class="nav-item w-50 text-center">
            <a class="nav-link active" id="upcoming" data-toggle="tab" href="#upcoming-appointments" role="tab" aria-controls="first" aria-selected="true">
              <i class="iconsminds-clock-forward"></i>
              <span>Upcoming</span>
            </a>
          </li>
          <li class="nav-item w-50 text-center">
            <a class="nav-link" id="history" data-toggle="tab" href="#past-appointments" role="tab" aria-controls="second" aria-selected="false">
              <i class="iconsminds-clock-back"></i>
              <span>History</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane fade active show" id="upcoming-appointments" role="tabpanel" aria-labelledby="upcoming">
            <div class="scroll dashboard-logs">
              <table class="table table-sm table-borderless align-middle">
                <tbody>
                  <?php foreach ($upcoming_slots as $i => $upcoming_slot): ?>
                  <tr>
                    <td width="5%">
                      <span class="log-indicator border-success align-middle"></span>
                    </td>
                    <td>
                      <a href="<?php echo site_url('student/courses/home/' . $upcoming_slot['coaching_id'] . '/' . $upcoming_slot['member_id'] . '/' . $upcoming_slot['course_id']); ?>"
                        class="font-weight-medium">
                        <?php echo $upcoming_slot['course_title']; ?>
                      </a>
                    </td>
                    <td class="text-right">
                      <span class="text-muted">
                        <?php echo date('Y-m-d', $upcoming_slot['date']) . " " . date('h:i A', $upcoming_slot['start_time']); ?>
                      </span>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="past-appointments" role="tabpanel" aria-labelledby="history">
            <div class="scroll dashboard-logs">
              <table class="table table-sm table-borderless align-middle">
                <tbody>
                  <?php foreach ($past_slots as $i => $past_slot): ?>
                  <tr>
                    <td width="5%">
                      <span class="log-indicator border-danger align-middle"></span>
                    </td>
                    <td>
                      <a href="<?php echo site_url('student/courses/home/' . $past_slot['coaching_id'] . '/' . $past_slot['member_id'] . '/' . $past_slot['course_id']); ?>" class="font-weight-medium">
                        <?php echo $past_slot['course_title']; ?>
                      </a>
                    </td>
                    <td class="text-right">
                      <span class="text-muted">
                        <?php echo date('Y-m-d', $past_slot['date']) . " " . date('h:i A', $past_slot['start_time']); ?>
                      </span>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-6 mb-4">
    <div class="card h-100">
      <div class="card-body pb-0 text-center">
        <h5 class="card-title mb-2">Widget Above Center</h5>
      </div>
      <div class="card-body">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3 mb-4">
    <div class="card h-100">
      <div class="card-body pb-0 text-center">
        <h5 class="card-title mb-2">Widget Above Right</h5>
      </div>
      <div class="card-body">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4 mb-4">
    <div class="card h-100">
      <div class="card-body pb-0 text-center">
        <h5 class="card-title mb-2">Widget Below Left</h5>
      </div>
      <div class="card-body">
        <div class="dashboard-logs"></div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4 mb-4">
    <div class="card h-100">
      <div class="card-body pb-0 text-center">
        <h5 class="card-title mb-2">Widget Below Center</h5>
      </div>
      <div class="card-body">
        <div class="dashboard-logs"></div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4 mb-4">
    <div class="card h-100">
      <div class="card-body pb-0 text-center">
        <h5 class="card-title mb-2">Widget Below Right</h5>
      </div>
      <div class="card-body">
        <div class="dashboard-logs"></div>
      </div>
    </div>
  </div>
</div>