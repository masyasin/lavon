<h1 class="page-title"> Manage Fasilitas
    <small>inputs add, edit and delete fasilitas data</small>
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
<style type="text/css">
    td.field-ppa1,
    td.field-ppa2,
    td.field-ppa3,
    td.field-ppa4,
    td.field-ppa5{text-align: center;font-weight: bold;}
</style>