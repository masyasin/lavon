<h1 class="page-title"> Unit
    <small>manajemen unit</small>
</h1>
<div class="row">        
    <div class="col-md-12">
        <div class="portlet light bordered">
            
            <div class="portlet-body">
<?php
    $asset = new CMS_Asset();
    
foreach ($css_files as $file) {
    $asset->add_css($file);
}
    echo $asset->compile_css();

foreach ($js_files as $file) {
    $asset->add_js($file);
}
    
    echo $asset->compile_js();

    
    echo $output;
?>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // gc.setSetting('loadDataOnly',true);
        setTimeout(function(){
        $('button.btn.refresh-data').click();

        },3000);
    });
</script>