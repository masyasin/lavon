<?php
 
require_once "cms_config.php";

$config['custom_keywords'] = array(
    'image_brand' => 'public/assets/themes/images/banner.png',
    'image_brand_alt' => 'Lavon',
    'hostname' => $_SERVER['HTTP_HOST'],


    'theme_assets' => '{{ base_url }}app/themes/' . $config['site_theme'] . '/assets',
    'site_favicon' => '{{ base_url }}app/themes/' . $config['site_theme'] . '/assets/img/favicon.ico',
    
);
