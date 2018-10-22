	<h1 class="page-title"> Account
		<small>Profile</small>
	</h1>
	<div class="row" id="app">        
		<div class="col-md-12">
			<div class="portlet light bordered">

				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<!-- PORTLET MAIN -->
								<div class="portlet light profile-sidebar-portlet ">
									<!-- SIDEBAR USERPIC -->
									<div class="profile-userpic">
										<img src="{{ user_avatar }}" class="img-responsive" alt=""> </div>
										<!-- END SIDEBAR USERPIC -->
										<!-- SIDEBAR USER TITLE -->
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> {{ user_real_name }} </div>
											<div class="profile-usertitle-job"> {{ user_group }} </div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
										<!-- SIDEBAR BUTTONS -->
										<div class="profile-userbuttons">
											<!-- <button type="button" class="btn btn-circle green btn-sm">Follow</button> -->
											<!-- <button type="button" class="btn btn-circle red btn-sm">Message</button> -->
										</div>
										<!-- END SIDEBAR BUTTONS -->
										<!-- SIDEBAR MENU -->

										<!-- END MENU -->
									</div>
									<!-- END PORTLET MAIN -->
									<!-- PORTLET MAIN -->
									<div class="portlet light ">
										<!-- STAT -->

									</div>
									<!-- END PORTLET MAIN -->
								</div>
								<!-- END BEGIN PROFILE SIDEBAR -->
								<!-- BEGIN PROFILE CONTENT -->
								<div class="profile-content">
									<div class="row">
										<div class="col-md-12">
											<div class="portlet light ">
												<div class="portlet-title tabbable-line">
													<div class="caption caption-md">
														<i class="icon-globe theme-font hide"></i>
														<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
													</div>
													<ul class="nav nav-tabs">
														<li class="active">
															<a href="#tab_1_1" data-toggle="tab" aria-expanded="false">Personal Info</a>
														</li>
														<li class="">
															<a href="#tab_1_2" data-toggle="tab" aria-expanded="false">Change Avatar</a>
														</li>
														<li class="">
															<a href="#tab_1_3" data-toggle="tab" aria-expanded="false">Change Password</a>
														</li>

													</ul>
												</div>
												<div class="portlet-body">
													<div class="tab-content">
														<!-- PERSONAL INFO TAB -->
														<div class="tab-pane active" id="tab_1_1">
															<form role="form" action="#">
																<div class="form-group">
																	<label class="control-label">First Name</label>
																	<input type="text" name="first_name" class="form-control" value="<?=$first_name?>"> </div>
																	<div class="form-group">
																		<label class="control-label">Last Name</label>
																		<input type="text" name="last_name"  class="form-control" value="<?=$last_name?>"> </div>
																		<div class="form-group">
																			<label class="control-label">Email</label>
																			<input type="text" name="email" value="<?=$email?>" class="form-control"> </div>

																			<div class="margin-top-10">
																				<a href="javascript:;" class="btn green"> Simpan </a>
																				<a href="javascript:;" class="btn default"> Cancel </a>
																			</div>

																		</form>
																	</div>
																	<!-- END PERSONAL INFO TAB -->
																	<!-- CHANGE AVATAR TAB -->
																	<div class="tab-pane" id="tab_1_2">
																		<p> Anda dapat mengubah profil gambar anda </p>
																		<form action="#" role="form">
																			<div class="form-group">
																				<div class="fileinput fileinput-new" data-provides="fileinput">
																					<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																						<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
																						<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
																						<div>
																							<span class="btn default btn-file">
																								<span class="fileinput-new"> Select image </span>
																								<span class="fileinput-exists"> Change </span>
																								<input type="file" name="..."> </span>
																								<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
																							</div>
																						</div>
																						<div class="clearfix margin-top-10">
																							<span class="label label-danger">Gambar mini lampiran didukung di Firefox Terbaru, Chrome, Opera, Safari, dan Internet Explorer 10 saja </span>
																						</div>
																					</div>
																					<div class="margin-top-10">
																						<a href="javascript:;" class="btn green"> Submit </a>
																						<a href="javascript:;" class="btn default"> Cancel </a>
																					</div>
																				</form>
																			</div>
																			<!-- END CHANGE AVATAR TAB -->
																			<!-- CHANGE PASSWORD TAB -->
																			<div class="tab-pane" id="tab_1_3">
																				<form action="#">
																					<div class="form-group">
																						<label class="control-label">Current Password</label>
																						<input type="password" class="form-control" v-model="current_passwd"> </div>
																						<div class="form-group">
																							<label class="control-label">New Password</label>
																							<input type="password" class="form-control" v-model="new_password"> </div>
																							<div class="form-group">
																								<label class="control-label">Re-type New Password</label>
																								<input type="password" v-model="retype_passwd" class="form-control"> </div>
																								<div class="margin-top-10">
																									<a href="javascript:;" class="btn green" @click="doChangePasswd()"> Change Password </a>
																									<a href="javascript:;" class="btn default"> Cancel </a>
																								</div>
																							</form>
																						</div>
																						<!-- END CHANGE PASSWORD TAB -->
																						<!-- PRIVACY SETTINGS TAB -->

																						<!-- END PRIVACY SETTINGS TAB -->
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<!-- END PROFILE CONTENT -->
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
<script type="text/javascript">
	
	$(document).ready(function(){

		var app=new Vue({
			el:'#app',
			data:{
				first_name:'<?=$first_name?>',
				last_name:'<?=$last_name?>',
				email:'<?=$email?>',

			}
		});
	})
</script>