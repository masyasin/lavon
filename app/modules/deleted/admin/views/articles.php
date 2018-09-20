<div class="page animsition" >
    <div class="page-header">
      <h1 class="page-title">Artikel</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">Konten</a></li>
        <li class="active">Artikel</li>
      </ol>
      
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <br>
            <div class="col-md-12">
               <div class="row">
                 <div class="col-md-8"> </div>
                 <div class="col-md-2 mlr-0">
                    <div class="btn-toolbar fr" aria-label="" role="toolbar">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-icon btn-default btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="filterByCategory" data-val="<?php echo $category;?>">
                          <?
                            $selected_cat_with_count = $blog_categories[$category] ;
                            $selected_cat = preg_replace('/\(.*\)/', '', $blog_categories[$category]); 
                            if(empty($selected_cat)){
                              $selected_cat="Semua Kategori";
                              $selected_cat_with_count="Semua Kategori";
                            }
                          ?>
                          <span class="btn-auto-text"><?=$selected_cat_with_count?></span><span class="caret"></span></button>

                        <ul class="dropdown-menu" aria-labelledby="filterByCategory" role="menu">
                          <li role="presentation"><a href="javascript:void(0)" role="menuitem" class="filter-category" catid="all">Semua Kategori</a></li> 

                          <?foreach($blog_categories as $cat_id => $name):?>
                          <li role="presentation"><a href="javascript:void(0)" role="menuitem" class="filter-category" catid="<?=$cat_id?>"><?= $name ?></a></li> 
                          <?endforeach?>
                        </ul>
                      </div>
                    </div>  
                    <div class="cb"></div>
                 </div>
                 <div class="col-md-2 mlr-0"> 
                    <div class="form-group">
                  <div class="input-search">
                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                    <input type="text" class="form-control keywords" name="search_query" placeholder="Temukan..." value="<?php echo (isset($keywords)?$keywords:"");?>">
                  </div>
                </div>
                 </div>
            </div>
            
          </div>
          <h3 class="panel-title"></h3>
        </header>
        <div class="panel-body">
          
          <!--  -->
          <div class="info">
            <?if(!empty($category)):?>
              <p class="filter-by-category">Menampilkan artikel yang difilter menurut kategori "<?=$selected_cat?>"</p>
            <?endif?>  
          </div>
          <table class="table table-hover tbl-data" data-url = "<?=my_simple_crypt($article_page,'d')?>" >
            <thead>
              <tr>
                <th class="dash">
                  <div class="btn-toolbar btn-toolbar-checkbox">
                    <div class="check-row checkbox-custom checkbox-default">
                      <input type="checkbox" class="check-all" name="pilih-all" >
                      <label></label>
                    </div>
                  </div>
                  
                </th>
                <th colspan="4">
                  <div class="col-md-12" style="padding-left: 2px;">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="btn-toolbar" aria-label="" role="toolbar">
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-icon btn-default btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="btnCategory"><i class="icon wb-tag" aria-hidden="true"></i><span class="caret"></span></button>
                            <?php if($auth->checkInsert($auth->moduleName)){ ?>
							<button type="button" class="add-button btn btn-icon btn-success btn-outline">Tambah Artikel</button>
							<?php } if($auth->checkPublish($auth->moduleName)) { ?>
                            <!--<button type="button" class="btn btn-icon btn-info btn-outline bulk-publish">Publikasikan</button>-->
							<?php } if($auth->checkDelete($auth->moduleName)) { ?>
                            <!-- <button type="button" class="btn btn-icon btn-default btn-outline">Kembali ke draft</button> -->
                            <button type="button" class="btn btn-icon btn-warning btn-outline bulk-delete"><i class="icon wb-trash" aria-hidden="true"></i></button>
							<?php } ?>
                            <ul class="dropdown-menu" aria-labelledby="btnCategory" role="menu">
                              <li role="presentation"><a href="javascript:void(0)" role="menuitem" class="set-category" catid="new"><i class="icon wb-plus"></i>Kategori Baru</a></li> 
                              <?foreach($blog_categories as $cat_id => $name):?>
                              <li role="presentation"><a href="javascript:void(0)" role="menuitem" class="set-category" catid="<?=$cat_id?>"><?=preg_replace('/\(.*\)/', '',$name)?></a></li> 
                              <?endforeach?>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>
                  </div>
                  
                </th>
              </tr>
              <tr style="opacity: 0;display: none;">
                <th>#</th>
                <th><a  href="<?=site_url('admin/artikel/?ob=judul&odesc='.($odesc=='asc'?'desc':'asc'))?>">Judul</a></th>
                <th><a href="<?=site_url('admin/artikel/?ob=comment&odesc='.($odesc=='asc'?'desc':'asc'))?>">Komentar</a></th>
                <th><a href="<?=site_url('admin/artikel/?ob=view&odesc='.($odesc=='asc'?'desc':'asc'))?>">View</a></th>
                <th>DATE</th>
              </tr>
              <tbody>
               <?$no=($pagination['current_page'] + 1)?> 
              <? foreach($articles as $article):?>
              <tr class="article-row">
                <td>
                  <div class="check-row checkbox-custom checkbox-default">
                      <input type="checkbox" name="pilih-<?=$article['article_id']?>" data-id="<?=$article['article_id']?>" >
                      <label></label>
                    </div>
                </td>
                <? 
                $edit_link 		= site_url('admin/artikel/edit/'.$article['article_id']).'/'.my_simple_crypt(current_url().'?'.$_SERVER['QUERY_STRING'],'e').'/'.$article['article_url']; 
                $preview_link 	= site_url('konten/artikel/'.$article['article_url'].'?preview=true');
                $delete_link 	= site_url('admin/artikel/delete/'.$article_url);
                $publish_link 	= site_url('admin/artikel/publish/'.$article_url);
                ?>
				
                <td><a href="<?=$edit_link?>" class="<?=($article['publish']==1?"article-link":"article-unlink")?>"><?=$article['article_title']?></a><div class="category-list"><small><a href="<?=site_url('admin/artikel/') . '?ob='.$ob.'&odesc='.($odesc=='asc'?'desc':'asc').'&category='.$article['category_id']?>"><?=$article['category']?></a></small></div><br>
                  <div class="toolbox">
                    <small>
					<?php if($auth->checkUpdate($auth->moduleName)) { ?>
                      <a href="<?=$edit_link?>">Edit</a>&nbsp;|&nbsp;
					<?php } ?>
                      <a href="<?=$preview_link?>" target="_blank">Lihat</a>&nbsp;|&nbsp;
					<?php if($auth->checkPublish($auth->moduleName)) { ?>
					  <a href='javascript:void(0);' data-title='<?php echo $article["article_title"];?>' data-toggle='tooltip' title='<?php echo ($article['publish']==1?"Un Publish":"Publish");?>' data-uri='<?php echo site_url('admin/'.$auth->uriForm);?>' data-id='<?php echo $article["article_id"]?>' class='<?php echo ($article["publish"]==1?"btn-unpublish":"btn-publish");?>'><?php echo ($article['publish']==1?"Un Publish":"Publish");?></a>&nbsp;|&nbsp;
					
					<?php } if($auth->checkDelete($auth->moduleName)) { ?>
                      <a catid="<?=$article['category_id']?>" data-url="<?=$delete_link?>" href="javascript:void(0);"  class="article_delete" rowid="<?=$article['article_id']?>" >Hapus</a> 
					<?php } ?>
				   </small>
                  </div>
                </td>
                <td class="comment-count-row"><?=$article['comment_count']?> <i class="icon wb-chat" title="Komentar"></i></td>
                <td class="article-view-row"><?=$article['view']?> <i class="icon wb-eye" title="Jumlah Dilihat"></i></td>
                <td class="article-date-row"><?= date('d/m/y',strtotime($article['date']))?></td>
              </tr>
              <?$no++?>
              <?endforeach?>
              <?if(count($articles)==0):?>
                <tr class="article-row">
              <td colspan="5"><i>Belum ada artikel dalam kategori ini.<i></td>
            </tr>
              <?endif?>
            </tbody>
            
            </thead>
          </table>
          <?= $pagination['links']?>
          <!--  -->

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
  .category-list{
    display: inline-block;
    margin: 0 1em;
  }
  .category-list > small > a{
    color: #bbb;
    font-style: italic;
  }
  .category-list > small > a:hover{
    text-decoration: underline !important;
  }
  .info > p.filter-by-category{
    font-weight: bold;
  }
  a.article-link{
    color: #00838f;
  }
  a.article-link:hover{
    text-decoration: underline !important;
  }
  a.article-unlink{
    color: #888;
  }
  a.article-unlink:hover{
    text-decoration: underline !important;
  }
  tr > td > .toolbox{
    opacity: 0;
  }
  tr.active > td > .toolbox,
  tr:hover > td > .toolbox{
    opacity: .54;
  }
  .toolbox > small > a{
    color: #00838f;
    /*margin-right: 1em;*/
  }
  .toolbox > small > a:hover{
    text-decoration: underline !important;
  }
  td.comment-count-row{
    width: 90px;
  }
  td.article-view-row{
    width: 90px;
  }
  td.article-date-row{
    width: 90px;
  }
  .btn-toolbar-checkbox{
        margin-left: 0;
    border: solid 1px #e4eaec;
    height: 33px;
    padding: 3px 6px;
    border-radius: 3px;
  }
  .btn-toolbar-checkbox > .check-row{
    margin-top: 2px;
  }
  .btn-toolbar button{
    font-weight: bold;
    font-size: 80%;
  }
  ul[aria-labelledby=filterByCategory],
  ul[aria-labelledby=btnCategory]{
    max-height: 400px;
    overflow-y: auto;
    margin-top: -1px;
  }
  .input-search .form-control{
    border-radius: 0;
  }
  .cb{
    clear: both;
  }
  .fr{
    float: right;
  }
  .mlr-0{
    margin-left: 0;
    margin-right: 0;
    padding-left: 0;
    /*padding-right: 0;*/
  }
  div.input-search input[type=text]{
    height: 34px;
  }
  div.input-search input[type=text],
  div.input-search button{
    font-size: 80%;
  }
  th.dash{
    width: 20px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
  // add_edit_button_listener();
  // $('table a.image-thumbnail').fancybox();

  
  $('.check-all').click(function(){
	var self = this;
	if($(this).attr('checked')){
		 $('.check-row > input[type=checkbox]').attr('checked',true);
	}else{
		$('.check-row > input[type=checkbox]:checked').attr('checked',false);
	}
  });
  
  $('.add-button').click(function(){
	  window.location.href = '<?php echo site_url('admin/artikel/add/'.my_simple_crypt(current_url().'?'.$_SERVER['QUERY_STRING'],'e'));?>';
  });
  
  $('.bulk-delete').click(function(){
	 var node = $('.check-row > input[type=checkbox]:checked');
	 var currUrl = $(".tbl-data").data("url");
	 if(node.length > 0 ){
		var data = [];
		for(i=0;i<node.length;i++){
			data.push($(node[i]).data("id"));
		}
		var delete_link = '<?php echo site_url('admin/artikel/bulk-delete/'.$article_url)?>';
		var delete_url = delete_link+'?uuidv4='+uuidv4();
		bootbox.confirm({
			message: "Apakah anda yakin ingin menghapus artikel yang terpilih?",
			buttons: {
				confirm: {
					label: 'Hapus',
					className: 'btn-warning'
				},
				cancel: {
					label: 'Batal',
					className: 'btn-default'
				}
			},
			callback: function (result) {
				if(result){
				  $.components.get('animsition').init();
				  $.post(delete_url,{data:data},function(results){
					 bootbox.alert(results.msg);
						var href = window.location.href;
						$.get(href,function(content){
						   $('.animsition').animsition('in');
						   $('.page').replaceWith(content);

						   setTimeout(function(){
							$.components.get('animsition').init();
						   $('.animsition').animsition('in');

						   },1000)
						   
						});

				  },'json');
				}
			}
		});
	 }else{
		 bootbox.alert("Belum ada data yang dipilih!");
	 }
	 
  });
  
  
  
  $('a.article_delete').click(function(){
    var self = this;
    var rowid = $(this).attr('rowid');
    var catid = $(this).attr('catid');
    var pcatcx = $('span.catid.cat-'+catid);
    var catcx = $(pcatcx.get(0)).text();
        catcx = parseInt(catcx) - 1;
    var delete_url = $(this).attr('data-url')+'?uuidv4='+uuidv4();
    bootbox.confirm({
        message: "Apakah anda yakin ingin menghapus artikel ?",
        buttons: {
            confirm: {
                label: 'Hapus',
                className: 'btn-warning'
            },
            cancel: {
                label: 'Batal',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if(result){
              $.components.get('animsition').init();
              $.post(delete_url,{rowid:rowid},function(){
                $('.animsition').animsition('in');
                deleteArticleRow(self);
                pcatcx.each(function(){
                  $(this).text(catcx);
                });

              },'json');
            }
        }
    });
    return false;
    
  });
  
  $('a.article_publish').click(function(){
    var self = this;
    var rowid = $(this).attr('rowid');
    var catid = $(this).attr('catid');
    var text  = $(this).data('text');
    var value  = $(this).data('value');
    var pcatcx = $('span.catid.cat-'+catid);
    var catcx = $(pcatcx.get(0)).text();
        catcx = parseInt(catcx) - 1;
    var delete_url = $(this).attr('data-url')+'?uuidv4='+uuidv4();
    bootbox.confirm({
        message: "Apakah anda yakin mem-"+text+" artikel ini?",
        buttons: {
            confirm: {
                label: text,
                className: 'btn-warning'
            },
            cancel: {
                label: 'Batal',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if(result){
              $.components.get('animsition').init();
              $.post(delete_url,{rowid:rowid,publish:value},function(){
                //deleteArticleRow(self);
                pcatcx.each(function(){
                  $(this).text(catcx);
                });
				var href = window.location.href;
				
				$.get(href,function(content){
				   $('.animsition').animsition('in');
				   $('.page').replaceWith(content);

				   setTimeout(function(){
					$.components.get('animsition').init();
				   $('.animsition').animsition('in');

				   },1000)
				   
				});
              },'json');
            }
        }
    });
    return false;
    
  });

  $('tr.article-row').click(function(){
    toggleActiveRow(this);
  });
  
  function displayCategoryPrompt(cat_id){
    bootbox.prompt({ 
        buttons: {
            confirm: {
                label: 'Buat Kategori',
                className: 'btn-success'
            },
            cancel: {
                label: 'Batal',
                className: 'btn-default'
            }
        },
        size: "small",
        title: "Buat Kategori, silahkan masukkan nama kategori?", 
        callback: function(result){
          if(typeof result == 'string'){
            var category_name = $.trim(result);
            if(category_name.length == 0){
              return displayCategoryPrompt(cat_id);
            }
            console.log("create category with name = " + category_name);
            $.components.get('animsition').init();

            var postData = {category_name:category_name};
            var url = site_url() + 'admin/artikel/add_category?uuidv4='+uuidv4();
            $.post(url,postData,function(result){
              $('.animsition').animsition('in');
              if(result.status){
                var data = result.data;
                console.log(result.data);

                setArticleCategory(data);
              }else{
                bootbox.alert(result.msg);
              }
            },'json');


          }
        }
      });
  }
  $('a.set-category').click(function(){
    var cat_id = $(this).attr('catid');
    if(cat_id == 'new'){
      console.log('CREATE NEW CATEGORY AND SET CHECKED ROW');
      displayCategoryPrompt(cat_id)
    }
  });

  $('a.filter-category').click(function(){
    var cat_id = $(this).attr('catid');
    if(cat_id == 'all'){
      cat_id='';
      $('btn-auto-text').text($(this).text())
    }
    var href = '<?=site_url('admin/artikel/') . '?ob='.$ob.'&odesc='.($odesc=='asc'?'asc':'desc').'&category='?>' + cat_id;
	$('#filterByCategory').attr("data-val",cat_id);
    $.components.get('animsition').init();
    $.get(href,function(content){
       $('.animsition').animsition('in');
       $('.page').replaceWith(content);

       setTimeout(function(){
        $.components.get('animsition').init();
       $('.animsition').animsition('in');
		window.history.replaceState("","", href);
       },1000)
       
    });
  });
  
  
  $(document).delegate(".input-search-btn","click",function(){
    reloadByFilter();
  });

});
  var add_edit_button_listener=function(){};

function toggleActiveRow(tr){
  var active_cls = 'active';
  var node = $(tr);
  if(node.hasClass(active_cls)){
    // DO INACTIVE
    node.removeClass(active_cls);
    node.find('.check-row > input[type=checkbox]').attr('checked',false);
  }else{
    // DO ACTIVATE
    node.addClass(active_cls);
    node.find('.check-row > input[type=checkbox]').attr('checked',true);

  }
}

function reloadByFilter(){
	var cat_id = $('#filterByCategory').attr('data-val');
    var keywords = $('.keywords').val();
	
    var href = '<?=site_url('admin/artikel/') . '?ob='.$ob.'&odesc='.($odesc=='asc'?'asc':'desc').'&category='?>' + cat_id + '&keywords='+keywords;

    $.components.get('animsition').init();
    $.get(href,function(content){
       $('.animsition').animsition('in');
       $('.page').replaceWith(content);

       setTimeout(function(){
        $.components.get('animsition').init();
       $('.animsition').animsition('in');
		window.history.replaceState("","", href);
       },1000)
       
    });
}



function deleteArticleRow(el){
  var tr = $(el).closest('.article-row');

  tr.remove();
}

function setArticleCategory(el){

}
</script>
