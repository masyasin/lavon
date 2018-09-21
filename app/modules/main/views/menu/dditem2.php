<?php if(!$isValidation):?>
<li class="dd-item" data-id="<?php echo set_value('id'); ?>" >
    <div class="x_panel">
        <a class="btn btn-xs collapse-link-nestable"><i class="fa fa-chevron-down"></i></a>
        <div class="spinner hidden nestable-spinner" style="float:right;">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div class="dd-handle"><i class="fa fa-bars"></i>&nbsp;&nbsp;<?php echo isset($dataRow['name']) ? ($dataRow['name'] ? $dataRow['name'] : set_value('name', 'Menu')) : set_value('name', 'Menu');?></div>
        <div class="x_content" style="display: none;">
            <div class="x_content_inside">
                <div class="row x_form_content" >
<?php endif;?>
                    <?php echo form_open(current_url(), array('class' => 'form-horizontal form-label-left', 'data-parsley-validate')); ?>
                    <input type="hidden" name="id" value="<?php echo set_value('id'); ?>"/>
                    <input type="hidden" name="sort" value="<?php echo set_value('sort'); ?>"/>
                    <input type="hidden" name="prn" value="<?php echo set_value('prn'); ?>"/>
                    <div class="form-group <?php echo form_error('name') ? 'has-error' : ''; ?>">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Menu Name <span class="required" style="color:#f22;">*</span></label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" required="required" class="form-control col-md-9 col-xs-12" name="name" maxlength="255" value="<?php echo set_value('name'); ?>" >
                            <?php echo form_error('name', '<span class="help-block" style="font-size:12px; margin-top:20px;"><i>', '</i></span>'); ?>
                        </div>
                    </div>
                   <!-- <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Position
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="form-control choosen-select col-md-9 col-xs-12" name="position" data-placeholder="Choose a Position..." >
                                <option value="LEFT_SIDEBAR" <?php echo set_value('position')=='LEFT_SIDEBAR' ? 'selected' : ''; ?> >LEFT SIDEBAR</option>
                                <option value="RIGTH_SIDEBAR" <?php echo set_value('position')=='RIGTH_SIDEBAR' ? 'selected' : ''; ?> >RIGTH SIDEBAR</option>
                            </select>
                        </div>  
                    </div> -->
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Route Target
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="form-control choosen-select col-md-9 col-xs-12" name="route_target" data-placeholder="Choose a Target..." >
                                <option value="_self" <?php echo set_value('route_target')=='_self' ? 'selected' : ''; ?> >Opens the linked document in the same frame as it was clicked (this is default)</option>
                                <option value="_parent" <?php echo set_value('route_target')=='_parent' ? 'selected' : ''; ?> >Opens the linked document in the parent frame</option>
                                <option value="_blank" <?php echo set_value('route_target')=='_blank' ? 'selected' : ''; ?> >Opens the linked document in a new window or tab</option>
                                <option value="_top" <?php echo set_value('route_target')=='_top' ? 'selected' : ''; ?> >Opens the linked document in the full body of the window</option>
                                <option value="framename" <?php echo set_value('route_target')=='framename' ? 'selected' : ''; ?> >Opens the linked document in a named frame</option>
                            </select>
                        </div>  
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Font Icon</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" class="form-control col-md-9 col-xs-12" name="icon" value="<?php echo set_value('icon'); ?>">
                        </div>
                    </div>
                    
					<div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Menu Status</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="radio">
                                <label style="padding-left: 0px; margin-right: 10px;">
                                    <input type="radio" class="flat" name="status" value="1" <?php echo set_value('status') ? 'checked' : ''; ?> > Enable
                                </label>
                                <label style="padding-left: 0px;">
                                    <input type="radio" class="flat" name="status" value="0" <?php echo set_value('status') ? '' : 'checked'; ?> > Disable
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Visible</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="radio">
                                <label style="padding-left: 0px; margin-right: 10px;">
                                    <input type="radio" class="flat" name="hidden" value="1" <?php echo set_value('hidden') ? 'checked' : ''; ?>> Hidden
                                </label>
                                <label style="padding-left: 0px;">
                                    <input type="radio" class="flat" name="hidden" value="0" <?php echo set_value('hidden') ? '' : 'checked'; ?> > Visible
                                </label>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Default</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="radio">
                                <label style="padding-left: 0px; margin-right: 10px;">
                                    <input type="radio" class="flat" name="as_default" value="1" <?php echo set_value('as_default') ? 'checked' : ''; ?>> Yes
                                </label>
                                <label style="padding-left: 0px;">
                                    <input type="radio" class="flat" name="as_default" value="0" <?php echo set_value('as_default') ? '' : 'checked'; ?> > No
                                </label>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Set Layout
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="form-control choosen-select col-md-9 col-xs-12" name="tpl_layout" data-placeholder="Select Layout" >
							<option value="" <?php echo set_value('tpl_layout')=='' ? 'selected' : ''; ?> >-</option>
								<?php foreach($layout as $key=>$row){?>
									<option value="<?php echo $row["id"];?>" <?php echo set_value('tpl_layout')==$row['id'] ? 'selected' : ''; ?> ><?php echo $row["name"];?></option>
								<?php } ?>
                            </select>
                        </div>  
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Force Change Layout</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="radio">
                                <label style="padding-left: 0px; margin-right: 10px;">
                                    <input type="radio" class="flat" name="forceLayout" value="1"> Enable
                                </label>
                                <label style="padding-left: 0px;">
                                    <input type="radio" class="flat" name="forceLayout" value="0" > Disable
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
<?php if(!$isValidation):?>
                </div>
                <div class="row" style="margin-bottom: 10px;" >
                    <?php if($this->session->checkInsert() || $this->session->checkUpdate() || $this->session->checkDelete()):?>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-2">
                            <?php if($this->session->checkInsert() || $this->session->checkUpdate() || $this->session->checkDelete()):?>
                            <button type="button" class="btn btn-danger btn-delete" type="reset">Delete Menu</button>
                            <?php endif;
                            if($this->session->checkInsert() || $this->session->checkUpdate()):?>
                            <button type="button" class="btn btn-success btn-save">Save Menu</button>
							<?php endif;
                            if($this->session->checkInsert() || $this->session->checkUpdate()):?>
                            <a href="<?php echo site_url("feature/editor/page/").set_value('id');?>" type="button" class="btn btn-info btn-editor" target="_blank">Config Layout</a>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php 
        if(isset($dataFetch)) {
            $CI = &get_instance();
            $html = $CI->getNestableMenu($dataRow['id']);
            if($html) {
                echo '<ol class="dd-list">'.$html.'</ol>';
            }
        };
    ?>
</li>
<?php endif;?>