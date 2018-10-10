<h1 class="page-title"> Pengaturan Otoritas
    <small>inputs add, edit and delete otoritas data</small>
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
