<script>
(function($) {
  let course_id = null;
  $(document).ready(function() {
    $('.slots-toggle').click(function() {
      course_id = $(this).data('course_id');
      $('#slots_tab').trigger('click');
    });
    $('#slots_tab').on('shown.bs.tab', function(e) {
      if (course_id === null) {
        $('.tab-content .collapse').collapse('show');
      } else {
        if (!$(`#course-${course_id}`).hasClass('show')) {
          $('.tab-content .collapse').collapse('hide');
          $(`#course-${course_id}`).collapse('show');
        }
      }
    });
    $('#courses_tab, #profile_tab').on('shown.bs.tab', function(e) {
      course_id = null;
      $('.tab-content .collapse').collapse('hide');
    });
    $('.set-date').click(function() {
      if (!$(this).hasClass('active')) {
        $('#booking_date').val($(this).data('value'));
        $('.set-date.active').removeClass('active');
        $(this).addClass('active');
      }
    });
    $('.book-slot').click(function() {
      const clickedButton = $(this);
      const coaching_id = $(this).data('coaching_id');
      const action =
        `<?php echo site_url('student/teachers_action/book_slot'); ?>/${coaching_id}/`;
      const course_id = $(this).data('course_id');
      const slot_id = $(this).data('slot_id');
      const booking_date = $('#booking_date').val();
      const formData = new FormData();
      formData.append('course_id', course_id);
      formData.append('slot_id', slot_id);
      formData.append('booking_date', booking_date);
      toastr.clear();
      toastr.info("Please wait...");
      clickedButton.prop('disabled', true);
      fetch(action, {
          method: "POST",
          body: formData,
        })
        .then(function(response) {
          return response.json();
        })
        .then(function(result) {
          toastr.clear();
          console.log(result);
          if (result.status == true) {
            toastr.success(result.message, "", {
              timeOut: 3000
            });
            clickedButton.prop('disabled', false);
          } else {
            toastr.error(result.message, "", {
              timeOut: 3000
            });
            clickedButton.prop('disabled', false);
          }
        })
        .catch(function(error) {
          console.error(error);
        });
    });
  });
})(jQuery);
</script>