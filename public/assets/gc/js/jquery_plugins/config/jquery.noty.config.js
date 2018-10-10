function success_message(msg)
{
	// noty({
	// 	  text: success_message,
	// 	  type: 'success',
	// 	  dismissQueue: true,
	// 	  layout: 'top',
	// 	  callback: {
	// 	    afterShow: function() {

	// 	        setTimeout(function(){
	// 	        	$.noty.closeAll();
	// 	        },7000);
	// 	    }
	// 	  }
	// });
	// $('#successMsg').attr('data-log-message',success_message);
	// $('#successMsg').trigger('click');

	App.alert({
        container: "#alert_cnt",
        place: 'prepend',
        type: 'success',
        message: msg,
        close: true,
        reset: true,
        focus: true,
        closeInSeconds: 0,
        icon: 'check'
    });
}

function error_message(msg)
{
	// noty({
	// 	  text: error_message,
	// 	  type: 'error',
	// 	  layout: 'top',
	// 	  dismissQueue: true
	// });
	// $('#successMsg').attr('data-log-message',error_message);
	// $('#successMsg').trigger('click');

	App.alert({
        container: "#alert_cnt",
        place: 'prepend',
        type: 'danger',
        message: msg,
        close: true,
        reset: true,
        focus: true,
        closeInSeconds: 0,
        icon: 'warning'
    });
}

function form_success_message(success_message)
{
	$('#report-success').slideUp('fast');
	$('#report-success').html(success_message);

	if ($('#report-success').closest('.ui-dialog').length !== 0) {
		$('.go-to-edit-form').click(function(){

			fnOpenEditForm($(this));

			return false;
		});
	}

	$('#report-success').slideDown('normal');
	$('#report-error').slideUp('fast').html('');
	// $('#successMsg').attr('data-log-message',success_message);
	// $('#successMsg').trigger('click');

	App.alert({
        container: "#alert_cnt",
        place: 'prepend',
        type: 'success',
        message: success_message,
        close: true,
        reset: true,
        focus: true,
        closeInSeconds: 0,
        icon: 'check'
    });
}

function form_error_message(error_message)
{
	$('#report-error').slideUp('fast');
	$('#report-error').html(error_message);
	$('#report-error').slideDown('normal');
	$('#report-success').slideUp('fast').html('');
	// $('#successMsg').attr('data-log-message',error_message);
	// $('#successMsg').trigger('click');

	App.alert({
        container: "#alert_cnt",
        place: 'prepend',
        type: 'success',
        message: error_message,
        close: true,
        reset: true,
        focus: true,
        closeInSeconds: 0,
        icon: 'check'
    });
}