<div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Konsultasi</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">BKPP</a></li>
        <li class="active">Konsultasi</li>
      </ol>
      
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"></h3>
        </header>
        <div class="panel-body">
          
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
  td.field-pengirim{width: 150px}
  td.field-tanggal{width: 90px}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    add_edit_button_listener();
    $('table a.image-thumbnail').fancybox();
  });
</script>