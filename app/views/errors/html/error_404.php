<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('base_url')){
  function base_url(){
    require APPPATH . 'config/config.php';
    return $config['base_url'];
  }
}
require_once APPPATH . "config/cms_config.php";
require_once APPPATH.'themes/'.$config['site_theme'].'/views/errors/error_404.php';