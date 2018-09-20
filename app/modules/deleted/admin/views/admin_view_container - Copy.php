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
		<div class="row">
		<div class="">
    <div class="page-title">
        <div class="title_right">
            <?php //if($this->session->checkInsert()):?>
            <a href="<?php echo site_url('/admin/module/form/') ;?>" class="btn btn-default pull-right" style="border-radius : 0px; border-color: #e5e6e7; margin-bottom: 0px; margin-top: 5px;">
                <i class="fa fa-file-o " aria-hidden="true"></i> New Module
            </a>
            <?php //endif;?>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php echo form_open(current_url().($_GET ? '?'.http_build_query($_GET) : '')); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Congratulations!</strong> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <ul class="list-inline">
                        <li class="all"><a href="<?php $params=$_GET; $params['view']='all'; echo current_url().'?'.http_build_query($params);?> " class="<?php echo !isset($_GET['view']) ? 'current' : (trim($_GET['view'])=='all' ? 'current' : '') ;?>">All <span class="count">(<?php echo $viewVars['model']->getTotalStatus('all') ;?>)</span></a> |</li>
                        <li class="enable"><a href="<?php $params=$_GET; $params['view']='enable'; echo current_url().'?'.http_build_query($params);?>" class="<?php echo !isset($_GET['view']) ? '' : (trim($_GET['view'])=='enable' ? 'current' : '') ;?>">Enable <span class="count">(<?php echo $viewVars['model']->getTotalStatus('enable') ;?>)</span></a> |</li>
                        <li class="disable"><a href="<?php $params=$_GET; $params['view']='disable'; echo current_url().'?'.http_build_query($params);?>" class="<?php echo !isset($_GET['view']) ? '' : (trim($_GET['view'])=='disable' ? 'current' : '') ;?>">Disable <span class="count">(<?php echo $viewVars['model']->getTotalStatus('disable') ;?>)</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-4 col-xs-12 bulkactions" style="padding-left: 0px; padding-right: 0px;">
                        <div class="input-group">
                            <select class="form-control chosen-bulkactions" name="action">
                                <option value="">Bulk Actions</option>
                                <?php //if($this->session->checkUpdate()):?>
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>
                                <?php //endif;
                                //if($this->session->checkDelete()): ?>
                                <option value="delete">Delete Permanently</option>
                                <?php //endif;?>
                            </select> 
                            <button type="submit" class="btn btn-default input-group-addon">Apply</button>
                            <button type="button" class="btn btn-default btn-table-sort input-group-addon">Sort</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 hidden-xs"></div>
                    <div class="col-md-4 col-xs-12 findactions" style="padding-left: 0px; padding-right: 0px;">
                        <div class="input-group">
                            <input type="text" class="form-control txt-table-search" placeholder="Search for..." value="<?php echo isset($_GET['search'])? trim($_GET['search']) : '';?> " >
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-table-search" type="button" style="margin-right: 0px;" >Search</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
			<hr>
            <div class="clearfix"></div>
            
            <div class="table-responsive">
                <table class="table color-bordered-table info-bordered-table jambo_table bulk_action" style="margin-bottom: 10px;">
                    <thead>
                        <tr class="headings">
                            <th>
								<input input type="checkbox" class="check flat" id="check-all" data-checkbox="icheckbox_flat-red">
							</th>
                            <?php
                            if(isset($_GET['sort'])) {
                                $sortParam = json_decode($_GET['sort'], TRUE);
                            }
                            ?>
                            <th class="column-title column-sort"><i class="fa fa-sort<?php echo isset($sortParam['id']) ? '-alpha-'.$sortParam['id'] : '';?>" data-sort="id" aria-hidden="true"></i> Module ID </th>
                            <th class="column-title column-sort"><i class="fa fa-sort<?php echo isset($sortParam['name']) ? '-alpha-'.$sortParam['name'] : '';?>" data-sort="name" aria-hidden="true"></i> Module Name </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Read </th>
                            <th class="column-title">Insert </th>
                            <th class="column-title">Update </th>
                            <th class="column-title">Remove </th>
                            <?php //if($this->session->checkUpdate()):?>
                            <th class="column-title no-link last" style="width: 60px;"><span class="nobr">Action</span>
                            <?php //endif;?>
                            </th>
                            <th class="bulk-actions" style="display:none;" colspan="<?php //echo $this->session->checkUpdate() ? '8' : '7';?>">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        if($viewVars['model']->ttlRows):
                            $dataRows = $viewVars['model']->getFetchData();
                            if(!$dataRows) {
                                $getPage = $viewVars['model']->getPage();
                                if($getPage) {
                                    unset($_GET['page']);
                                    redirect(current_url() . ($_GET ? '?'.http_build_query($_GET) : ''));
                                }
                            }
                            foreach ($dataRows as $key => $value):
                        ?>
                            <tr class="even pointer">
                                <td class="a-center " style="vertical-align: middle" >
									<input type="checkbox" name="table_records" class="check flat" data-checkbox="icheckbox_flat-green">
                                    <input type="checkbox" class="hidden checked-id" name="id[]" value="<?php echo $value['id'];?>" >
                                </td>
                                <td class=" " style="vertical-align: middle"><?php echo $value['id'];?></td>
                                <td class=" " style="vertical-align: middle"><?php echo $value['name'];?></td>
                                <td class=" " style="vertical-align: middle;">
                                    <?php echo $value['status'] ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>';?>
                                </td>
                                <td class=" " style="vertical-align: middle"><?php echo $value['read'] ? 'Yes' : 'No';?></td>
                                <td class=" " style="vertical-align: middle"><?php echo $value['insert'] ? 'Yes' : 'No';?></td>
                                <td class=" " style="vertical-align: middle"><?php echo $value['update'] ? 'Yes' : 'No';?></td>
                                <td class=" " style="vertical-align: middle"><?php echo $value['remove'] ? 'Yes' : 'No';?></td>
                                <?php //if($this->session->checkUpdate()):?>
                                <td class="last" style="vertical-align: middle; width: 60px;">
                                    <a href="<?php echo site_url('/admin/module/form?sid='.$value['id']);?>" class="btn btn-info btn-sm" style="margin:0px;"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                <?php //endif;?>
                            </tr>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-4 col-xs-12 bulkactions" style="padding-left: 0px; padding-right: 0px;">
                        <div class="input-group">
                            <select class="form-control chosen-bulkactions-bottom" name="noaction">
                                <option value="">Bulk Actions</option>
                                <?php //if($this->session->checkUpdate()):?>
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>
                                <?php //endif;
                                //if($this->session->checkDelete()): ?>
                                <option value="delete">Delete Permanently</option>
                                <?php// endif;?>
                            </select> 
                            <button type="submit" class="btn btn-default input-group-addon">Apply</button>
                                <button type="button" class="btn btn-default btn-table-sort input-group-addon">Sort</button>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                        <?php echo $pagging;?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            
        </div>
    </div
    <?php echo form_close(); ?>
</div>
	
	
	
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
			$asset->add_module_js($file,'main');
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