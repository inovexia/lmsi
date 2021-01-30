<div class="row">
  <div class="col-12">
    <ul class="nav nav-tabs separator-tabs justify-content-center ml-0 mb-5" role="tablist">
      <li class="nav-item mx-1">
        <a class="nav-link mr-0 active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">
          DETAIL
        </a>
      </li>
      <li class="nav-item mx-1">
        <a class="nav-link mr-0" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="false">
          MY STUDENTS
        </a>
      </li>
      <li class="nav-item mx-1">
        <a class="nav-link mr-0" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">
          MY VIDEOS
        </a>
      </li>
      <li class="nav-item mx-1">
        <a class="nav-link mr-0" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">
          MY COURSES
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
        <div class="row">
          <div class="col-12 col-lg-4 col-left order-3 order-lg-1">
            <div class="card mb-4">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div class="my-auto">
                  <h6 class="mb-0">Profile Progress</h6>
                  <p class="mb-0">40% Completed</p>
                </div>
                <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                  <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#d7d7d7" stroke-width="4" fill-opacity="0"></path>
                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#922c88" stroke-width="4" fill-opacity="0"
                      style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 180.981;"></path>
                  </svg>
                  <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);">40%</div>
                </div>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Profile Verified</h6>
                <div class="text-primary d-flex">
                  <i class="simple-icon-check" style="font-size:3.2rem;"></i>
                </div>
              </div>
            </div>
            <div class="card mb-4 d-lg-block">
              <div class="card-body">
                <h5 class="card-title">Recent Courses</h5>
                <div>
                  <?php for ($x = 1; $x <= 5; $x++) {?>
                  <div class="d-flex flex-row mb-3">
                    <a class="d-block position-relative" href="#">
                      <img src="//via.placeholder.com/113x85.png?text=Course+Image" class="list-thumbnail border-0" />
                    </a>
                    <div class="pl-3 pt-2 pr-2 pb-2">
                      <a href="#">
                        <p class="list-item-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                      </a>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-8 col-right order-1 order-lg-2">
            <div class="card mb-4 overflow-hidden">
              <div class="position-absolute card-top-buttons">
                <button class="btn btn-outline-white icon-button"><i class="simple-icon-pencil"></i></button>
              </div>
              <div class="d-flex flex-column align-items-center justify-content-center bg-primary" style="height:240px;">
                <h3 style="font-size:4rem;">
                  <span class="d-inline-block border rounded-circle p-2" style="height:104px;width:104px;">SA</span>
                </h3>
                <p>Super Admin</p>
              </div>
              <div class="card-body">
                <p class="text-muted text-small mb-2">About</p>
                <p class="mb-3">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum dolores amet consequuntur molestias, nulla accusamus? In, rem sequi. Harum sapiente incidunt explicabo. Commodi
                  expedita repudiandae magni. Perferendis enim quam labore. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum dolores amet consequuntur molestias, nulla accusamus? In,
                  rem sequi. Harum sapiente incidunt explicabo.
                </p>
                <p class="text-muted text-small mb-2">Location</p>
                <p class="mb-3">UP, India</p>
                <p class="text-muted text-small mb-2">Qualifications</p>
                <p class="mb-3">
                  <a href="#"><span class="badge badge-pill badge-outline-theme-2 mb-1">FRONTEND</span> </a><a href="#"><span class="badge badge-pill badge-outline-theme-2 mb-1">JAVASCRIPT</span> </a>
                  <a href="#"><span class="badge badge-pill badge-outline-theme-2 mb-1">SECURITY</span> </a><a href="#"><span class="badge badge-pill badge-outline-theme-2 mb-1">DESIGN</span></a>
                </p>
                <p class="text-muted text-small mb-2">Social Media</p>
                <div class="social-icons">
                  <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="simple-icon-social-facebook"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="simple-icon-social-twitter"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="simple-icon-social-instagram"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="simple-icon-social-youtube"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
        <div class="row">
          <?php for ($x = 1; $x <= 10; $x++) {?>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card d-flex flex-row mb-4">
              <a class="d-flex" href="#">
                <div class="rounded-circle m-4 align-self-center list-thumbnail-letters small">
                  LI
                </div>
              </a>
              <div class="d-flex flex-grow-1 min-width-zero">
                <div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                  <div class="min-width-zero">
                    <a href="#">
                      <p class="list-item-heading mb-1 truncate">Lorem Ipsum</p>
                    </a>
                    <p class="mb-2 text-muted text-small">Lucknow, UP, India</p>
                    <button type="button" class="btn btn-xs btn-outline-primary">View</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
      <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
        <div class="row gallery gallery-page">
          <?php for ($x = 1; $x <= 10; $x++) {?>
          <div class="col-6 col-lg-2 col-md-4">
            <a href="javascript:void(0);">
              <img class="img-fluid border-radius" src="<?php echo "//via.placeholder.com/320x240.png?text=Video+$x"; ?>" />
            </a>
          </div>
          <?php }?>
        </div>
      </div>
      <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
        <div class="row mx-n2">
          <?php for ($i = 1; $i <= 10; $i++) {?>
          <div class="col-lg-3 col-md-6 px-2">
            <div class="card d-flex flex-row mb-3 overflow-hidden">
              <a class="d-block position-relative" href="#">
                <img src="//via.placeholder.com/113x85.png?text=Course+Image" class="border-0" />
              </a>
              <div class="d-flex flex-grow-1 min-width-zero">
                <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                  <div class="min-width-zero">
                    <a href="#">
                      <p class="list-item-heading mb-1 truncate"><?php echo "Course $i"; ?></p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
      <!-- http: //localhost/repos/lmsi/coaching/courses/manage/1/2 -->
    </div>
  </div>
</div>