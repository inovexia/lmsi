<!--
<nav aria-label="breadcrumb d-none">
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
          <a href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$course['course_id']); ?>" class="text-info"><?php echo $course['title']; ?></a>
      </li>
      <li class="breadcrumb-item">
          <a href="<?php echo site_url ('coaching/lessons/pages/'.$coaching_id.'/'.$course_id.'/'.$lesson['lesson_id']); ?>" class="text-info"><?php echo $lesson['title']; ?></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $page['title']; ?></li>
  </ol>
</nav>
-->

<div class="card">

	<?php echo form_open_multipart ('coaching/lesson_actions/add_content/'.$coaching_id.'/'.$course_id.'/'.$lesson_id.'/'.$page_id, array('class'=>'validate-form')); ?>
		<div class="card-body">

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" placeholder="Title of the page" value="<?php echo set_value ('title', $page['title']); ?>" >
			</div>
		</div>
		
		<div class="card-body">
			<div id="content-output">
				<?php
				if (! empty ($content)) {
					foreach ($content as $att) {
						?>
						<div class="d-flex flex-row mb-3 border-bottom justify-content-between">
							<div class="flex-grow-1">
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
		                    <div class="comment-likes">
		                        <?php
									$msg = 'Delete this content?';
									$url = site_url ('coaching/lesson_actions/delete_attachment/'.$coaching_id.'/'.$course_id.'/'.$lesson_id.'/'.$page_id.'/'.$att['att_id'].'/'.$att['att_type']);
								?>
								<a href="javascript: void ()" onclick="show_confirm ('<?php echo $msg; ?>', '<?php echo $url; ?>')" class=""><i class="text-danger simple-icon-trash"></i></a>
		                    </div>
		                </div>
						<?php
					}
				}
				?>
			</div>
		</div>

	    <div class="card-header">
	        <ul class="nav nav-tabs card-header-tabs " role="tablist">
	            <li class="nav-item">
	                <a class="nav-link  active" id="text-tab" data-toggle="tab" href="#content-text" role="tab" aria-controls="content-text" aria-selected="true" onclick="set_att_type (<?php echo LESSON_ATT_TEXT; ?>)">Text</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" id="youtube-tab" data-toggle="tab" href="#content-youtube" role="tab" aria-controls="content-youtube" aria-selected="false" onclick="set_att_type (<?php echo LESSON_ATT_YOUTUBE; ?>)">Youtube URL</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" id="file-tab" data-toggle="tab" href="#content-file" role="tab" aria-controls="content-file" aria-selected="false" onclick="set_att_type (<?php echo LESSON_ATT_UPLOAD; ?>)">Upload File</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" id="link-tab" data-toggle="tab" href="#content-link" role="tab" aria-controls="content-link" aria-selected="false" onclick="set_att_type (<?php echo LESSON_ATT_EXTERNAL; ?>)">External Links</a>
	            </li>
	        </ul>
	    </div>

	    <div class="card-body">
	        <div class="tab-content">

	            <div class="tab-pane fade show active" id="content-text" role="tabpanel" aria-labelledby="text-tab">			
					<div class="form-group">
						<textarea class="form-control tinyeditor" name="content_text" rows="10" placeholder="Add your content..."><?php ///echo set_value ('content_text', $page['content']); ?></textarea>
					</div>
	            </div>

	            <div class="tab-pane fade " id="content-youtube" role="tabpanel" aria-labelledby="youtube-tab">
	               	<div class="form-group ">
						<input type="text" class="form-control" name="content_youtube" placeholder="https://youtube.com/video_url">
					</div>                
					<small class="text-small text-muted">Add direct url or embedd code for Youtube or Vimeo</small>
	            </div>

	            <div class="tab-pane fade" id="content-link" role="tabpanel" aria-labelledby="link-tab">
					<div class="form-group ">
						<input type="text" class="form-control" name="content_link" placeholder="https://example.com/spaces/star1.pdf">
					</div>
	            </div>

	            <div class="tab-pane fade" id="content-file" role="tabpanel" aria-labelledby="file-tab">
					<div class="form-group ">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="userfile" name="userfile" accept="" size="20"/>
								<label class="custom-file-label" for="userfile">Select file to upload...</label>
							</div>
						</div>
						<small class="text-small text-muted">Max upload file size <?php echo (MAX_UPLOAD_FILE_SIZE/1024); ?>MB</small>
					</div>

	            </div>
	    		<!-- // Tab -->
	        </div>
	    	<!-- // Tab-content -->
	    </div>
	   	<!-- // Card-body -->

		<div class="card-footer">
			<input type="submit" name="submit" class="btn btn-primary" value="Save" data-toggle="tooltip" data-placement="bottom" title="Save" />
		</div>
	  	<input type="hidden" name="page_id" id="page-id" value="<?php echo 
	  	$page_id; ?>">
	  	<input type="hidden" name="att_type" id="att-type" value="<?php echo LESSON_ATT_TEXT; ?>">
	<?php echo form_close (); ?>

</div>