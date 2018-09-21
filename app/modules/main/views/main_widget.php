
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Widget</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">Manajemen</a></li>
        <li class="active">Widget</li>
      </ol>
      
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"></h3>
        </header>
        <div class="panel-body"><?php 
	$asset = new CMS_Asset();
	$asset->add_module_css('styles/widget.css', 'main'); 
	foreach($css_files as $file){
		$asset->add_css($file);
	} 
	echo $asset->compile_css();
	
	foreach($js_files as $file){
		$asset->add_js($file);
	}
	$asset->add_module_js('scripts/widget.js', 'main');
	echo $asset->compile_js();
	
	echo $output;
	?></div>
     </div>
     </div>
     </div> 