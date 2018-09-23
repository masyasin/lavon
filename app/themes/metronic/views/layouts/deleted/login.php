<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ language:language_alias }}">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
 <?php echo $template['metadata'];?>

  <title><?php echo $template['title'];?></title>

  <script type="text/javascript">var gbs=function(){return '<?php echo base_url()?>';};var tmu=function(){return '<?php echo base_url()?>public/assets/themes/center/';}</script>
  <link rel="apple-touch-icon" href="{{ site_favicon }}">
  <link rel="shortcut icon" href="{{ site_favicon }}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/css/bootstrap.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/css/bootstrap-extend.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes/center')?>/assets/css/site.min3f0d.css?v2.2.0">

  <!-- Skin tools (demo site only) -->
 
  <!-- Plugins -->
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/animsition/animsition.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/switchery/switchery.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/intro-js/introjs.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0">

  <!-- Page -->
  <link rel="stylesheet" href="<?=site_url('public/assets/themes/center')?>/assets/examples/css/pages/login.min3f0d.css?v2.2.0">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/fonts/web-icons/web-icons.min3f0d.css?v2.2.0">
  <link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


  <!--[if lt IE 9]>
    <script src="<?=site_url('public/assets/themes')?>/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="<?=site_url('public/assets/themes')?>/global/vendor/media-match/media.match.min.js"></script>
    <script src="<?=site_url('public/assets/themes')?>/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/modernizr/modernizr.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-login layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="brand">
        <img class="brand-img" src="<?=site_url('public/assets/themes')?>/images/navbar-brand.png" alt="Logo BKPP">
        <!-- <h2 class="brand-text">BKPP</h2> -->
      </div>
      <p>Login Admin BKPP Kota Tangerang Selatan</p>
      <form method="post" action="<?=site_url('main/login')?>">
        <!-- <div class="form-group">
          <label class="sr-only" for="inputName">Name</label>
          <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
        </div> -->
        <div class="form-group">
          <label class="sr-only" for="inputEmail">Username</label>
          <input type="text" class="form-control" id="inputEmail" name="identity" placeholder="Username">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password"
          placeholder="Password">
        </div>
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
            <input type="checkbox" id="inputCheckbox" name="remember">
            <label for="inputCheckbox">Ingat Saya</label>
          </div>
          <!-- <a class="pull-right" href="<?=site_url('main/forgot')?>">Lupa Password?</a> -->
        </div>
        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
      </form>
      <!-- <p>Still no account? Please go to <a href="<?=site_url('main/register')?>">Daftar</a></p> -->

      <footer class="page-copyright page-copyright-inverse">
        <p>WEBSITE BY Sintech Abadi</p>
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
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/jquery/jquery.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/animsition/animsition.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

  <!-- Plugins -->
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/switchery/switchery.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/intro-js/intro.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/screenfull/screenfull.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/slidepanel/jquery-slidePanel.min.js"></script>

  <!-- Plugins For This Page -->
  <script src="<?=site_url('public/assets/themes')?>/global/vendor/jquery-placeholder/jquery.placeholder.min.js"></script>

  <!-- Scripts -->
  <script src="<?=site_url('public/assets/themes')?>/global/js/core.min.js"></script>
  <script src="<?=site_url('public/assets/themes/center')?>/assets/js/site.min.js"></script>

  <script src="<?=site_url('public/assets/themes/center')?>/assets/js/sections/menu.min.js"></script>
  <script src="<?=site_url('public/assets/themes/center')?>/assets/js/sections/menubar.min.js"></script>
  <script src="<?=site_url('public/assets/themes/center')?>/assets/js/sections/sidebar.min.js"></script>

  <script src="<?=site_url('public/assets/themes')?>/global/js/configs/config-colors.min.js"></script>
  <script src="<?=site_url('public/assets/themes/center')?>/assets/js/configs/config-tour.min.js"></script>

  <script src="<?=site_url('public/assets/themes')?>/global/js/components/asscrollable.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/js/components/animsition.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/js/components/slidepanel.min.js"></script>
  <script src="<?=site_url('public/assets/themes')?>/global/js/components/switchery.min.js"></script>

  <script src="<?=site_url('public/assets/themes')?>/global/js/components/jquery-placeholder.min.js"></script>


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
  <script>
    
  </script>
</body>



</html>
<!-- CREDENTIAL_REQUIRED_FOR_ACCESS_TO_PRIVILEGED_PAGE -->