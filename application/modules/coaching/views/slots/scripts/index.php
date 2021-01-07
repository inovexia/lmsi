<script>
//triggered when modal is about to be shown
$('#addSlot').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var course_id = $(e.relatedTarget).data('course-id');
    var slot_id = $(e.relatedTarget).data('slot-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="course_id"]').val(course_id);
    $(e.currentTarget).find('input[name="slot_id"]').val(slot_id);
});
</script>