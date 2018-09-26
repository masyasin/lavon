<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ language:language_alias }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $template['title'];?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <?php echo $template['metadata'];?>
        <link rel="icon" href="{{ site_favicon }}">
         <!-- Le styles -->
        <?php
            $asset = new CMS_Asset();       
            // $asset->add_cms_css('bootstrap/css/bootstrap.min.css');
            // $asset->add_themes_css('bootstrap.min.css', '{{ used_theme }}', 'default');
            // $asset->add_themes_css('style.css', '{{ used_theme }}', 'default');
            echo $asset->compile_css();
        ?>
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="{{ site_favicon }}">
        {{ widget_name:section_custom_script }}

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <?= $this->template->load_view('partials/full/assets-top.php'); ?>
        
    
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-open-hide-logo page-container-bg-solid page-content-white page-sidebar-open">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <!-- full/page-header.php -->
            <?= $this->template->load_view('partials/full/page-header.php'); ?>

            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <!-- full/left-sidebar.php -->
                <?= $this->template->load_view('partials/full/left-sidebar.php'); ?>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN THEME PANEL -->
                        <!-- theme-panel -->
                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <!-- breadcrumb -->
                            <?= $this->template->load_view('partials/full/breadcrumb.php'); ?>
                            <div class="page-toolbar">
                            <?= $this->template->load_view('partials/full/page-toolbar.php'); ?>
                                
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        
                        <?= $template['body']; ?>

                     
                        
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

                <!-- BEGIN QUICK SIDEBAR -->
                <?= $this->template->load_view('partials/full/quick-sidebar.php'); ?>
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?= $this->template->load_view('partials/full/footer.php'); ?>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
            <? //$this->template->load_view('partials/full/quick-nav.php'); ?>
        
        <!-- END QUICK NAV -->
        <!-- script-buttom -->
            <?= $this->template->load_view('partials/full/script-bottom.php'); ?>

    </body>

</html>