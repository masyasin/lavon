<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
} ?>
<style type="text/css">
    #message::empty{
        display:none;
    }
</style>
<h4>{{ language:Installation Failed }}</h4>
<div id="message" class="alert alert-danger"><?php
        echo '{{ language:Cannot activate }} "<em>'.$module_name.'</em>" ("'.$module_path.'") ';
        echo anchor('pengaturan/modul', '{{ language:Back }}');
        echo br();
        echo $message;
?></div>
