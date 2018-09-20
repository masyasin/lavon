<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('base_url')){
  function base_url(){
    require APPPATH . 'config/config.php';
    return $config['base_url'];
  }
}
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>404 | Website Resmi BKPP Tangerang Selatan</title>

  <link rel="apple-touch-icon" href="<?=base_url()?>public/assets/themes/center/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?=base_url()?>public/assets/themes/center/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/css/bootstrap.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/css/bootstrap-extend.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/center/assets/css/site.min3f0d.css?v2.2.0">

  <!-- Skin tools (demo site only) -->
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/css/skintools.min3f0d.css?v2.2.0">
  <script src="<?=base_url()?>public/assets/themes/center/assets/js/sections/skintools.min.js"></script>

  <!-- Plugins -->
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/vendor/animsition/animsition.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/vendor/switchery/switchery.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/vendor/intro-js/introjs.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0">

  <!-- Page -->
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/center/assets/examples/css/pages/errors.min3f0d.css?v2.2.0">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/fonts/web-icons/web-icons.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=base_url()?>public/assets/themes/global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


  <!--[if lt IE 9]>
    <script src="<?=base_url()?>public/assets/themes/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="<?=base_url()?>public/assets/themes/global/vendor/media-match/media.match.min.js"></script>
    <script src="<?=base_url()?>public/assets/themes/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="<?=base_url()?>public/assets/themes/global/vendor/modernizr/modernizr.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-error page-error-404 layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <header>
        <h1 class="animation-slide-top">404</h1>
        <p>Page Not Found !</p>
      </header>
      <p class="error-advise">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
      <a class="btn btn-primary btn-round" href="<?=base_url()?>">GO TO HOME PAGE</a>

      <footer class="page-copyright">
        <p>WEBSITE BY BKPP Kota Tangerang Selatan</p>
        <p>© 2017. All RIGHT RESERVED.</p>
        <div class="social">
          <a href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-dribbble" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="<?=base_url()?>public/assets/themes/global/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/animsition/animsition.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

  <!-- Plugins -->
  <script src="<?=base_url()?>public/assets/themes/global/vendor/switchery/switchery.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/intro-js/intro.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/screenfull/screenfull.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/vendor/slidepanel/jquery-slidePanel.min.js"></script>

  <!-- Scripts -->
  <script src="<?=base_url()?>public/assets/themes/global/js/core.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/center/assets/js/site.min.js"></script>

  <script src="<?=base_url()?>public/assets/themes/center/assets/js/sections/menu.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/center/assets/js/sections/menubar.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/center/assets/js/sections/sidebar.min.js"></script>

  <script src="<?=base_url()?>public/assets/themes/global/js/configs/config-colors.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/center/assets/js/configs/config-tour.min.js"></script>

  <script src="<?=base_url()?>public/assets/themes/global/js/components/asscrollable.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/js/components/animsition.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/js/components/slidepanel.min.js"></script>
  <script src="<?=base_url()?>public/assets/themes/global/js/components/switchery.min.js"></script>


  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  
</body>

 
</html>