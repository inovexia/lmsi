<div class="mb-2">
  <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button"
    aria-expanded="true" aria-controls="displayOptions">
    Display Options
    <i class="simple-icon-arrow-down align-middle"></i>
  </a>
  <div class="collapse dont-collapse-sm" id="displayOptions">
  <?php echo form_open('coaching/user_actions/search_users/'.$coaching_id.'/'.$role_id.'/'.$status.'/'.$batch_id, array('class'=>"mt-3", 'id'=>'search-form')); ?>
    <span class="mb-2 d-inline-block float-md-left">
    </span>
    <div class="d-block d-md-inline-block">
      <div class="btn-group d-inline-block float-md-left mr-1 mb-1">
        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <?php echo $status_label; ?>
        </button>
        <div class="dropdown-menu">
          <a class="status dropdown-item <?php if ($status == -1) echo ' active'; ?>"
            href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id.'/-1/'.$batch_id); ?>">All
            Status</a>
          <a class="status dropdown-item <?php if ($status == USER_STATUS_DISABLED) echo ' active'; ?>"
            href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id.'/'.USER_STATUS_DISABLED.'/'.$batch_id); ?>">Disabled</a>
          <a class="status dropdown-item <?php if ($status == USER_STATUS_ENABLED) echo ' active'; ?>"
            href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id.'/'.USER_STATUS_ENABLED.'/'.$batch_id); ?>">Enabled</a>
          <a class="status dropdown-item <?php if ($status == USER_STATUS_UNCONFIRMED) echo ' active'; ?>"
            href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id.'/'.USER_STATUS_UNCONFIRMED.'/'.$batch_id); ?>">Pending</a>
        </div>
      </div>

      <div class="btn-group float-md-left mr-1 mb-1 d-none">
        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <?php echo $role_label; ?>
        </button>
        <div class="dropdown-menu">
          <a class="role dropdown-item<?php if ($role_id == 0) echo ' active'; ?>"
            href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/0/'.$status.'/'.$batch_id); ?>">All
            Roles</a>
          <?php foreach ($roles as $role) { ?>
          <a class="role dropdown-item<?php if ($role_id ==$role['role_id']) echo ' active'; ?>"
            href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role['role_id'].'/'.$status.'/'.$batch_id); ?>"><?php echo $role['description']; ?></a>
          <?php } ?>
        </div>
      </div>

      <div class="btn-group d-inline-block float-md-left mr-1 mb-1">
        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <?php echo $sort_label; ?>
        </button>
        <div class="dropdown-menu">
          <a href="javascript:void(0);"
            class="sort-by dropdown-item<?php echo ($sort == SORT_ALPHA_ASC)? ' active':null; ?>"
            data-value="<?php echo SORT_ALPHA_ASC; ?>">Name: A to Z</a>
          <a href="javascript:void(0);"
            class="sort-by dropdown-item<?php echo ($sort == SORT_ALPHA_DESC)? ' active':null; ?>"
            data-value="<?php echo SORT_ALPHA_DESC; ?>">Name: Z to A</a>
          <a href="javascript:void(0);"
            class="sort-by dropdown-item<?php echo ($sort == SORT_CREATION_ASC)? ' active':null; ?>"
            data-value="<?php echo SORT_CREATION_ASC; ?>">Old to New</a>
          <a href="javascript:void(0);"
            class="sort-by dropdown-item<?php echo ($sort == SORT_CREATION_DESC)? ' active':null; ?>"
            data-value="<?php echo SORT_CREATION_DESC; ?>">New to Old</a>
        </div>
      </div>

      <div class="search-sm  d-inline-block float-md-left mr-1 mb-1 align-top">
        <input type="hidden" name="search_role" value="<?php echo $role_id; ?>" />
        <input type="hidden" name="search_status" value="<?php echo $status; ?>" />
        <input type="hidden" name="search_batch" value="<?php echo $batch_id; ?>" />
        <input type="hidden" name="filter_sort" id="filter-sort" value="<?php echo $sort; ?>" />
        <input type="search" class="form-control" name="search_text" aria-label="Search..." placeholder="Search..." id="search-text" />
      </div>
    </div>

    <div class="float-md-right d-none">
      <span class="text-muted text-small">Displaying 1-10 of 210 items </span>
      <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        20
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="javascript:void(0);"
          class="sort-by dropdown-item<?php echo ($sort == SORT_ALPHA_ASC)? ' active':null; ?>"
          data-value="<?php echo SORT_ALPHA_ASC; ?>">Name: A to Z</a>
        <a href="javascript:void(0);"
          class="sort-by dropdown-item<?php echo ($sort == SORT_ALPHA_DESC)? ' active':null; ?>"
          data-value="<?php echo SORT_ALPHA_DESC; ?>">Name: Z to A</a>
        <a href="javascript:void(0);"
          class="sort-by dropdown-item<?php echo ($sort == SORT_CREATION_ASC)? ' active':null; ?>"
          data-value="<?php echo SORT_CREATION_ASC; ?>">Old to New</a>
        <a href="javascript:void(0);"
          class="sort-by dropdown-item<?php echo ($sort == SORT_CREATION_DESC)? ' active':null; ?>"
          data-value="<?php echo SORT_CREATION_DESC; ?>">New to Old</a>
      </div>
    </div>
  <?php echo form_close (); ?>
  </div>
</div>