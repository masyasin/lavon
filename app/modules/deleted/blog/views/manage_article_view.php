

  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Artikel</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">Manajemen</a></li>
        <li class="active">Artikel</li>
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
<!-- <a class="btn btn-primary" href="{{ site_url }}{{ module_path }}/blog/index">Show Blog</a> -->
 </div>
     </div>
     </div>
     </div>  