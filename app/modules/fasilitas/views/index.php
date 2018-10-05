<div class="row">        
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Cluster</span>
                                        </div>
                </div>
                <div class="portlet-body">

<?php
    $asset = new CMS_Asset();
    $asset->add_module_css('styles/navigation.css', 'navigation');
foreach ($css_files as $file) {
    $asset->add_css($file);
}
    echo $asset->compile_css();

foreach ($js_files as $file) {
    $asset->add_js($file);
}
    $asset->add_module_js('scripts/navigation.js', 'navigation');
    echo $asset->compile_js();

if (count($navigation_path)>0) {
    echo '<div style="padding-bottom:10px;">';
    echo '<a class="btn btn-primary" href="'.site_url('navigation').'">First Level Navigation</a>';
    for ($i=0; $i<count($navigation_path)-1; $i++) {
        $navigation = $navigation_path[$i];
        echo '&nbsp;<a class="btn btn-primary" href="'.site_url('navigation/'.$navigation['navigation_id']).'">'.
            $navigation['navigation_name'].' ('.$navigation['title'].')'.'</a>';
    }
    echo '</div>';
}
    echo $output;
?>
</div>
</div>
 </div>
 </div>

 <style type="text/css">
     #field-nilai_poin{
        width: 200px;
     }
 </style>
