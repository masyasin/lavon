
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Profile BKPP</h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">BKPP</a></li>
        <li class="active">Profile</li>
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
	// $asset->add_module_css('styles/navigation.css','main');
	foreach($css_files as $file){
		$asset->add_css($file);
	}
	echo $asset->compile_css();

	foreach($js_files as $file){
		$asset->add_js($file);
	}
	// $asset->add_module_js('scripts/navigation.js','main');
	echo $asset->compile_js();

    // if(count($navigation_path)>0){
    //     echo '<div style="padding-bottom:10px;">';
    //     echo '<a class="btn btn-primary" href="'.site_url('main/navigation').'">First Level Navigation</a>';
    //     for($i=0; $i<count($navigation_path)-1; $i++){
    //         $navigation = $navigation_path[$i];
    //         echo '&nbsp;<a class="btn btn-primary" href="'.site_url('main/navigation/'.$navigation['navigation_id']).'">'.
    //             $navigation['navigation_name'].' ('.$navigation['title'].')'.'</a>';
    //     }
    //     echo '</div>';
    // }
	echo $output;
?>
 </div>
     </div>
     </div>
     </div> 