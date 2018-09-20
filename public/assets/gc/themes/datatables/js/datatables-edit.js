$(function(){

	var save_and_close = false;

	$('#form-button-save').click(function(){
		save_and_close = true;

		$('#crudForm').trigger('submit');
	});

	$('#crudForm').submit(function(){
		$(this).ajaxSubmit({
			url: validation_url,
			dataType: 'json',
			beforeSend: function(){
				$.components.get('animsition').init();
			},
			cache: false,
			success: function(data){
				$('.animsition').animsition('in');
				if(data.success)
				{
					$('#crudForm').ajaxSubmit({
						dataType: 'text',
						cache: false,
						beforeSend: function(){
							$.components.get('animsition').init();
						},
						success: function(result){
							$('.animsition').animsition('in');
							data = $.parseJSON( result );
							if(data.success)
							{
								if(save_and_close)
								{
									if ($('#save-and-go-back-button').closest('.ui-dialog').length === 0) {
										$('#modalForm').modal('hide');
										success_message(data.success_message);
									} else {
										$('#modalForm').modal('hide');
										success_message(data.success_message);
									}
										$('button.refresh-data').trigger('click');
									
									return true;
								}

								$('.field_error').removeClass('field_error');

								form_success_message(data.success_message);

							}
							else
							{
								console.log(data);
								form_error_message(message_update_error);
							}
						},
						error: function(){
							form_error_message( message_update_error );
						}
					});
				}
				else
				{
					//$('.field_error').removeClass('field_error');
					//form_error_message(data.error_message);
					gc.form_vm.verror=data.error_fields;
					// console.log(data.error_fields)
					var i = 0;
					$.each(data.error_fields, function(index,value){
					// 	// $('#crudForm input[name='+index+']').addClass('field_error');
					// 	//gc.form_vm.verr[index] = true;
						if(i==0){
							$('#crudForm #field-'+index).focus();
						}
						i++;
					});
				}
			}
		});
		return false;
	});

	$('.ui-input-button').button();
	$('.gotoListButton').button({
        icons: {
        	primary: "ui-icon-triangle-1-w"
    	}
	});

	if( $('#cancel-button').closest('.ui-dialog').length === 0 ) {

		$('#cancel-button').click(function(){
			if( $(this).hasClass('back-to-list') || confirm( message_alert_edit_form ) )
			{
				// window.location = list_url;
				$('#modalForm').modal('hide');
			}

			return false;
		});

	}

});