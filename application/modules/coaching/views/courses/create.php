<div class="card">
		<div class="card-body">
			<?php echo form_open('coaching/courses_actions/create_course/'.$coaching_id.'/'.$cat_id.'/'.$course_id, array('class'=>'validate-form')); ?>

				<div class="form-group">
					<label for="title">Title<span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Title of the Course"<?php echo (isset($course['title'])) ? ' value="' . $course['title'] . '"' : ' '; ?> >
				</div>
				
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control tinyeditor" id="description" name="description" rows="4" placeholder="How you describe this course?"><?php echo (isset($course['description'])) ? $course['description'] : ''; ?></textarea>
				</div>

				<div class="form-group">
					<label for="curriculum">Curriculum</label>
					<textarea class="form-control tinyeditor" id="curriculum" name="curriculum" rows="4" placeholder="Curriculum of this course?"><?php echo (isset($course['curriculum'])) ? $course['curriculum'] : ''; ?></textarea>
				</div>
				

				<div class="form-group row">
					<div class="col-md-6">
						<label for="price">Price</label>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<div class="input-group-text"><?php echo $default['currency']; ?></div>
							</div>
							<input type="number" class="form-control" id="price" name="price" min="0" step="0.01" placeholder="Course Price" value="<?php echo (isset($course['price'])) ?  $course['price'] : 0; ?>"/>
						</div>
					</div>
					<div class="col-md-6">
						<label>Feauted Image</label>
						<div class="custom-file mb-3">
							<input type="file" class="custom-file-input" id="feat_img" name="feat_img" accept="image/*" />
							<label class="custom-file-label" for="feat_img">Select file to upload...</label>
						</div>
						<?php if (isset($course['feat_img'])) :?>
						<div>
							<img src="<?php echo site_url($course['feat_img']); ?>" class="img-fluid" style="width: 128px;" />
						</div>
						<?php endif;?>
					</div>
				</div>

				<div class="seperator my-3"></div>

				<input type="submit" name="submit" class="btn btn-primary" value="Save" data-toggle="tooltip" data-placement="right" title="Save">
			<?php echo form_close(); ?>

		</div>

	</div>
</div>