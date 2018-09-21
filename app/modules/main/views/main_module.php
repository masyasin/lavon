<style type="text/css">
	a[href="<?php echo site_url('{{ module_path }}/group/delete/1');?>"]{
		visibility : hidden;
		pointer-events: none;
        cursor: default;
	}
</style>

  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Module</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">Pengaturan</a></li>
        <li class="active">Module</li>
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
	 </div>
     </div>
     </div>
     </div>  