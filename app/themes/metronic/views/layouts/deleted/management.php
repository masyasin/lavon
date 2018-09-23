<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ language:language_alias }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="currenturl" content="<?php echo current_url();?>">
    <?php echo $template['metadata'];?>
    <title><?php echo $template['title'];?></title>
    <script type="text/javascript" src="{{ base_url }}www_static/js/app.js"></script>
    <link rel="apple-touch-icon" href="{{ site_favicon }}">
    <link rel="shortcut icon" href="{{ site_favicon }}">
    <link rel="stylesheet" type="text/css" href="{{ base_url }}www_static/assets/management.css">
    <!--[if lt IE 9]>
    <script src="{{ base_url }}public/assets/themes/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ base_url }}public/assets/themes/global/vendor/media-match/media.match.min.js"></script>
    <script src="{{ base_url }}public/assets/themes/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ base_url }}www_static/assets/management-top.js"></script>
    <script> Breakpoints();</script>
  </head>
  <body class="menubar-push">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	
	<?php $layout = new CMS_Layout();?>
    <?= $this->template->load_view('partials/management/nav.php'); ?>
	
	<div class="site-menubar">
    <div class="site-menubar-header">
      <div class="cover overlay">
        <img class="cover-image" src="{{ base_url }}public/assets/themes/center/assets/examples/images/dashboard-header.jpg" alt="...">
        <div class="overlay-panel vertical-align overlay-background">
          <div class="vertical-align-middle">
            <a class="avatar avatar-lg" href="javascript:void(0)">
              <img src="<?=  'http://www.gravatar.com/avatar/'.md5($this->m_cms->cms_user_email()).'?s=32&r=pg&d=identicon'; ?>" alt="">
            </a>
            <div class="site-menubar-info">
              <h5 class="site-menubar-user"><?=  $this->m_cms->cms_user_real_name()?></h5>
              <p class="site-menubar-email"><?=  $this->m_cms->cms_user_email()?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-menubar-body">
      <div>
        <div>
			<ul class="site-menu">
			<?=$layout->admin_menu(); ?>
			</ul>
		</div>
      </div>
    </div>
  </div>
    <?php echo $template['body'];?>
	
    <?= $this->template->load_view('partials/management/footer.php'); ?>
    <script type="text/javascript" src="{{ base_url }}www_static/assets/management-bottom.js"></script>
  </body>
</html>
<!-- INLINE CSS -->
<style type="text/css">
.table a{
  text-decoration: none !important;
}
body{
  padding-top: 66px;
}
</style>