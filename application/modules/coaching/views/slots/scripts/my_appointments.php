<script>
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
    	fetch ('<?php echo site_url ('coaching/slot_actions/get_slot/'.$coaching_id); ?>/'+slot_id, {
    		method: 'POST',
		}).then (function (response) {
			return response.json ();
		}).then (function (result) {
			if (result.status == true) {
				outputSelector.html (result.data);
				deleteSelector.html ('<a href="<?php echo site_url ('coaching/slot_actions/delete_slot/'.$coaching_id); ?>/'+slot_id+'" class="btn btn-danger">Delete</a>');
			}
    	});
		outputSelector.html ('<i class="simple-icon-refresh"></i>');
    }
});

function change_from_date (date) {
	document.location = '<?php echo site_url ('coaching/slots/my_appointments/'.$coaching_id); ?>/0/'+date+'/<?php echo $to; ?>';
}

function change_to_date (date) {
    document.location = '<?php echo site_url ('coaching/slots/my_appointments/'.$coaching_id.'/0/'.$from); ?>/'+date;
}
</script>