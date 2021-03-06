<!--[if lt IE 9]>
<script src="{{ theme_assets }}/global/plugins/respond.min.js"></script>
<script src="{{ theme_assets }}/global/plugins/excanvas.min.js"></script> 
<script src="{{ theme_assets }}/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        
        <script src="{{ theme_assets }}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ theme_assets }}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <script src="{{ theme_assets }}/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ theme_assets }}/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ theme_assets }}/pages/scripts/profile.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ theme_assets }}/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="{{ theme_assets }}/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>


        <style type="text/css">
.dataTables_wrapper .dataTables_paginate .paginate_button{
    display: inline-block;
    padding: 0 0 0 1px;
}            

.btn.refresh-data{
    display: none;
}
th.no{
    width: 10px;
    text-align: right;
}
th.actions{
    width: 105px;
    text-align: center;
}
td.actions{
    text-align: center;
}
        </style>