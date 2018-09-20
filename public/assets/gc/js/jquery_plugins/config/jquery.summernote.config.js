	$(function() {

		$('.summernote').each(function( index ) {
		  $(this).summernote('destroy');
		});
		$summernote = $('textarea.texteditor').summernote({
			minHeight: 200,
			    onImageUpload: function(files) {
			    	sendFile(files[0])
			      // upload image to server and create imgNode...
			      // $summernote.summernote('insertNode', imgNode);
			  }
		});
		$summernote.on('summernote.image.upload', function(we, files) {
		  // upload image to server and create imgNode...
		  $summernote.summernote('insertNode', imgNode);
		});
 
	});


function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                return myXhr;
            },
            url: site_url() + '/admin/artikel/upload_images',
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
            }
        });
}

// update progress bar

function progressHandlingFunction(e){
    if(e.lengthComputable){
        $('progress').attr({value:e.loaded, max:e.total});
        // reset progress on complete
        if (e.loaded == e.total) {
            $('progress').attr('value','0.0');
        }
    }
} 	