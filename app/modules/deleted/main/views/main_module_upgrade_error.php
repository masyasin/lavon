<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style type="text/css">
	#message::empty{
        display:none;
    }
</style>
<h4>Installation Failed</h4>
<div id="message" class="alert alert-danger"><?php
		echo '{{ language:Cannot upgrade }} "<em>'.$module_name.'</em>" ("'.$module_path.'") ';
	    echo anchor('main/module_management','{{ language:Back }}');
	    echo br();
	    echo $message;
	?></div>
