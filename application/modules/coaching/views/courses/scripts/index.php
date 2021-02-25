<script> 

const outputSelector = document.getElementById ('outputDiv');
const statusSelector = document.getElementById ('filter-status');
const sortSelector = document.getElementById ('filter-sort');

const filterStatusSelector = document.getElementById ('filter-status-val');
const filterSortSelector = document.getElementById ('filter-sorting-val');
const filterCourseSelector = document.getElementById ('filter-course-val');
const dataURL = '<?php echo site_url ('coaching/courses_actions/get_courses/'.$coaching_id.'/'.$cat_id); ?>';

function change_status (status) {
   
    outputSelector.innerHTML = pageLoader;
    sort = document.getElementById ('filter-sorting-val').value;
    filterCourseSelector.value = '';

    /* Filter Status */
    var filterStatus = 'All Status';
    if (status == <?php echo COURSE_STATUS_INACTIVE; ?>) {
        filterStatus = 'Unpublished';
    } else if (status == <?php echo COURSE_STATUS_ACTIVE; ?>) {
        filterStatus = 'Published';
    }
    statusSelector.innerHTML = filterStatus;
    filterStatusSelector.value = status;

    fetch (dataURL+'/'+status+'/'+sort, {
        method: 'POST',
    }).then (function (response) {
        return response.json ();
    }).then (function (result) {
        if (result.status == true) {
            outputSelector.innerHTML = result.output;
        }
    });
}


function change_sorting (sort) {

    outputSelector.innerHTML = pageLoader;
    status = document.getElementById ('filter-status-val').value;
    filterCourseSelector.value = '';

    /* Filter Sort */
    var filterSort = 'Sort by name';
    if (sort == <?php echo SORT_ALPHA_ASC; ?>) {
        filterSort = 'Name A to Z';
    } else if (sort == <?php echo SORT_ALPHA_DESC; ?>) {
        filterSort = 'Name Z to A';
    } else if (sort == <?php echo SORT_CREATION_ASC; ?>) {
        filterSort = 'Old to New';
    } else if (sort == <?php echo SORT_CREATION_DESC; ?>) {
        filterSort = 'New to Old';
    }
    sortSelector.innerHTML = filterSort;
    filterSortSelector.value = sort;

    fetch (dataURL+'/'+status+'/'+sort, {
        method: 'POST',
    }).then (function (response) {
        return response.json ();
    }).then (function (result) {
        if (result.status == true) {
            outputSelector.innerHTML = result.output;
        }
    });
}


function search_courses(title) {

    outputSelector.innerHTML = pageLoader;
    let status = document.getElementById ('filter-status-val').value;
    let sort = document.getElementById ('filter-sorting-val').value;

    let searchForm = document.getElementById('search-form');
    let formData = new FormData(searchForm);
    
    fetch (dataURL+'/'+status+'/'+sort, {
        method: 'POST',
        body: formData
    }).then (function (response) {
        return response.json ();
    }).then (function (result) {
        if (result.status == true) {
            outputSelector.innerHTML = result.output;
        }
    });   
}
</script>