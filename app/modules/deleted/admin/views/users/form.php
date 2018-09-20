<?php 
 $dataRow 			= $viewVars["dataRow"] ?$viewVars["dataRow"]:false;
 $activeModules 	= $viewVars["activeModules"] ?$viewVars["activeModules"]:false;
 $auth 				= $viewVars["controller"];
 $model				= $viewVars["model"];
 $modelModules		= $viewVars["modelModules"];
 $groupModules		= $viewVars["groupModules"];
?>



<div class="">
    <div class="page-title">
        <div class="title_right">
            <a href="<?php echo site_url('/admin/users/'); ?>" class="btn btn-default pull-right" style="border-radius : 0px; border-color: #e5e6e7; margin-bottom: 0px; margin-top: 5px;">
                <i class="fa fa-table" aria-hidden="true"></i> Users
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form :: <?php echo $dataRow ? $dataRow['user_name'] : 'Create New'; ?></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Congratulations!</strong> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('danger')) : ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Ups Sorry!</strong> <?php echo $this->session->flashdata('danger'); ?>
                        </div>
                    <?php endif; ?>
                    <br />
                    <?php echo form_open(current_url() . ($dataRow ? '?' . http_build_query($_GET) : ''), array('id' => 'demo-form2', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate')); ?>
                   
					
                    <div class="form-group <?php echo form_error('user_name') ? 'has-error' : ''; ?>">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Username <span class="required" style="color:#f22;">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" name="user_name" class="form-control col-md-7 col-xs-12" name="user_name" value="<?php echo set_value('user_name'); ?>" maxlength="100" >
                            <?php echo form_error('user_name', '<span class="help-block" style="font-size:12px; margin-top:20px;"><i>', '</i></span>'); ?>
                        </div>
                    </div>
					
					<div class="form-group <?php echo form_error('email') ? 'has-error' : ''; ?>">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">email <span class="required" style="color:#f22;">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text"  class="form-control col-md-7 col-xs-12" name="email" value="<?php echo set_value('email'); ?>" maxlength="100" >
                            <?php echo form_error('email', '<span class="help-block" style="font-size:12px; margin-top:20px;"><i>', '</i></span>'); ?>
                        </div>
                    </div>
					
					<div class="form-group <?php echo form_error('real_name') ? 'has-error' : ''; ?>">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="real-name">Real Name <span class="required" style="color:#f22;">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" name="real_name" class="form-control col-md-7 col-xs-12" name="real_name" value="<?php echo set_value('real_name'); ?>" maxlength="100" >
                            <?php echo form_error('real_name', '<span class="help-block" style="font-size:12px; margin-top:20px;"><i>', '</i></span>'); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('password') ? 'has-error' : ''; ?>">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Password<?php echo !$dataRow ? ' <span class="required" style="color:#f22;">*</span>' : '';?>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="password" name="password" class="form-control col-md-7 col-xs-12" name="password" value="<?php echo set_value('password'); ?>" >
                            <?php echo form_error('password', '<span class="help-block" style="font-size:12px; margin-top:20px;"><i>', '</i></span>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">User Groups
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12 choosen-select" name="groups[]" multiple="" data-placeholder="Choose user groups..." >
                                <?php foreach ($groupModules as $key => $value): ?>
                                <option value="<?php echo $value['group_id'];?>" <?php echo $dataRow['groups'] ? (in_array($value['group_id'], $dataRow['groups']) ? 'selected' :'') : '';?> ><?php echo $value['group_name'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">Privilege Access</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <table class="table table-bordered" style="margin-bottom: 0px;">
                                <thead>
                                    <tr style="background-color: #f5f5f6" >
                                        <th><i class="fa fa-clone"></i> Module Name</th>
                                        <th class="text-center" style="width:40px;"><i data-toggle="tooltip" data-placement="left" title="Privilege to read the module" class="fa fa-eye"></i></th>
                                        <th class="text-center" style="width:40px;"><i data-toggle="tooltip" data-placement="left" title="Privilege to create new module" class="fa fa-plus"></th>
                                        <th class="text-center" style="width:40px;"><i data-toggle="tooltip" data-placement="left" title="Privilege to update the module" class="fa fa-edit"></th>
                                        <th class="text-center" style="width:40px;"><i data-toggle="tooltip" data-placement="left" title="Privilege to remove the module" class="fa fa-minus"></th>
                                    </tr>
                                </thead>
                                <body>
                                <?php 
                                if($activeModules) :
                                    foreach ($activeModules as $key => $value): 
                                ?>
                                    <tr>
                                        <td><?php echo $value['name'];?></td>
                                        <td class="text-center"><input type="checkbox" class="flat" value="1" name="module[<?php echo $value['id'];?>][read]" <?php echo (!$value['read'] ? 'disabled' : ''); echo (set_value('module['.$value['id'].'][read]') ? 'checked' : ''); ?> ></td>
                                        <td class="text-center"><input type="checkbox" class="flat" value="1" name="module[<?php echo $value['id'];?>][insert]" <?php echo (!$value['insert'] ? 'disabled' : ''); echo (set_value('module['.$value['id'].'][insert]') ? 'checked' : ''); ?> ></td>
                                        <td class="text-center"><input type="checkbox" class="flat" value="1" name="module[<?php echo $value['id'];?>][update]" <?php echo (!$value['update'] ? 'disabled' : ''); echo (set_value('module['.$value['id'].'][update]') ? 'checked' : ''); ?> ></td>
                                        <td class="text-center"><input type="checkbox" class="flat" value="1" name="module[<?php echo $value['id'];?>][remove]" <?php echo (!$value['remove'] ? 'disabled' : ''); echo (set_value('module['.$value['id'].'][remove]') ? 'checked' : ''); ?> ></td>
                                    </tr>
                                <?php 
                                    endforeach; 
                                endif;
                                ?>
                                </body>
                                
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">User Status</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="radio radio-success">
								<input type="radio" name="active" id="status1" value="1" <?php echo set_value('active') ? 'checked' : ''; ?>>
								<label for="status1"> Enable </label>
							</div>
							<div class="radio radio-success">
								<input type="radio" name="active" id="status2" value="0" <?php echo set_value('active') ? '' : 'checked'; ?>>
								<label for="status2"> Disable </label>
							</div>
                        </div>
                    </div>
                    <?php if($auth->checkInsert() || $auth->checkUpdate()):?>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                            <?php if ($dataRow && $auth->checkInsert()): ?>
                                <a class="btn btn-warning" href="<?php echo current_url(); ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp;<span>New User</span></a>
                            <?php endif; ?>
                            <a class="btn btn-primary" href="<?php echo current_url() . ($dataRow ? '?' . http_build_query($_GET) : ''); ?>"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;&nbsp;<span>Reset</span></a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;<span>Submit</span></button>
                        </div>
                    </div>
                    <?php endif; 
                    echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>