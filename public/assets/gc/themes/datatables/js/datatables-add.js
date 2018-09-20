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
				success: function(data){
					$('.animsition').animsition('in');
					if(data.success)
					{
						$('#crudForm').ajaxSubmit({
							dataType: 'text',
							cache: 'false',
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

									clearForm();
								}
								else
								{
									form_error_message('An error has been occured at the insert.');
								}
							}
						});
					}
					else
					{
						gc.form_vm.verror=data.error_fields;
				
						var i = 0;
						$.each(data.error_fields, function(index,value){
						
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
				if( confirm( message_alert_add_form ) )
				{
					$('#modalForm').modal('hide');
				}

				return false;
			});

		}
	});

	function clearForm()
	{
		$('#crudForm').find(':input').each(function() {
	        switch(this.type) {
	            case 'password':
	            case 'select-multiple':
	            case 'select-one':
	            case 'text':
	            case 'textarea':
	                $(this).val('');
	                break;
	            case 'checkbox':
	            case 'radio':
	                this.checked = false;
	        }
	    });

		/* Clear upload inputs  */
		$('.open-file,.gc-file-upload,.hidden-upload-input').each(function(){
			$(this).val('');
		});

		$('.upload-success-url').hide();
		$('.fileinput-button').fadeIn("normal");
		/* -------------------- */

		$('.remove-all').each(function(){
			$(this).trigger('click');
		});

		$('.chosen-multiple-select, .chosen-select, .ajax-chosen-select').each(function(){
			$(this).trigger("liszt:updated");
		});
	}