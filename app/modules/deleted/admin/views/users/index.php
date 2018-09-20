<?php 
 $dataRow 			= $viewVars["dataRow"] ?$viewVars["dataRow"]:false;
 $activeModules 	= $viewVars["activeModules"] ?$viewVars["activeModules"]:false;
 $auth 				= $viewVars["controller"];
 $model				= $viewVars["model"];
 $modelModules		= $viewVars["modelModules"];
?>

<div class="">
    <div class="page-title">

        <div class="title_right">
            <?php if($auth->checkInsert()):?>
            <a href="<?php echo site_url('/admin/users/form/') ;?>" class="btn btn-success pull-right" style="border-radius : 0px; border-color: #e5e6e7; margin-bottom: 0px; margin-top: 5px;">
                <i class="fa fa-file-o " aria-hidden="true"></i> New User
            </a>
            <?php endif;?>
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
                        <li class="all"><a href="<?php $params=$_GET; $params['view']='all'; echo current_url().'?'.http_build_query($params);?> " class="<?php echo !isset($_GET['view']) ? 'current' : (trim($_GET['view'])=='all' ? 'current' : '') ;?>">All <span class="count">(<?php echo $model->getTotalStatus('all') ;?>)</span></a> |</li>
                        <li class="enable"><a href="<?php $params=$_GET; $params['view']='enable'; echo current_url().'?'.http_build_query($params);?>" class="<?php echo !isset($_GET['view']) ? '' : (trim($_GET['view'])=='enable' ? 'current' : '') ;?>">Enable <span class="count">(<?php echo $model->getTotalStatus('enable') ;?>)</span></a> |</li>
                        <li class="disable"><a href="<?php $params=$_GET; $params['view']='disable'; echo current_url().'?'.http_build_query($params);?>" class="<?php echo !isset($_GET['view']) ? '' : (trim($_GET['view'])=='disable' ? 'current' : '') ;?>">Disable <span class="count">(<?php echo $model->getTotalStatus('disable') ;?>)</span></a> |</li>
                        <li class="trash"><a href="<?php $params=$_GET; $params['view']='trash'; echo current_url().'?'.http_build_query($params);?>" class="<?php echo !isset($_GET['view']) ? '' : (trim($_GET['view'])=='trash' ? 'current' : '') ;?>">Trash <span class="count">(<?php echo $model->getTotalStatus('trash') ;?>)</span></a></li>
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
                                <?php if($auth->checkUpdate()):?>
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>
                                <option value="<?php echo trim($this->input->get('view'))=='trash' ? 'restore' : 'trash';?>"><?php echo trim($this->input->get('view'))=='trash' ? 'Restore' : 'Move to Trash';?></option>
                                <?php endif;
                                if($auth->checkDelete()): ?>
                                <option value="delete">Delete Permanently</option>
                                <?php endif;?>
                            </select> 
                            <button type="submit" class="btn btn-default input-group-addon">Apply</button>
                            <button type="button" class="btn btn-default btn-table-sort input-group-addon">Sort</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 filteractions" style="padding-left: 0px; padding-right: 0px;">
                        <div class="input-group">
                            <select class="form-control chosen-filteractions" name="filter">
                                <option value="">All User Groups</option>
                                <?php foreach ($userGroups as $key => $value):?>
                                <option value="<?php echo $value['id'];?>" <?php echo $model->getGroupFilter()==$value['id'] ? 'selected' : '';?> ><?php echo $value['name'];?></option>
                                <?php endforeach; ?>
                            </select> 
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-table-filter">Filter</button>
                            </span>
                        </div>
                    </div>
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
                <table class="table table-striped jambo_table bulk_action color-bordered-table info-bordered-table" style="margin-bottom: 10px;">
                    <thead>
                        <tr class="headings">
                            <th><input input type="checkbox" class="check flat" id="check-all" data-checkbox="icheckbox_flat-red"></th>
                            <?php
                            if(isset($_GET['sort'])) {
                                $sortParam = json_decode($_GET['sort'], TRUE);
                            }
                            ?>
                            <th class="column-title column-sort"><i class="fa fa-sort<?php echo isset($sortParam['user_name']) ? '-alpha-'.$sortParam['username'] : '';?>" data-sort="username" aria-hidden="true"></i> Username </th>
                            <th class="column-title column-sort"><i class="fa fa-sort<?php echo isset($sortParam['email']) ? '-alpha-'.$sortParam['email'] : '';?>" data-sort="email" aria-hidden="true"></i> Alamat Email</th>
                            <th class="column-title">Status </th>
                            <th class="column-title no-link last" style="width: 60px;"><span class="nobr">Action</span></th>
                            <th class="bulk-actions" style="display:none;" colspan="5">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        if($model->ttlRows):
                            $dataRows = $model->getFetchData();
                            if(!$dataRows) {
                                $getPage = $model->getPage();
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
                                <td class=" " style="vertical-align: middle"><?php echo $value['user_name'];?></td>
                                <td class=" " style="vertical-align: middle"><?php echo $value['email'];?></td>
                                <td class=" " style="vertical-align: middle;">
                                    <?php echo $value['active'] ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>';?>
                                </td>
                                <td class="last" style="vertical-align: middle; width: 60px;">
                                    <a href="<?php echo site_url('/admin/users/form?sid='.$value['user_id']);?>" class="btn btn-info btn-sm" style="margin:0px;"><?php echo $auth->checkUpdate() ? '<i class="fa fa-edit"></i> Edit' : '<i class="fa fa-eye"></i> View';?></a>
                                </td>
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
                                <?php if($auth->checkUpdate()):?>
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>
                                <option value="<?php echo trim($this->input->get('view'))=='trash' ? 'restore' : 'trash';?>"><?php echo trim($this->input->get('view'))=='trash' ? 'Restore' : 'Move to Trash';?></option>
                               <?php endif;
                                if($auth->checkDelete()): ?>
                                <option value="delete">Delete Permanently</option>
                                <?php endif;?>
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