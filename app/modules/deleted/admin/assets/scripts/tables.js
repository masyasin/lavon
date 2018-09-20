/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
	
	
    $('.chosen-filteractions').chosen({disable_search: true, width:'100%'});
    $('.chosen-sortactions').chosen({disable_search: true, width:'100%'});
    $('.chosen-bulkactions').chosen({disable_search: true, width:'100%'}).change(function(event){
        if($(this).val() != $('.chosen-bulkactions-bottom').chosen().val()) {
            $('.chosen-bulkactions-bottom').chosen().val($(this).val()).trigger("chosen:updated");
        }
    });
    
    $('.chosen-bulkactions-bottom').chosen({ disable_search: true, width:'100%'}).change(function(event){
        if($(this).val() != $('.chosen-bulkactions').chosen().val()) {
            $('.chosen-bulkactions').chosen().val($(this).val()).trigger("chosen:updated");
        }
    });
    
    $('.table th.column-sort').click(function () {
        var iconsort = $(this).find('.fa');
        if (iconsort.hasClass('fa-sort')) {
            iconsort.removeClass('fa-sort');
            iconsort.addClass('fa-sort-alpha-asc');
        } else if (iconsort.hasClass('fa-sort-alpha-asc')) {
            iconsort.removeClass('fa-sort-alpha-asc');
            iconsort.addClass('fa-sort-alpha-desc');
        } else if (iconsort.hasClass('fa-sort-alpha-desc')) {
            iconsort.removeClass('fa-sort-alpha-desc');
            iconsort.addClass('fa-sort');
        }
    });

    $('.btn-table-sort').click(function () {
        var allVars = $.getUrlVars();
        var columns = $('.table .column-sort');
        var sortVars = {};
        var filterVars = {};
        var sortItem, strParams;

        delete allVars.sort;
        if (columns.length >= 1) {
            columns.each(function (index) {
                sortItem = $(this).find('.fa');
                if (sortItem.hasClass('fa-sort-alpha-asc')) {
                    sortVars[$.trim(sortItem.attr('data-sort'))] = 'asc';
                } else if (sortItem.hasClass('fa-sort-alpha-desc')) {
                    sortVars[$.trim(sortItem.attr('data-sort'))] = 'desc';
                }
            });
            if(Object.keys(sortVars).length) {
                allVars['sort'] = $.toJSON(sortVars);
            }
        }
        
        if(allVars.filter!==undefined) {
            filterVars = decodeURIComponent(allVars.filter);
            allVars.filter = filterVars;
        }
        
        strParams = $.param(allVars);
        if(strParams) {
            window.document.location.href = $('meta[name="currenturl"]').attr('content') + '?' + strParams;
        } else {
            window.document.location.href = $('meta[name="currenturl"]').attr('content');
        }
    });
    
    $('.btn-table-search').click(function () {
        var strSearch = $.trim($('.txt-table-search').val());
        var allVars = $.getUrlVars();
        var sortVars = {};
        var filterVars = {};
        var strParams;
        
        delete allVars.search;
        if(strSearch) {
            allVars['search'] = strSearch;
        }
        
        if(allVars.sort!==undefined) {
            sortVars = decodeURIComponent(allVars.sort);
            allVars.sort = sortVars;
        }
        
        if(allVars.filter!==undefined) {
            filterVars = decodeURIComponent(allVars.filter);
            allVars.filter = filterVars;
        }
        
        strParams = $.param(allVars);
        if(strParams) {
            window.document.location.href = $('meta[name="currenturl"]').attr('content') + '?' + strParams;
        } else {
            window.document.location.href = $('meta[name="currenturl"]').attr('content');
        }
    });
    
    $(".bulk_action input[name='table_records']").on('ifChecked', function (event){
        var checked = $(this).parent().parent().find('input[type="checkbox"].checked-id');
        if(checked.length) {
            checked.attr( "checked", true );
        }         
    });
    
    $(".bulk_action input[name='table_records']").on('ifUnchecked', function (event) {
        var checked = $(this).parent().parent().find('input[type="checkbox"].checked-id');
        if(checked.length) {
            checked.attr( "checked", false );
        }
    });
    
    $('.btn-sort-media').click(function () {
        var allVars = $.getUrlVars();
        var field = $.trim($('select[name="sortfield"]').chosen().val());
        var direct = $.trim($('select[name="sortdirection"]').chosen().val());
        var sortVars = {};
        var filterVars = {};
        var strParams;
        
        delete allVars.sort;
        if(field) {
            sortVars[field] = direct;
            allVars['sort'] = $.toJSON(sortVars);
        }
        
        if(allVars.filter!==undefined) {
            filterVars = decodeURIComponent(allVars.filter);
            allVars.filter = filterVars;
        }
        
        strParams = $.param(allVars);
        if(strParams) {
            window.document.location.href = $('meta[name="currenturl"]').attr('content') + '?' + strParams;
        } else {
            window.document.location.href = $('meta[name="currenturl"]').attr('content');
        }
    });
    
    $('.btn-filter-media').click(function () {
        var allVars = $.getUrlVars();
        var filtertype = $.trim($('select[name="filtertype"]').chosen().val());
        var filterdate = $.trim($('select[name="filterdate"]').chosen().val());
        var sortVars = {};
        var filterVars = {};
        var strParams;
        
        delete allVars.filter;
        if (filtertype || filterdate) {
            if(filtertype) {
                filterVars['items'] = filtertype;
            }
            if(filterdate) {
                filterVars['period'] = filterdate;
            }
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
	
	
	// Table
	$('table input').on('ifChecked', function() {
		checkState = '';
		$(this).parent().parent().parent().addClass('selected');
		countChecked();
	});
	$('table input').on('ifUnchecked', function() {
		checkState = '';
		$(this).parent().parent().parent().removeClass('selected');
		countChecked();
	});
	var checkState = '';
	$('.bulk_action input').on('ifChecked', function() {
		checkState = '';
		$(this).parent().parent().parent().addClass('selected');
		countChecked();
	});
	$('.bulk_action input').on('ifUnchecked', function() {
		checkState = '';
		$(this).parent().parent().parent().removeClass('selected');
		countChecked();
	});
	$('.bulk_action input#check-all').on('ifChecked', function() {
		checkState = 'all';
		countChecked();
	});
	$('.bulk_action input#check-all').on('ifUnchecked', function() {
		checkState = 'none';
		countChecked();
	});
	function countChecked() {
		if (checkState === 'all') {
			$(".bulk_action input[name='table_records']").iCheck('check');
		}
		if (checkState === 'none') {
			$(".bulk_action input[name='table_records']").iCheck('uncheck');
		}
		var checkCount = $(".bulk_action input[name='table_records']:checked").length;
		if (checkCount) {
			$('.column-title').hide();
			$('.bulk-actions').show();
			$('.action-cnt').html(checkCount + ' Records Selected');
		} else {
			$('.column-title').show();
			$('.bulk-actions').hide();
		}
	}
    
});