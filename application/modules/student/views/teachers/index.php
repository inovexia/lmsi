<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header pl-0 pr-0">
        <ul class="nav nav-tabs nav-fill card-header-tabs ml-0 mr-0" role="tablist">
          <li class="nav-item text-center">
            <a class="nav-link active" id="courses_tab" data-toggle="tab" href="#courses" role="tab"
              aria-controls="courses" aria-selected="true">Courses</a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link" id="slots_tab" data-toggle="tab" href="#slots" role="tab" aria-controls="slots"
              aria-selected="false">Slots</a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link" id="profile_tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
              aria-selected="false">Profile</a>
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
                    <button type="button" class="btn btn-xs btn-primary"
                      data-course_id="<?php echo $course['course_id']; ?>">Slots</button>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="slots" role="tabpanel" aria-labelledby="slots_tab">
            <div class="form-group mb-1">
              <button type="button" class="btn btn-xs btn-primary active">Today</button>
              <button type="button" class="btn btn-xs btn-primary">1<sup>st</sup> Jan</button>
              <button type="button" class="btn btn-xs btn-primary">2<sup>nd</sup> Jan</button>
              <button type="button" class="btn btn-xs btn-primary">3<sup>rd</sup> Jan</button>
            </div>
            <div class="form-group mb-1">
              <label>Select Date</label>
              <div class="input-group date">
                <input type="text" value="" data-date-orientation="bottom" data-date-format="dd-mm-yyyy"
                  class="form-control datepicker" />
                <span class="input-group-text input-group-append input-group-addon">
                  <i class="simple-icon-calendar"></i>
                </span>
              </div>
            </div>
            <?php foreach ($courses as $course): ?>
            <div class="form-group mb-1" data-course_id="<?php echo $course['course_id']; ?>">
              <h4><?php echo $course['title']; ?></h4>
              <hr />
              <div class="d-flex mb-3">
                <label class="flex-grow-1 my-auto">9.00 - 10:00</label>
                <button type="button" class="btn btn-xs btn-primary">Book</button>
              </div>
              <div class="d-flex mb-3">
                <label class="flex-grow-1 my-auto">11.00 - 12:00</label>
                <button type="button" class="btn btn-xs btn-primary">Book</button>
              </div>
              <div class="d-flex mb-3">
                <label class="flex-grow-1 my-auto">14.00 - 15:00</label>
                <button type="button" class="btn btn-xs btn-primary">Book</button>
              </div>
              <div class="d-flex mb-3">
                <label class="flex-grow-1 my-auto">17.00 - 18:00</label>
                <button type="button" class="btn btn-xs btn-primary">Book</button>
              </div>
            </div>
            <?php endforeach;?>
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