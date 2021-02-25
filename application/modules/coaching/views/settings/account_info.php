<div class="row justify-content-center">
	<div class="col-md-8 ">
		<div class="card shadow-sm">
			<div class="card-body">
				<div class="form-group">
						<label class="form-label">Display Name</label>
						<h4 class="text-primary"><?php echo $coaching['coaching_name']; ?></h4>
				</div>
				<div class="form-group">
						<label class="form-label">Account ID</label>
						<h4 class="text-primary"><?php echo $coaching['reg_no']; ?></h4>
				</div>
				<div class="form-group">
					<label class="form-label">ACESSS URL</label>
					<input type="text" name="coaching_url" value="<?php echo site_url('?s='.$coaching['coaching_url']); ?>" id="coaching_url" readonly="true" class="form-control">

					<a onclick="copy_text('coaching_url')" class="btn btn-outline-info btn-xs mt-2">Copy to clipboard</a>
				</div>
				<div class="form-group">
					<label class="form-label">CREATION DATE</label>
					<h4 class="text-primary"><?php echo date ('l, d M Y', $coaching['creation_date']); ?></h4>
				</div>
			</div>
		</div>
	</div>
</div>