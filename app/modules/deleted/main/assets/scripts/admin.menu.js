$(document).ready(function () {
    var currenturl = $('meta[name="currenturl"]').attr('content');
    var siteurl = $('meta[name="siteurl"]').attr('content');

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    $('.choosen-select').chosen({width: "100%", disable_search: true});
    $('.choosen-mod').chosen({width: "100%", disable_search: false});

    $('.btn-new-menu').click(function () {
        //var nestableol = $('#nestablemenu').children();
        //var nestableol = $('#nestablemenu').find('ol.dd-list').first();
        var nestableol = $('#nestablemenu').children('ol.dd-list').first();
        var spinner = $('.menu-spinner');

        spinner.removeClass('hidden');
        $('#nestable-template').load(currenturl + '/form', function (response, status, xhr) {
            if (status === "error") {
                if (xhr.status === 401) {
                    window.location.reload();
                } else {
                    var jsonError = $.parseJSON(response);
                    toastr["error"](jsonError.message, jsonError.heading);
                }
            } else {
                var tpl = $(this).find('li.dd-item');
                if (tpl.length) {
                    nestableol.append(tpl);
                    $('input.flat').iCheck({checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
                    $('.choosen-select').chosen({width: "100%", disable_search: true});
                    $('.choosen-mod').chosen({width: "100%", disable_search: false});
                }
            }
            
            spinner.addClass('hidden');
        });
    });

    $('#nestablemenu').on('click', '.collapse-link-nestable', function () {
        var $BOX_PANEL = $(this).closest('.x_panel'),
                $ICON = $(this).find('i'),
                $BOX_CONTENT = $BOX_PANEL.find('.x_content');

        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function () {
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200);
            $BOX_PANEL.css('height', 'auto');
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('#nestablemenu').on('click', '.btn-save', function () {
        var panel = $(this).parents('.x_panel');
        var spinner = panel.find('.nestable-spinner');
        var parent = $(this).parents('.dd-item').parents('.dd-item');

        toastr["info"]("Please wait a moment until the process saving menu is completed, look at spinner panel until gone", "Save Menu");
        spinner.removeClass('hidden');
        if (parent.length) {
            panel.find('input[name="prn"]').val(parent.attr('data-id'));
        }

        

		$.post(currenturl + '/form', panel.find('form').serialize(),
				function (data, textStatus, jqXHR) {
					if (data) {
						panel.find('.x_form_content').html(data);
						$('input.flat').iCheck({checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
						$('.choosen-select').chosen({width: "100%", disable_search: true});
						$('.choosen-mod').chosen({width: "100%", disable_search: false});
					}
					spinner.addClass('hidden');
				}, 'html'
				)
				.fail(function (jqXHR, textStatus) {
					if (jqXHR.status === 401) {
						window.location.reload();
					} else {
						var jsonError = $.parseJSON(jqXHR.responseText);
						toastr["error"](jsonError.message, jsonError.heading);
					}
					spinner.addClass('hidden');
				});
	
	// show error
		spinner.addClass('hidden');
                

    });
    
    $('#nestablemenu').on('click', '.btn-delete', function () {
        var panel = $(this).parents('.x_panel');
        var dditem = panel.parent();
        var spinner = panel.find('.nestable-spinner');

        toastr["info"]("Please wait a moment until the process delete menu is completed until panel removed", "Delete Menu");
        spinner.removeClass('hidden');


                        $.post(currenturl + '/remove', panel.find('form').serialize(),
                                function (data, textStatus, jqXHR) {
                                    dditem.remove();
                                })
                                .fail(function (jqXHR, textStatus) {
                                    if (jqXHR.status === 401) {
                                        window.location.reload();
                                    } else {
                                        var jsonError = $.parseJSON(jqXHR.responseText);
                                        toastr["error"](jsonError.message, jsonError.heading);
                                    }
                                    spinner.addClass('hidden');
                                });
               
                

    });

    $('#nestablemenu').on('keyup', 'input[name="name"]', function () {
        if ($.trim($(this).val())) {
            var panel = $(this).parents('.x_panel');
            var handle = panel.find('.dd-handle');
            handle.html('<i class="fa fa-bars"></i>&nbsp;&nbsp;' + $.trim($(this).val()));
        }
    });

    $('#nestablemenu').nestable(
            {
                group: 0,
                maxDepth: 4,
                threshold: 20,
                noDragClass: "dd-nodrag",
                collapsedClass: 'dd-collapsed'
            }
    ).on('change', function (e) {
        if (e.target.id === 'nestablemenu') {
            var list = e.length ? e : $(e.target);
            var output = JSON.stringify(list.nestable('serialize'));
            var formtpl = $('#form-template');
            var sortField = $('.input_sort');
            var spinner = $('.menu-spinner');
            
            toastr["info"]("Please wait a moment until the process re-ordering is completed, look at top spinner until gone", "Re-Order Menu");
            spinner.removeClass('hidden');
						console.log(output);
                        sortField.val(output);
						console.log(sortField);
                        $.post(currenturl + '/sort', formtpl.find('form').serialize(),
                                function (data, textStatus, jqXHR) {
                                    spinner.addClass('hidden');
                                })
                                .fail(function (jqXHR, textStatus) {
                                    if (jqXHR.status === 401) {
                                        window.location.reload();
                                    } else {
                                        var jsonError = $.parseJSON(jqXHR.responseText);
                                        toastr["error"](jsonError.message, jsonError.heading);
                                    }
                                    spinner.addClass('hidden');
                                });
                    }
               
        
    });

});