<div class="portlet light portlet-fit portlet-datatable bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-settings font-dark"></i>
			<span class="caption-subject font-dark sbold uppercase">Daftar Pengguna</span>
		</div>
		<div class="actions">
			<div class="btn-group btn-group-devided" data-toggle="buttons">
				<label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm active">
					<input type="radio" name="options" class="toggle" id="option1">Add Pengguna</label>
					
					</div>
					<div class="btn-group">
						<a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
							<i class="fa fa-share"></i>
							<span class="hidden-xs"> Tools </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:;"> Export to Excel </a>
							</li>
							<li>
								<a href="javascript:;"> Export to CSV </a>
							</li>

						</ul>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<div class="table-actions-wrapper">
						<span> </span>
						<select class="table-group-action-input form-control input-inline input-small input-sm">
							<option value="">Pilih...</option>
							<option value="Cancel">Hapus</option>
							<option value="Cancel">Aktifkan</option>
							<option value="Cancel">Nonaktifkan</option>
						</select>
						<button class="btn btn-sm green table-group-action-submit">
							<i class="fa fa-check"></i> Go</button>
						</div>
						<table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
							<thead>
								<tr role="row" class="heading">
									<th width="2%">
										<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
											<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
											<span></span>
										</label>
									</th>
									<th width="5%"> Record&nbsp;# </th>
									<th width="15%"> Avatar  </th>
									<th width="15%"> Nama  </th>
									<th width="200"> Keterangan </th>
									<th width="10%"> Status </th>
									<th width="10%"> Actions </th>
								</tr>
								<tbody> </tbody>
							</table>
						</div>
					</div>
				</div>
                                <!-- End: Demo Datatable 2 -->
<script src="{{ module_site_url }}assets/scripts/table-datatables-ajax.min.js" type="text/javascript"></script>                                