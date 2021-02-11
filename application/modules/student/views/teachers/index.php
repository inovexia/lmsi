<style>
#courses button span {
  position: relative;
}

#courses button span:first-child::after {
  content: "\02937";
  position: absolute;
  left: 0;
  top: 100%;
}

#courses button span:last-child::before {
  content: "\02935";
  position: absolute;
  right: 0;
  bottom: 100%;
}
</style>
<div class="row justify-content-center">
  <div class="col-12">
    <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
      <li class="nav-item mx-1">
        <a class="nav-link active" id="slots_tab" data-toggle="tab" href="javascript:void(0);" data-target="#slots" role="tab" aria-controls="slots" aria-selected="false">
          Book Slots
        </a>
      </li>
      <li class="nav-item mx-1">
        <a class="nav-link" id="profile_tab" data-toggle="tab" href="javascript:void(0);" data-target="#profile" role="tab" aria-controls="profile" aria-selected="false">
          Profile
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade active show" id="slots" role="tabpanel" aria-labelledby="slots_tab">
        <div class="d-sm-flex align-items-center mb-3 mx-n1">
          <?php foreach ($days as $n => $day): ?>
          <a href="<?php echo site_url("/student/teachers/index/$coaching_id/$day"); ?>"
            class="<?php echo ($booking_date == $day) ? "btn btn-xs btn-primary disabled mx-1 mb-2 mb-sm-0" : "btn btn-xs btn-primary mx-1 mb-2 mb-sm-0"; ?>">
            <?php echo ($n === 0) ? "Today" : date("j<\s\u\p>S</\s\u\p> M", $day); ?>
          </a>
          <?php endforeach;?>
          <div class="mx-1">
            <input type="date" data-value="<?php echo $booking_date; ?>" min="<?php echo date('Y-m-d', $booking_date); ?>" value="<?php echo date('Y-m-d', $booking_date); ?>" class="form-control"
              id="booking_date" />
          </div>
        </div>
        <?php if (!empty($courses)): ?>
        <div id="courses">
          <?php foreach ($courses as $course): extract($course);?>
          <div class="card mb-3" data-course_id="<?php echo $course_id; ?>">
            <div class="card-body">
              <h4 class="pb-1 border-bottom mb-3">
                <?php echo $title; ?>
              </h4>
              <div class="mx-n2 my-n1 text-center text-md-left" id="<?php echo "course-$course_id-slots"; ?>">
                <?php if (!empty($slots)): ?>
                <?php foreach ($slots as $i => $slot): extract($slot);?>
                <button type="button" data-coaching_id="<?php echo $coaching_id; ?>" data-course_id="<?php echo $course_id; ?>" data-slot_id="<?php echo $slot_id; ?>" data-toggle="tooltip"
                  data-html="true" data-placement="top" title="<?php echo date("j<\s\u\p>S</\s\u\p> M Y", $booking_date); ?>"
                  class="<?php echo ($booked) ? "btn btn-xs btn-primary rounded-0 disabled m-1 px-md-5" : "btn btn-xs btn-primary rounded-0 book-slot m-1 px-md-5" ?>">
                  <?php printf("<span class='d-block'>%s</span> TO <span class='d-block'>%s</span>", $start_time, $end_time);?>
                </button>
                <?php endforeach;?>
                <?php else: ?>
                <div class="alert alert-danger mb-0">
                  <?php printf("There are no slots available for %s.", date("j<\s\u\p>S</\s\u\p> M Y", $booking_date));?>
                </div>
                <?php endif;?>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
        <?php else: ?>
        <div class="alert alert-danger">There are no courses available.</div>
        <?php endif;?>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile_tab">
        <h3 class="mb-4">About</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident
          accusamus dolor officia iusto
          nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit
          repellat delectus qui
          perferendis nulla dolores.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident
          accusamus dolor officia iusto
          nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit
          repellat delectus qui
          perferendis nulla dolores.</p>
        <h3 class="mb-4">Certificates</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident
          accusamus dolor officia iusto
          nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit
          repellat delectus qui
          perferendis nulla dolores.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut provident
          accusamus dolor officia iusto
          nobis! Ea dolor libero, praesentium, minima voluptates ab provident reprehenderit
          repellat delectus qui
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