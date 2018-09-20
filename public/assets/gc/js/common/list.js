var js_libraries = [];
var exclude_js = function(js_libs){
	var new_js_list = [];
	if(typeof gc.exclude_js){
		$.each(js_libs,function(i,js){
			var cjs = basename(js);
		
			if($.inArray(cjs,gc.exclude_js) == -1 ){
				new_js_list.push(js);
			}
		});
	}else{ return js_libs;}
	return new_js_list;
};
var exclude_css = function(css_libs){
	var new_css_list = [];
	if(typeof gc.exclude_css){
		$.each(css_libs,function(i,css){
			var ccss = basename(css);
			if($.inArray(ccss,gc.exclude_css) == -1 ){
				new_css_list.push(css);
			}
		});
	}else{ return css_libs;}
	return new_css_list;
};
var fnOpenEditForm = function(this_element,event){
	

	var href_url = this_element.attr("href");

	var dialog_height = $(window).height() - 80;
		event.preventDefault(this_element);
	    var e = $(this);
	    var title = e.data('title');
	    var body = e.data('value');
	    $("#myModal").modal("show");
	    // $('#modal-title').html(title);
	    

	    var ajax_url = href_url+'?uuidv4='+uuidv4();
	    $.ajax({
				url: ajax_url,
				data: {
					is_ajax: 'true'
				},
				type: 'post',
				dataType: 'json',
				beforeSend: function() {
					// this_element.closest('.flexigrid').addClass('loading-opacity');
					$.components.get('animsition').init();
				},
				complete: function(){
					// this_element.closest('.flexigrid').removeClass('loading-opacity');
					$('.animsition').animsition('in');
				},
				success: function (data) {
					if (typeof CKEDITOR !== 'undefined' && typeof CKEDITOR.instances !== 'undefined') {
							$.each(CKEDITOR.instances,function(index){
								delete CKEDITOR.instances[index];
							});
					}

					

					var modal = $('#modalForm').replaceWith(data.output)
					 	modal = $('#modalForm');

					
					modal.on('shown.bs.modal', function (e) {
					    modal.find('input[type=text]:first').focus();

					    if(typeof gc.onShowForm == 'function'){
					    	gc.onShowForm(modal,modal.attr('mode'),ajax_url,e);
					    }
					});
					modal.modal({
						backdrop: 'static',
    					keyboard: false
					});
					LazyLoad.loadOnce(exclude_js(data.js_lib_files));
					LazyLoad.load(exclude_js(data.js_config_files));

					$.each(exclude_css(data.css_files),function(index,css_file){
						load_css_file(css_file);
					});
				}
			});

	
};

var add_edit_button_listener = function () {

	//If dialog AJAX forms is turned on from grocery CRUD config
	if (dialog_forms) {

		$('.edit_button,.add_button').unbind('click');
		$('.edit_button,.add_button').click(function(event){

			fnOpenEditForm($(this),event);

			return false;
		});

	}
}

var load_css_file = function(css_file) {
	if ($('head').find('link[href="'+css_file+'"]').length == 0) {
		$('head').append($('<link/>').attr("type","text/css")
				.attr("rel","stylesheet").attr("href",css_file));
	}
};


