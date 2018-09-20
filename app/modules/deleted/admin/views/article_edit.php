<div class="page animsition">
       <!--  -->
<div class="page-aside">
      <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="page-aside-inner" data-plugin="pageAsideScroll">
        <div data-role="container">
          <div data-role="content">
            <section class="page-aside-section">
              <h5 class="page-aside-title">Kategori</h5>
              
            </section>
            
          </div>
        </div>
      </div>
    </div>
       <!--  -->
    <div class="page-main">
    <div class="page-header">
      <h1 class="page-title">Edit Artikel</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">Konten</a></li>
        <li><a href="<?=my_simple_crypt($article_page,'d')?>">Artikel</a></li>
        <li class="active">Edit Artikel</li>
      </ol>
      
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <form id="articles_form" enctype="multipart/form-data" name="articles" class="add_articles_form" method="post" action="<?php echo site_url('admin/artikel/submit/'.my_simple_crypt(current_url().'?'.$_SERVER['QUERY_STRING'],'e'));?>">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">
            <input class="form-control input-sm" type="text" name="article_title" placeholder="Judul Artikel" value="<?php echo $article['article_title'];?>"><br>
            <input class="form-control input-sm" type="hidden" name="article_id" placeholder="Judul Artikel" value="<?php echo $article['article_id'];?>">
			<select class="form-control input-sm" name="category_id">
				<?php 
				foreach($article_category as $key=>$row){
					if($key==$article["category_id"]){
						echo "<option value='".$key."' selected>".$row."</option>";
					}else{
						echo "<option value='".$key."' >".$row."</option>";
					}
				}?>
			</select><br>
			<div class="form-group">
				<input type="file" name="alt_image" class="file">
				<div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-image"></i></span>
				  <input type="text" class="form-control input-sm" disabled placeholder="Upload Gambar">
				  <span class="input-group-btn">
					<button class="browse btn btn-primary input-sm" type="button"><i class="fa fa-search"></i></button>
				  </span>
				</div>
			 </div>
			 
			 <div class="form-group">
				<input type="file" name="file" class="file">
				<div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-files-o"></i></span>
				  <input type="text" class="form-control input-sm" disabled placeholder="Upload Lampiran">
				  <span class="input-group-btn">
					<button class="browse btn btn-primary input-sm" type="button"><i class="fa fa-search"></i></button>
				  </span>
				</div>
			 </div>
          </h3>
        </header>
        <div class="panel-body">
          <progress style="display: none;"></progress>
          <!--  -->
          <div id="content">
			
            <?=$article['content']?>
          </div>
        <textarea class="hidden" name="content" id="textarea-content">
			<?php echo $article["content"];?>
		</textarea>  
          <!--  -->
		  <hr>
			<?php if($auth->checkInsert($auth->moduleName) || $auth->checkUpdate($auth->moduleName)) { ?>
				<button class="button btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			<?php } if($auth->checkPublish($auth->moduleName)) {?>
				<!-- <button class="button btn btn-primary"><i class="fa fa-upload"></i> Publish</button>-->
			<?php } ?>
				<button class="button btn btn-danger cancel-button" ><i class="fa fa-times"></i> Batal</button>
        </div>
		
		</form>
      </div>
    </div>
  </div> 
</div>

<style type="text/css">
  .table .image-thumbnail img{
    width: 200px !important;
    height: auto;
  }
  .table .image-thumbnail{
    display: block;
    width: 100%;
    overflow: hidden;
  }
  .file {
	  visibility: hidden;
	  position: absolute;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/assets/plugins/bower_components/toast-master/css/jquery.toast.css')?>">
<script src="<?php echo site_url('public/assets/plugins/bower_components/jquery-form/jquery.form.min.js')?>"></script>
<script src="<?php echo site_url('public/assets/plugins/bower_components/toast-master/js/jquery.toast.js')?>"></script>


<script type="text/javascript">
  $(document).ready(function(){
    // add_edit_button_listener();
   // $('table a.image-thumbnail').fancybox();
    $(document).on('click', '.browse', function(){
	  var file = $(this).parent().parent().parent().find('.file');
	  file.trigger('click');
	});
	
	$('#articles_form').ajaxForm({ 
			dataType :'json',
			success:function(results) { 
				if(results.success){
					$.toast({
						heading: 'Information',
						text: results.msg,
						icon: 'info',
						loader: true,        // Change it to false to disable loader
						loaderBg: '#9EC600',  // To change the background
						afterHidden: function () {
							location.href="<?=my_simple_crypt($article_page,'d')?>";
						} 
					})
				}else{
					alert(results.msg);
				}
			} 
	}); 
	
	$(document).on('change', '.file', function(){
	  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});
	
	
	$(".cancel-button").click(function(){
		if (confirm("Data telah dimasukkan tetapi belum disimpan. Apakah anda yakin ingin kembali?")) {
			location.href="<?=my_simple_crypt($article_page,'d')?>";
			return false;
		} 
	});
	
	
    $summernote = $('#content').summernote({
      minHeight: 200,
          onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
            // upload image to server and create imgNode...
            // $summernote.summernote('insertNode', imgNode);
      }
    });
    $summernote.on('summernote.image.upload', function(we, files) {
      // upload image to server and create imgNode...
      //$summernote.summernote('insertNode', imgNode);
    });
	
	$summernote.on('summernote.change', function(we, contents, $editable) {
	   $('textarea[name="content"]').html($('#content').code());
    });
  });
  var add_edit_button_listener=function(){};

 // send the file

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
</script>

<style type="text/css">
  .page-main .page-content{
    padding: 0;
  }
</style>