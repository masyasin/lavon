<div class="">
    <div class="page-title">
        <div class="title_right">
            <?php //if($this->session->checkInsert()):?>
            <button class="btn btn-success btn-new-menu" style="border-radius : 0px; border-color: #e5e6e7; margin-bottom: 0px; margin-top: 5px;">
                <i class="fa fa-file-o " aria-hidden="true"></i> New Menu
            </button>
			<br>
			<hr>
            <?php //endif;?>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="spinner hidden menu-spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dd" id="nestablemenu" >
                <ol class="dd-list"><?php echo $nestableOutput;?></ol>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </br>
</div>
<div id="nestable-template" class="hidden"></div>
<div id="form-template" class="hidden">
    <?php echo form_open(current_url()); ?>
    <input type="hidden" name="sort" value="" class="input_sort"/>
    <?php echo form_close(); ?>
</div>