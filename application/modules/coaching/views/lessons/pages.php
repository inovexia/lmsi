<h3><?php echo $lesson['title']; ?></h3>

<div class="row">
  <?php 
	$i = 1;
	if ( ! empty ($pages)) { 
		foreach ($pages as $row) { 
			?>
  <div class="col-12 mb-3">
    <div class="card flex-row listing-card-container">
      <div class="d-flex align-items-center w-100">
        <div class="card-body d-flex">
          <div class="w-80">
            <a
              href="<?php echo site_url ('coaching/lessons/add_page/'.$coaching_id.'/'.$course_id.'/'.$lesson_id.'/'.$row['page_id']); ?>">
              <h5 class=" ellipsis"><?php echo $row['title']; ?></h5>
            </a>
            <p class=" text-muted ellipsis">
              <?php 
	                                $content = strip_tags($row['content']);
                                	echo character_limiter ($content, 250); 
                                ?>
            </p>
          </div>
          <div class="w-20 text-right">
            <div class="btn-group mb-1 page-action-menu" style="font-size:18px;">
              <button type="button" class="border-0  dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" style="background-color:transparent">
                <i class="simple-icon-options-vertical"></i>
                <span class="sr-only"></span>
              </button>
              <div class="dropdown-menu">
                <?php 
										echo anchor ('coaching/lessons/add_page/'.$coaching_id.'/'.$course_id.'/'.$lesson_id.'/'.$row['page_id'], '<i class="simple-icon-note mr-2"></i> Edit', ['class'=>'dropdown-item']);
									?>
                <?php 
										echo anchor ('coaching/lessons/view_page/'.$coaching_id.'/'.$course_id.'/'.$lesson_id.'/'.$row['page_id'], '<i class="simple-icon-eye mr-2"></i> Preview', ['class'=>'dropdown-item']);
									?>
                <?php
									$msg = 'Delete this page?';
									$url = site_url ('coaching/lesson_actions/delete_page/'.$coaching_id.'/'.$course_id.'/'.$lesson_id.'/'.$row['page_id']);
									?>
                <a href="javascript: void ()" onclick="show_confirm ('<?php echo $msg; ?>', '<?php echo $url; ?>')"
                  class="dropdown-item"><i class="simple-icon-trash mr-2"></i>Delete</a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
			$i++; 
		} 
	} else {
		?>
  <div class="col-12">
    <div class="alert alert-danger ">
      <span class="">No pages found</span>
    </div>
  </div>
  <?php
	}
	?>
</div>