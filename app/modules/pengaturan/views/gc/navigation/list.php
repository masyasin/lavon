<table  class="table table-bordered table-hover table-striped groceryCrudTable" id="<?php echo uniqid(); ?>"  data-plugin="dataTable">
	<thead>
		<tr>
			<th>#</th>
			<?php foreach($columns as $column){?>
				<th><?php echo $column->display_as; ?></th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
			<th class='actions'><?php echo $this->l('list_actions'); ?></th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1;?>
		<?php foreach($list as $num_row => $row){ ?>
		<tr id='row-<?php echo $num_row?>'>
			<td><?php echo $i++?></td>
			<?php foreach($columns as $column){?>
				<td><?php echo $row->{$column->field_name}?></td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td class='actions'>
				<?php
				if(!empty($row->action_urls)){
					foreach($row->action_urls as $action_unique_id => $action_url){
						$action = $actions[$action_unique_id];
				?>
						<a href="<?php echo $action_url; ?>" class="edit_button btn btn-sm btn-icon btn-pure btn-default" role="button" data-original-title="<?php echo $action->label?>" data-trigger="hover" data-toggle="tooltip">
							<!-- <span class="ui-button-icon-primary ui-icon <?php echo $action->css_class; ?> <?php echo $action_unique_id;?>"></span><span class="ui-button-text">&nbsp;<?php echo $action->label?></span> -->
							<i class="icon <?php echo $action->image_url?>" aria-hidden="true"></i>
						</a>
				<?php }
				}
				?>
				<?php if(!$unset_read){?>
					<a href="<?php echo $row->read_url?>" class="edit_button btn btn-sm btn-icon btn-pure btn-default" role="button">
						<i class="icon wb-eye" aria-hidden="true"></i>
					</a>
				<?php }?>

				<?php if(!$unset_edit){?>
					<a href="<?php echo $row->edit_url?>" class="edit_button btn btn-sm btn-icon btn-pure btn-default" role="button">
						<i class="icon wb-edit" aria-hidden="true"></i>
					</a>
				<?php }?>
				<?php if(!$unset_delete){?>
					<a onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')"
						href="javascript:void(0)" class="delete_button btn btn-sm btn-icon btn-pure btn-default" role="button">
						<i class="icon wb-trash" aria-hidden="true"></i>
					</a>
				<?php }?>
			</td>
			<?php }?>
		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		
	</tfoot>
</table>


