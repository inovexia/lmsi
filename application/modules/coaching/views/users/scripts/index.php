<script>
const formSelector = document.getElementById('search-form');
const formURL = formSelector.getAttribute('action');
const outputSelector = document.getElementById('users-list');
$(document).ready(function() {
  const doBulkAction = function(formData) {
    toastr.clear();
    toastr.info("Please wait...");
    fetch($(".bulk-action").attr('action'), {
      method: 'POST',
      body: formData,
    }).then(function(response) {
      return response.json();
    }).then(function(result) {
      toastr.clear();
      if (result.status == true) {
        toastr.success(result.message, "", {
          timeOut: 1000
        });
        if (result.redirect) {
          document.location = result.redirect;
        }
      } else {
        var message = result.error.replace("/[\n\r]/g", "");
        toastr.error(message, "", {
          timeOut: 2000
        });
      }
    });
  };
  $('#search-status').on('change', function() {
    var status = $(this).val();
    var url = '<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id); ?>/' + status +
      '/<?php echo $batch_id; ?>';
    $(location).attr('href', url);
  });
  $('#search-role').on('change', function() {
    var role_id = $(this).val();
    var url = '<?php echo site_url ('coaching/users/index/'.$coaching_id); ?>/' + role_id +
      '/<?php echo $status.'/'.$batch_id; ?>';
    $(location).attr('href', url);
  });
  $('#checkAll').on('change', function() {
    if ($(this).prop('checked')) {
      if (!$('#checkAll2').prop('checked')) {
        $('#checkAll2').prop('checked', true);
      }
    } else {
      $('#checkAll2').prop('checked', false);
    }
  });
  $('#checkAll2').on('change', function() {
    if ($(this).prop('checked')) {
      if (!$('#checkAll').prop('checked')) {
        $('#checkAll').trigger('click');
      }
    } else {
      $('#checkAll').trigger('click');
    }
  });
  $('#users-list .custom-control-input').on('change', function() {
    if ($('#users-list .custom-control-input:checked').length) {
      if ($('#users-list .custom-control-input').length === $('#users-list .custom-control-input:checked')
        .length) {
        $('#checkAll2').prop({
          'indeterminate': false,
          'checked': true
        });
      } else {
        $('#checkAll2').prop('indeterminate', true);
      }
    } else {
      $('#checkAll2').prop({
        'indeterminate': false,
        'checked': false
      });
    }
  });
  $('.do-action').parent().on('show.bs.dropdown', function() {
    $(this).find('.dropdown-menu').css({
      'min-width': `unset`,
      'width': `${$('.do-action').outerWidth()}px`
    })
  });
  $('.dropdown-menu .action').on('click', function() {
    if (!$(this).hasClass('active')) {
      const parent = $(this).parents('#bulk-up').length ? $('#bulk-up') : $('#bulk-down');
      parent.find('.dropdown-menu .action.active').removeClass('active');
      $(this).addClass('active');
      parent.find('.dropdown-toggle.do-action').val($(this).val());
      parent.find('.dropdown-toggle.do-action .action-label').html($(this).data('label'))
    }
  });
  $('#search-batch').on('change', function() {
    var batch_id = $(this).val();
    var url = '<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.$role_id.'/'.$status); ?>/' +
      batch_id;
    $(location).attr('href', url);
  });
  $('.status, .role, .sort-by').on('click', (e) => {
    var thisElement = $(e.currentTarget);
    thisElement.parents('.dropdown-menu').prev().html(thisElement.html());
  });
  $('.sort-by').on('click', (e) => {
    var thisElement = $(e.currentTarget);
    $('#filter-sort').val(thisElement.data('value'));
    $('.sort-by.active').removeClass('active');
    thisElement.addClass('active');
    $('#search-form').trigger('submit');
  });
  $('#bulk-up .apply').on('click', function() {
    const actionValue = $('#bulk-down .do-action').val(),
      doAction = actionValue == 'delete' ?
      confirm(
        'Are you sure you want to delete?, Selection will be removed.'
      ) :
      true,
      formData = new FormData;
    $(`input[name='mycheck[]']:checked`).each(function(i) {
      formData.append("mycheck[]", $(this).val());
    });
    formData.append('action', actionValue);
    if (doAction) {
      // Todo: Do AJAX Action
      doBulkAction(formData);
    }
  });
  $('#bulk-down .apply').on('click', function() {
    const actionValue = $('#bulk-down .do-action').val(),
      doAction = actionValue == 'delete' ?
      confirm(
        'Are you sure you want to delete?, Selection will be removed.'
      ) :
      true,
      formData = new FormData;
    $(`input[name='mycheck[]']:checked`).each(function(i) {
      formData.append("mycheck[]", $(this).val());
    });
    formData.append('action', actionValue);
    if (doAction) {
      // Todo: Do AJAX Action
      doBulkAction(formData);
    }
  });
  $('#search-form').on('submit', (e) => {
    e.preventDefault();
    var formData = new FormData(formSelector);
    fetch(formURL, {
      method: 'POST',
      body: formData,
    }).then(function(response) {
      return response.json();
    }).then(function(result) {
      if (result.status == true) {
        var output = result.data;
        outputSelector.innerHTML = output;
      }
    });
  });
});
</script>