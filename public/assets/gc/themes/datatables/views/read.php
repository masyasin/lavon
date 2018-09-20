<?
$form_title =  'Detail '.$subject;
?>
<div class="modal fade modal-3d-slit"  aria-hidden="true"
aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" id="modalForm" mode="read">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><?=$form_title?></h4>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" id="crudForm" enctype="multipart/form-data" action="<?=$insert_url?>">
      <? foreach($fields as $field): ?>
    
      <div class="form-group">
        <label class="col-sm-3 control-label"><?= $input_fields[$field->field_name]->display_as?> : </label>
        <div class="col-sm-9">
          <?= gc_value_format(html2text($input_fields[$field->field_name]->input),$input_fields[$field->field_name]->name) ?>
        </div>
      </div>

      <? endforeach  ?>
     
      <? foreach($hidden_fields as $hidden_field): ?>
            <?= $hidden_field->input; ?>
      <? endforeach ?>
      
      <?php if ($is_ajax):?>
        <input type="hidden" name="is_ajax" value="true" />
      <?endif?>

      <div id='report-error' class='report-div error'></div>
      <div id='report-success' class='report-div success'></div>
      <div class='form-button-box loading-box' style="display: none;">
        <div class='small-loading' id='FormLoading'><?= $this->l('form_update_loading'); ?></div>
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default margin-0" data-dismiss="modal" id="cancel-button"><i class="icon wb-close"></i>Tutup</button>
        
      </div>
    </div>
  </div>
</div>
 