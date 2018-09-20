<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ language:language_alias }}">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"> -->
    
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="900" />
    
    <?php echo $template['metadata'];?>
    <title><?php echo $template['title'];?></title>
    <script type="text/javascript">
      var sosmed = {fb : '{{ fb_id }}', twitter : '{{ twitter_id }}', ig : '{{ instagram_id }}', google : '{{ google_id }}', youtube : '{{ youtube_id }}', facebook_appid : '112771772125113'}; var hostname = '{{ hostname }}'; </script>
    <script type="text/javascript" src="{{ base_url }}www_static/js/app.js"></script>
    <link rel="apple-touch-icon" href="{{ site_favicon }}">
    <link rel="shortcut icon" href="{{ site_favicon }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ base_url }}www_static/assets/homepage.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="{{ base_url }}public/assets/themes/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ base_url }}public/assets/themes/global/vendor/media-match/media.match.min.js"></script>
    <script src="{{ base_url }}public/assets/themes/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script type="text/javascript" src="{{ base_url }}www_static/assets/homepage.js"></script>
    

<style type="text/javascript">
.share-this-horizontal a:hover .fa-rss,.share-this-vertical a:hover .fa-rss{background-color:#F9822A} 
.headline-news .carousel-indicators {width:160px}
.sidetabs figcaption { background-color: #ffffff; color: #4e5a62; font-size: 12px;} 
.sidetabs .other-cart li:before{display: none;}
.sidetabs .other-cart li a {padding: 5px 5px 5px 5px;} 
.sidetabs .other-cart li { height: 46px; line-height: normal;} 
.sidetabs figure { padding: 20px 0 20px; }
ul.topic-hashtags li.hardnews-hashtags p:before { font-family: FontAwesome;content: "\f111";font-size: 8px;color: #0098da;text-indent:2em;}
ul.topic-hashtags li.hardnews-hashtags p {text-indent:-10px;margin-left:10px;}
</style>

<style type="text/css">
.tl{
  text-align: left;
}
.white-bg{
  background: #fff !important;
}
ul.tl > li > a{

  color: #333 !important;
  text-align: left;
}
ul.tl > li:hover > a{
  color: #fff !important;
}
h2.tab-title{
  margin:0;
  padding: .25em;
  padding-left: .7em;
  background: #fff;
  color: #333;
}
.ucnt{
 height: 200px;
 background: #fff;
 overflow: auto;
}
.lsr{
  display: block;
}
 
</style>
  </head>
  <body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <?= $this->template->load_view('partials/homepage/nav.php')?>

<!-- Page -->
<?php echo $template['body'];?>
<!-- End Page -->
<!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
<!-- Footer -->
    <?= $this->template->load_view('partials/homepage/footer.php')?>

 
<script type="text/javascript" src="{{ base_url }}www_static/assets/homepage-bottom.js"></script>
<?= $this->template->load_view('partials/homepage/after-footer.php') ?>

<style type="text/css">
  .navbar-header{
    padding:0;
  }
</style>
</body>
</html>