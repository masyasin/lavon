<h1 class="page-title"> Pengaturan Otoritas
    <small>inputs add, edit and delete otoritas data</small>
</h1>
<div class="row">        
    <div class="col-md-12">
        <div class="portlet light bordered">
            
            <div class="portlet-body">

<?php
                $asset = new CMS_Asset();
    $asset->add_module_css('styles/navigation.css', 'pengaturan');
foreach ($css_files as $file) {
    $asset->add_css($file);
}
    echo $asset->compile_css();

foreach ($js_files as $file) {
    $asset->add_js($file);
}
    $asset->add_module_js('scripts/navigation.js', 'pengaturan');
    echo $asset->compile_js();

if (count($navigation_path)>0) {
    echo '<div style="padding-bottom:10px;">';
    echo '<a class="btn btn-primary" href="'.site_url('pengaturan/navigation').'">First Level Navigation</a>';
    for ($i=0; $i<count($navigation_path)-1; $i++) {
        $navigation = $navigation_path[$i];
        echo '&nbsp;<a class="btn btn-primary" href="'.site_url('pengaturan/navigation/'.$navigation['navigation_id']).'">'.
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
    th.actions{width: 167px !important;}
</style>

<script type="text/javascript">
    $(document).ready(function(){
        // override default_layout view
        // $('#field-default_layout').hide();
        // $('#default_layout_input_box').append('<select id="select-default_layout"></select>');
        // // fetch layout
        // fetch_layout_option();
        // $('#field_default_theme_chzn > div.chzn-drop > ul.chzn-results > li').click(function(){
        //     fetch_layout_option();
        // });
        // // adjust real input
        // $('#select-default_layout').live('change', function(){
        //     var selected_layout = $('#select-default_layout option:selected').val();
        //     $('#field-default_layout').val(selected_layout);
        // });
    
    gc.onShowForm=  function (modal,mode,ajax_url,e){
        // var theme = $('#field_default_theme_chzn > div.chzn-drop > ul.chzn-results > li.result-selected').html();
        // if(typeof(theme) == 'undefined'){
        //     theme = '';
        // }
        var current_layout = $('#field-default_layout').val();
        $.ajax({
            url: '{{ site_url }}pengaturan/get_layout/'+'metronic',
            dataType: 'json',
            success: function(response){
                $("#field-default_layout").val('');
                //$("#select-default_layout").append('<option value="'+current_layout+'" selected>'+current_layout+'</option>');
                for(var i=0; i<response.length; i++){
                    var layout = response[i];
                    if(layout == current_layout){
                        $("#field-default_layout").append('<option value="'+layout+'" selected>'+layout+'</option>');
                    }else{
                        $("#field-default_layout").append('<option value="'+layout+'">'+layout+'</option>');
                    }
                }
            }
        });
    }
});
</script>