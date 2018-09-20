<div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Polling</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">Konten</a></li>
        <li class="active">Polling</li>
      </ol>
      
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"></h3>
        </header>
        <div class="panel-body hide-me" id="pollingData">
          
        </div>
        <div class="panel-body" id="pollingGrid">
          
          <!--  -->
          <?php
          $asset = new CMS_Asset();
          foreach($css_files as $file){
            $asset->add_css($file);
          }
          echo $asset->compile_css();

          foreach($js_files as $file){
            $asset->add_js($file);
          }
          echo $asset->compile_js();
          echo $output;
          ?>
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
  .hide-me{
    display: none;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    add_edit_button_listener();
    $('table a.image-thumbnail').fancybox();


    setTimeout(function(){
      var select_edit = 'a.edit_button[data-original-title=data]';
      $(select_edit).unbind('click');
      // $(select_edit).click(function(e){
      //   console.log('Show polling data');

      //   var url = $(this).attr('href')+'/ajax_list?uuidv4='+uuidv4();
      //   $.components.get('animsition').init();
      //   $.post(url,{
      //     is_ajax: 'true'
      //   },function(rt){
      //     $('.animsition').animsition('in');
      //     $('#pollingData').html(rt);
      //     $('#pollingData').removeClass('hide-me');
      //     $('#pollingGrid').addClass('hide-me');
      //   });

      //   return false;
      // });

    },1000);
  });


  gc.onShowForm = function(e,mode,url){
    console.log(arguments)
  }
</script>