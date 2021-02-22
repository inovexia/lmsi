<script>
$(document).ready(function() {
  function change_date(date) {
    document.location = '<?php echo site_url ('coaching/slots/index/'.$coaching_id); ?>/' + date;
  }
  //triggered when modal is about to be shown
  $('#addSlot').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var course_id = $(e.relatedTarget).data('course-id');
    var slot_id = $(e.relatedTarget).data('slot-id');
    const outputSelector = $('#output-selector');
    const deleteSelector = $('#delete_container');
    //populate the textbox
    $(e.currentTarget).find('input[name="course_id"]').val(course_id);
    $(e.currentTarget).find('input[name="slot_id"]').val(slot_id);
    if (slot_id > 0) {
      fetch('<?php echo site_url ('coaching/slot_actions/get_slot/'.$coaching_id); ?>/' + slot_id, {
        method: 'POST',
      }).then(function(response) {
        return response.json();
      }).then(function(result) {
        if (result.status == true) {
          outputSelector.html(result.data);
          actionButtons =
            '<a href="<?php echo site_url ('coaching/slots/my_appointments/'.$coaching_id); ?>/' +
            slot_id + '" class="btn btn-sm btn-secondary">Bookings</a>';
          actionButtons +=
            ' <a href="<?php echo site_url ('coaching/slot_actions/delete_slot/'.$coaching_id); ?>/' +
            slot_id +
            '" class="btn btn-sm btn-danger">Delete</a>';
          deleteSelector.html(actionButtons);
        }
      });
      outputSelector.html('<i class="simple-icon-refresh"></i>');
    }
  });

  $(document).on('change', ".type", function() {
    if ($(this).val() == 1) {
      $(".input-user-limit").fadeOut();
      $(".course-selection-radio").fadeOut();
      $(".course-selection-checkbox").fadeIn();
    } else {
      $(".input-user-limit").fadeIn();
      $(".course-selection-checkbox").fadeOut();
      $(".course-selection-radio").fadeIn();
    }
  });

  $(document).on('change', ".repeat-or-single", function() {
    if ($(this).val() == "non-repeat") {
      $(".recursive-slot-area").fadeOut();
      $(".oneday-slot-area").fadeIn();
    } else {
      $(".oneday-slot-area").fadeOut();
      $(".recursive-slot-area").fadeIn();
    }
  });
});
</script>