	<div class="page animsition">
    <div class="page-header">
      <h1 class="page-title"><?php echo (isset($headVars)?$headVars["pageTitle"]:'Dashboard -- ')?></h1>
      <ol class="breadcrumb">
        <li><a href="{{ base_url }}admin/dashboard">Dashboard</a></li>
        <li><a href="javascript:void(0)">Pengaturan</a></li>
        <li class="active"><?php echo (isset($headVars)?strtolower($headVars["pageTitle"]):' -- ')?></li>
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
		<div class="row">
		<div class="">
	
	
	
	<?php 
		if(isset($viewFile)){
			echo $this->template->load_view($viewFile,'',true);
		}
	?>
	
    <?php
	
	$asset = new CMS_Asset();
	$asset->add_module_css('styles/navigation.css','main');
	
	//var_dump($viewVars);
	foreach($headVars["css"] as $file){
		$asset->add_css($file,'');
	}
	
	echo $asset->compile_css();

	foreach($scriptVars["js"] as $file){
		$asset->add_js($file,'');
	}
	
	if(isset($scriptVars["mod_js"])){
		foreach($scriptVars["mod_js"] as $file){
			$asset->add_module_js($file,'admin');
		}
	}
	
	$asset->add_module_js('scripts/navigation.js','main');
	echo $asset->compile_js();

    if(count($navigation_path)>0){
        echo '<div style="padding-bottom:10px;">';
        echo '<a class="btn btn-primary" href="'.site_url('main/navigation').'">First Level Navigation</a>';
        for($i=0; $i<count($navigation_path)-1; $i++){
            $navigation = $navigation_path[$i];
            echo '&nbsp;<a class="btn btn-primary" href="'.site_url('main/navigation/'.$navigation['navigation_id']).'">'.
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
     </div>     
<script type="text/javascript">
    $(document).ready(function(){
        // override default_layout view
        $('#field-default_layout').hide();
        $('#default_layout_input_box').append('<select id="select-default_layout"></select>');
        // fetch layout
        fetch_layout_option();
        $('#field_default_theme_chzn > div.chzn-drop > ul.chzn-results > li').click(function(){
            fetch_layout_option();
        });
        // adjust real input
        $('#select-default_layout').live('change', function(){
            var selected_layout = $('#select-default_layout option:selected').val();
            $('#field-default_layout').val(selected_layout);
        });
    });
    // TODO: make layout input a combobox
    function fetch_layout_option(){
        var theme = $('#field_default_theme_chzn > div.chzn-drop > ul.chzn-results > li.result-selected').html();
        if(typeof(theme) == 'undefined'){
            theme = '';
        }
        var current_layout = $('#field-default_layout').val();
        $.ajax({
            url: '{{ site_url }}main/get_layout/'+theme,
            dataType: 'json',
            success: function(response){
                $("#select-default_layout").html('');
                //$("#select-default_layout").append('<option value="'+current_layout+'" selected>'+current_layout+'</option>');
                for(var i=0; i<response.length; i++){
                    var layout = response[i];
                    if(layout == current_layout){
                        $("#select-default_layout").append('<option value="'+layout+'" selected>'+layout+'</option>');
                    }else{
                        $("#select-default_layout").append('<option value="'+layout+'">'+layout+'</option>');
                    }
                }
            }
        });
    }
</script>