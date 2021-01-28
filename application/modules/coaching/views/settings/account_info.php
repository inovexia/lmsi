<div class="row justify-content-center">
	<div class="col-md-8 ">
		<div class="card shadow-sm">
			<div class="card-body">
				<div class="form-group">
						<label class="form-label">ACESSS CODE</label>
						<h4 class="text-primary"><?php echo $coaching['reg_no']; ?></h4>
				</div>
				<div class="form-group">
					<label class="form-label">ACESSS URL</label>
					<h4 class="text-primary"><?php echo site_url('/?sub='.$coaching['reg_no']); ?></h4>
				</div>
				<div class="form-group">
					<label class="form-label">ACCOUNT CREATION DATE</label>
					<h4 class="text-primary"><?php echo date ('l, d M Y', $coaching['doj']); ?></h4>
				</div>
			</div>
		</div>
	</div>
</div>