<footer class="site-footer">
    <div class="site-footer-legal">© 2016 <a href="http://www.sintechabadi.com">BKPP</a></div>
    <div class="site-footer-right">
      Crafted with <i class="red-600 wb wb-heart"></i> by <a href="http://www.sintechabadi.com">PT Sintech Berkah Abadi</a>
    </div>
  </footer>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$( document ).ajaxComplete(function(a,b,c) {
		  if( b.responseText.match(/CREDENTIAL_REQUIRED_FOR_ACCESS_TO_PRIVILEGED_PAGE/) ){
		  	document.location = '{{ base_url }}' + 'main/login';
		  }
		});
		
		$(document).delegate(".btn-publish","click",function(){
			var uri 		= $(this).data("uri");
			var id  		= $(this).data("id");
			var sub_title   = $(this).data("title");
			bootbox.dialog({
			message: 'Tanggal Publish : <div class="form-group">'+
                '<div class="input-group date" id="datetimepicker1">'+
                    '<input type="text" name="publish_date" id="publish_date" class="form-control" />'+
                    '<span class="input-group-addon">'+
                        '<span class="fa fa-calendar"></span>'+
                   '</span>'+
                '</div>'+
            '</div>',
			title: 'Publish? <br><small>'+sub_title+'</small>',
			buttons: {
				main: {
					label: 'Publish',
					className: 'btn-primary',
					callback(result) {
						$.post( uri, { publish: 1, id: id, publish_date:$("#publish_date").val()},function(data){
							if(data.success){
								bootbox.alert({
									message: data.msg,
									size: 'small',
									callback: function () {
										if($(document).find(".refresh-data").length > 0){
											$(".refresh-data").trigger("click");
										}else if($(document).find(".input-search-btn").length > 0){
											return reloadByFilter();
											
										}
									}
								});
							}else{
								bootbox.alert({
									message: data.msg,
									size: 'small'
								});
							}
						},"json");
					}
				}
			}
			});
			
			$('#datetimepicker1').datetimepicker({format:"dd-mm-yyyy hh:ii:ss"});
			
		});
		
		
		
		$(document).delegate(".btn-unpublish","click",function(){
			var uri = $(this).data("uri");
			var id  = $(this).data("id");
			var sub_title   = $(this).data("title");
			bootbox.confirm({
					title: "Unpublish? <br><small>"+sub_title+"</small>",
					message: "Apakah anda yakin mem-Unpublish data ini?.",
					buttons: {
						cancel: {
							label: '<i class="fa fa-times"></i> Cancel'
						},
						confirm: {
							label: '<i class="fa fa-check"></i> Confirm'
						}
					},
					callback: function (result) {
						if(result){
						$.post( uri, { publish: 0, id: id},function(data){
							if(data.success){
								bootbox.alert({
									message: data.msg,
									size: 'small',
									callback: function () {
										if($(document).find(".refresh-data").length > 0){
											$(".refresh-data").trigger("click");
										}else if($(document).find(".input-search-btn").length > 0){
											return reloadByFilter();
										}
									}
								});
							}else{
								bootbox.alert({
									message: data.msg,
									size: 'small'
								});
							}
						},"json");
						}
					}
				});
		});
		
		
  	});
	
  </script>

  <style type="text/css">
  	td.actions{
  		min-width: 200px;
  	}
  	th.no{
  		min-width: 20px;
  	}
  	.page-header{
  		background: transparent url('{{ base_url }}public/assets/themes/images/kantor-walikota-lg.jpg') no-repeat 0 40%;
  	}

  	.readonly_label {
	    padding: 7px 0;
	    text-decoration: underline;
	}

	div#report-error {
	    color: red;
	    /*border: solid 1px red;*/
	    padding: .5em;
	    text-align: center;
	    font-style: italic;
	}
  </style>