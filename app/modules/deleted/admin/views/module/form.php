
<div class="">
    <div class="page-title">
        <div class="title_right">
            <a href="<?php echo site_url('/admin/module/') ;?>" class="btn btn-default pull-right" style="border-radius : 0px; border-color: #e5e6e7; margin-bottom: 0px; margin-top: 5px;">
                <i class="fa fa-table" aria-hidden="true"></i> Modules
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form :: <?php echo $viewVars["dataRow"] ? $viewVars["dataRow"]['name'] : 'Create New';?></h2>
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
                    <?php echo form_open(current_url().($viewVars["dataRow"] ? '?'.http_build_query($_GET) : ''), array('id' => 'demo-form2', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate')); ?>
                    <div class="form-group <?php echo form_error('id') ? 'has-error' : ''; ?>">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Module ID <span class="required" style="color:#f22;">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" name="id" value="<?php echo set_value('id'); ?>" maxlength="100" >
                            <?php echo form_error('id', '<span class="help-block" style="font-size:12px; margin-top:20px;"><i>', '</i></span>'); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('name') ? 'has-error' : ''; ?>">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Module Name <span class="required" style="color:#f22;">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" name="name" class="form-control col-md-7 col-xs-12" name="name" value="<?php echo set_value('name'); ?>" maxlength="255" >
                            <?php echo form_error('name', '<span class="help-block" style="font-size:12px; margin-top:20px;"><i>', '</i></span>'); ?>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">Module Action</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
							<div class="form-check">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="read" value="1" <?php echo set_value('read') ? 'checked' : ''; ?> > 
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Having action to read</span>
								</label>
							</div>
							<div class="form-check">
								<label class="custom-control custom-checkbox">
									 <input type="checkbox" class="custom-control-input" name="insert" value="1" <?php echo set_value('insert') ? 'checked' : ''; ?> > 
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Having action to create new once or upload for media uploader</span>
								</label>
							</div>
							<div class="form-check">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="update" value="1" <?php echo set_value('update') ? 'checked' : ''; ?> > 
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Having action to edit and update</span>
								</label>
							</div>
							<div class="form-check">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="remove" value="1" <?php echo set_value('remove') ? 'checked' : ''; ?> >
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Having action to remove</span>
								</label>
							</div>
							<div class="form-check">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="publish" value="1" <?php echo set_value('publish') ? 'checked' : ''; ?> >
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Having action to publish</span>
								</label>
							</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Module Status</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="form-check">
								<label class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="status" value="1" <?php echo set_value('status') ? 'checked' : ''; ?> > 
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Enable</span>
								</label>
								<label class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="status" value="0" <?php echo set_value('status') ? '' : 'checked'; ?> >
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Disable</span>
								</label>
                            </div>
                        </div>
                    </div>
                    <?php //if($viewVars["controller"]->checkInsert() || $viewVars["controller"]->checkUpdate()):?>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                            <?php// if($viewVars["dataRow"] && $viewVars["controller"]->checkInsert()):?>
                            <a class="btn btn-warning" href="<?php echo current_url(); ?>"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp;<span>New Module</span></a>
                            <?php //endif;?>
                            <a class="btn btn-primary" href="<?php echo current_url().($viewVars["dataRow"] ? '?'.http_build_query($_GET) : ''); ?>"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;&nbsp;<span>Reset</span></a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;<span>Submit</span></button>
                        </div>
                    </div>
                    <?php 
                   // endif;
                    echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>