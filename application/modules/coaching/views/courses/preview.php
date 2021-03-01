<?php if ($page_id > 0) { ?> 
	<div class="card">
		<div class="card-body">
			<h3 class="card-title"><?php echo $lesson['title']; ?></h3>
			<h4><?php echo $page['title']; ?></h4>

			<div id="content-output">
				<?php
				if (! empty ($content)) {
					foreach ($content as $att) {
						?>
						<div class="mb-3 border-bottom justify-content-between">
							<div class="">
			                    <?php 
			                    if ($att['att_type'] == LESSON_ATT_YOUTUBE) { 
									$youtubeURL = getYoutubeEmbedUrl($att['content']);
									if ($youtubeURL !== null) {
										?>
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="<?php echo $youtubeURL; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
		    							<?php 
		    						} else { ?>
		    							<div class="text-danger">Invalid YouTube URL.</div>
		    							<?php 
		    						} 
								} else if ($att['att_type'] == LESSON_ATT_EXTERNAL) { 
									$externalLink = $att['content'];
									?>
									<a href="<?php echo $externalLink; ?>"><?php echo character_limiter ($externalLink, 100); ?></a>
									<?php
								} else if ($att['att_type'] == LESSON_ATT_TEXT) { 
									$content = htmlspecialchars_decode($att['content']);
									echo $content;
								} else if ($att['att_type'] == LESSON_ATT_UPLOAD) { 
									$filePath = $att['att_url'];
									$fileName = $att['content'];
									?>
									<a href="<?php echo $filePath; ?>"><?php echo character_limiter ($fileName, 50); ?></a>
									<?php
								}
								?>
							</div>
		                </div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>

<?php } else if ($lesson_id > 0) { ?>
	<div class="card mb-4">
		<div class="card-body">
			<h4 class="card-title"><?php echo $lesson['title']; ?></h4>
			<?php echo htmlspecialchars_decode($lesson['description']); ?>
		</div>
	</div>

	
	<div class="card mt-4">
	    <div class="card-body">
			<?php 
			$i = 1;
			if ( ! empty ($pages)) { 
				foreach ($pages as $row) { 
					?>
					<div class="d-flex flex-row mb-3 border-bottom justify-content-between">
						<div class="flex-grow-1">
	                        <a class="" href="<?php echo site_url ('coaching/courses/preview/'.$coaching_id.'/'.$course_id.'/'.$lesson_id.'/'.$row['page_id']); ?>" >
								<?php echo $row['title']; ?>
							</a>
	                    </div>
                    </div>
					<?php 
					$i++; 
				} 
			} else {
				?>
				<?php
			}
			?>
		</div>
	</div>	

<?php } else { ?>

	<?php
	$num = 1;
	$li = 1;
	$ti = 1;
	if ( ! empty ($contents)) { 
		foreach ($contents as $position=>$row) { 
			?>
	        <div class="card d-flex flex-row mb-3 pl-4 align-middle">
	            <div class="d-flex flex-grow-1 min-width-zero">
	              <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">

	                  <a href="<?php if ($row['resource_type'] == COURSE_CONTENT_TEST) { echo site_url ('coaching/tests/preview_test/'.$coaching_id.'/'.$course_id.'/'.$row['test_id']); } else { echo site_url ('coaching/courses/preview/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id']); } ?>" class="w-80 w-sm-100">
                    	<?php if ($row['resource_type'] == COURSE_CONTENT_TEST) { ?>
                      		<div class="text-danger text-small font-weight-bold">Test <?php echo $ti; ?></div>
	                    <?php } else { ?>
                      		<div class="text-muted text-small">Chapter <?php echo $li; ?></div>
	                    <?php } ?>
	                    <p class="list-item-heading mb-1 truncate">
	                      <?php echo $row['title']; ?><br>
	                    </p>
	                    <p class="mb-0 text-muted ">
	                      <?php echo character_limiter ($row['description'], 100); ?>
	                    </p>
	                </a>
	                  
	                <div class="w-15 w-xs-100">

	                </div>
	              </div>
	            </div>

	            <div class="custom-control custom-checkbox mb-1 align-self-center pr-3">
                    <?php if ($row['resource_type'] == COURSE_CONTENT_TEST) { ?>
						<a href="<?php echo site_url ('coaching/tests/preview_test/'.$coaching_id.'/'.$course_id.'/'.$row['test_id']); ?>" class="btn btn-outline-danger shadow-sm float-right">View Test <i class="fa fa-arrow-right"></i></a>
                    <?php } else { ?>
						<a href="<?php echo site_url ('coaching/courses/preview/'.$coaching_id.'/'.$course_id.'/'.$row['lesson_id']); ?>" class="btn btn-outline-primary shadow-sm float-right">View Chapter <i class="fa fa-arrow-right"></i></a>
                    <?php } ?>
	            </div>

          	</div>

			<?php
			if ($row['resource_type'] == COURSE_CONTENT_TEST) {
				$ti++;;
            } else {
            	$li++;
            }
            $num++;
		}
	} else {
		?>
		<div class="alert alert-danger">
			No content in this course
		</div>
		<?php
	}
	?>
<?php } ?>