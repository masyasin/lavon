$(document).ready(function () {
    $('.choosen-select').chosen({width: "100%", disable_search: false});
	$(".select2").select2();
    $('.btn-table-filter').click(function () {
        var allVars = $.getUrlVars();
        var value = $.trim($('.chosen-filteractions').chosen().val());
        var sortVars = {};
        var filterVars = {};
        var strParams;
        
        delete allVars.filter;
        if (value) {
            filterVars['group'] = value;
            allVars['filter'] = $.toJSON(filterVars);
        }
        
        if(allVars.sort!==undefined) {
            sortVars = decodeURIComponent(allVars.sort);
            allVars.sort = sortVars;
        }
        
        strParams = $.param(allVars);
        if(strParams) {
            window.document.location.href = $('meta[name="currenturl"]').attr('content') + '?' + strParams;
        } else {
            window.document.location.href = $('meta[name="currenturl"]').attr('content');
        }
    });
});