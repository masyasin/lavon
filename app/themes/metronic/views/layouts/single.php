<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html  lang="{{ language:language_alias }}">
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
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ theme_assets }}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ theme_assets }}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ theme_assets }}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ theme_assets }}/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ theme_assets }}/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ theme_assets }}/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ theme_assets }}/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ theme_assets }}/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ theme_assets }}/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
      
      
    </head>
    <!-- END HEAD -->

    
<?php echo $template['body'];?>
</html>