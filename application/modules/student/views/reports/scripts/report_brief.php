<script>
(function($) {
  $(document).ready(function() {
    $('#attempts').on('change', function() {
      var attempt_id = $(this).val();
      var url = '<?php echo site_url('student/reports/test_report/' . $coaching_id . '/' . $member_id . '/' . $course_id); ?>/' + attempt_id + '/<?php echo $test_id . '/' . $type; ?>';
      $(location).attr('href', url);
    });
    $('#report-type').on('change', function() {
      var type = $(this).val();
      var url = '<?php echo site_url('student/reports/test_report/' . $coaching_id . '/' . $member_id . '/' . $course_id . '/' . $attempt_id . '/' . $test_id); ?>/' + type;
      $(location).attr('href', url);
    });
    var ctx = document.getElementById("briefChart");
    var config = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            <?php echo $brief['correct']; ?>,
            <?php echo $brief['wrong']; ?>,
            <?php echo $brief['not_answered']; ?>
          ],
          label: 'Brief Report',
          backgroundColor: [
            '#43c115',
            '#BD362F',
            '#e8f2ff',
          ]
        }],
        labels: [
          'Correct',
          'Wrong',
          'Not Answered',
        ],
      },
      options: {
        responsive: true,
        legend: {
          display: true,
          position: 'top',
        },
        title: {
          display: false,
          text: 'Doughnut Chart'
        },
        animation: {
          animateScale: true,
          animateRotate: true
        },
        tooltips: chartTooltip
      }
    };
    var briefChart = new Chart(ctx, config);
  });
})(jQuery);
</script>