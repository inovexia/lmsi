<div class="row mb-1">
  <div class="col-12 ">
  </div>
</div>


<div class="card mb-2">
  <div class="card-body">
    <div class="row ">
      <div class="col-12">
        <?php if ($slot_id > 0) {?>
        <h5 class=""><?php echo date('D, d M Y', $slot['start_time']); ?></h5>
        <span class="badge badge-primary"><?php echo date('H:i a', $slot['start_time']); ?>-<?php echo date('H:i a', $slot['end_time']); ?></span>
        <?php } else {?>
        <h5 class="">All Slots Booked</h5>
        <form class="form-inline">
          <?php
?>
          <span>From </span> <input type="date" name="from" class="form-control my-2" placeholder="Select date" value="<?php echo ($from); ?>" onchange="change_from_date (this.value)"
            id="from_selecter">
          <span> To </span>
          <input type="date" name="to" class="form-control my-2" placeholder="Select date" min="" value="<?php echo ($to); ?>" onchange="change_to_date (this.value)" id="to_selecter">
        </form>
        <?php }?>
        <!--
		    <div class="col-xs-12 col-md-4 " >
		    	<?php if ($slot_id > 0) {?>
                <h5 class=""><?php echo date('D, d M Y', $slot['start_time']); ?></h5>
                <span class="badge badge-primary"><?php echo date('H:i a', $slot['start_time']); ?>-<?php echo date('H:i a', $slot['end_time']); ?></span>
		    	<?php }?>
            </div>
		    <div class="col-xs-12 col-md-8 " >
		    	<h5 class="mt-xs-2">Filter</h5>
		        <form class="form-inline">
		            <?php
?>
		            <input type="date" name="from" class="form-control my-2" placeholder="Select date" value="<?php echo ($from); ?>" onchange="change_from_date (this.value)" id="from_selecter">
		            <input type="date" name="to" class="form-control my-2" placeholder="Select date" min="" value="<?php echo ($to); ?>" onchange="change_to_date (this.value)" id="to_selecter">
		        </form>
		    </div>
			-->
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-12 list" data-check-all="checkAll">
    <?php
if (!empty($appointments)) {
  foreach ($appointments as $row) {
    $name = $row['first_name'] . ' ' . $row['last_name'];
    ?>
    <div class="card d-flex flex-row mb-2">
      <a class="d-flex" href="Pages.Product.Detail.html">
        <img src="<?php echo base_url($row['pi']); ?>" alt="<?php echo $name; ?>" class="list-thumbnail responsive border-0 card-img-left" />
      </a>
      <div class="pl-2 d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
          <a href="" class="w-30 w-sm-100">
            <p class="list-item-heading mb-0 truncate">
              <?php echo $name; ?>
            </p>
          </a>
          <div class="w-15 w-sm-100">
            <span class="badge badge-pill badge-primary"><?php echo $row['title']; ?></span>
          </div>
          <?php if ($slot_id == 0) {?>
          <p class="mb-0 text-muted text-small w-15 w-sm-100"><?php echo date('d-m-Y', $row['date']); ?></p>
          <p class="mb-0 text-muted text-small w-15 w-sm-100"><?php echo date('H:i a', $row['start_time']); ?>-<?php echo date('H:i a', $row['end_time']); ?></p>
          <?php }?>
          <p class="mb-0 text-muted text-small w-15 w-sm-100">Booked On <?php echo date('d-m-Y', $row['booking_date']); ?></p>
        </div>
        <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
          <input type="checkbox" class="custom-control-input">
          <span class="custom-control-label">&nbsp;</span>
        </label>
      </div>
    </div>
    <?php
}
} else {
  ?>
    <div class="alert alert-danger mt-4 ">No bookings found!</div>
    <?php
}
?>
  </div>
</div>