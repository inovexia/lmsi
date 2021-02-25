<div class="mb-2"> 
  <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button"
    aria-expanded="true" aria-controls="displayOptions">
    Filter Options
    <i class="simple-icon-arrow-down align-middle"></i>
  </a>
  <div class="collapse dont-collapse-sm" id="displayOptions">
    <div class="d-block d-md-inline-block">

      <div class="-d-inline-block float-md-left mr-2 ml-4 d-none">
          <label class="custom-control custom-checkbox d-inline-block ">
              <input type="checkbox" class="custom-control-input" id="checkAll">
              <span class="custom-control-label pb-4">Select All</span>
          </label>
      </div>

      <div class="btn-group d-inline-block float-md-left mr-1 mb-1">
        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-status">
          All Status
        </button>
        <div class="dropdown-menu">
          <a class="status dropdown-item active" href="">All Status</a>
          <a class="status dropdown-item" href="#" onclick="change_status (<?php echo LESSON_STATUS_PUBLISHED; ?>)">Unpublished</a>
          <a class="status dropdown-item" href="#" onclick="change_status (<?php echo LESSON_STATUS_UNPUBLISHED; ?>)">Published</a>
        </div>
      </div>

      <div class="btn-group d-inline-block float-md-left mr-1 mb-1">
        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-sort">
          Sort by name
        </button>
        <div class="dropdown-menu">
          <a href="javascript:void(0);" class="sort-by dropdown-item" onclick="change_sorting (<?php echo SORT_ALPHA_ASC; ?>)" >Name: A to Z</a>
          <a href="javascript:void(0);" class="sort-by dropdown-item" onclick="change_sorting (<?php echo SORT_ALPHA_DESC; ?>)" >Name: Z to A</a>
          <a href="javascript:void(0);" class="sort-by dropdown-item" onclick="change_sorting (<?php echo SORT_CREATION_ASC; ?>)" >Old to New</a>
          <a href="javascript:void(0);" class="sort-by dropdown-item" onclick="change_sorting (<?php echo SORT_CREATION_DESC; ?>)" >New to Old</a>
        </div>
      </div>

      <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
        <?php echo form_open ('coaching/courses_actions/get_courses/'.$coaching_id.'/'.$course_id, ['class'=>'validate-form', 'id'=>'search-form']); ?>
          <input type="text" class="form-control" name="search_text" placeholder="Search..." onkeyup="search_courses()" id="filter-course-val" >
          <input type="hidden" name="" id="filter-status-val">
          <input type="hidden" name="" id="filter-sorting-val">
        <?php echo form_close (); ?>
      </div>
    </div>
  </div>
</div>


