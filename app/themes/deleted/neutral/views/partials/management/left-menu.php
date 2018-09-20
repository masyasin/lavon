<?php
$layout = new CMS_Layout();
?>

<?php if($typeMenu=='menu_section') :?>

    <?php 
        if(!$showHome) {
            echo '<li class="site-menu-item hidden-xs site-group-trigger"> <span class="site-menu-title"> --'.$dataRow['name'].'</span> </li>';
			
        }
        echo $layout->admin_menu($dataRow['id'], 'side-menu', $showHome);
    ?>

<?php else :?>

    <?php
    foreach ($dataRows as $key => $value) {
		$url = "#";
		if($value['route']!=""){
			$url = site_url($value['route']);
		}
		
        if($typeMenu=='side-menu') {
            if($showHome) {
                echo '<li class="site-menu-item hidden-xs site-group-trigger"><a href="'. base_url() .'admin/dashboard" class="waves-effect"><i class="fa fa-home"></i> <span class="hide-menu">Dashboard</span> </a></li>';
                $showHome = false;
            }
            
            $childMenu = $layout->admin_menu($value['id'], 'child_menu');
            if($childMenu) {
                echo '<li class="site-menu-item has-sub">'
                        . '<a '. (!$value['route'] ? '' : 'href="javascript:void(0)" class ="waves-effect" target="'. $value['route_target'] .'"') .' >'
                            . '<i class="site-menu-icon '.$value['icon'].'" aria-hidden="true"></i> <span class="site-menu-title">'.$value['name'].'</span><span class="site-menu-arrow"></span>'
                        . '</a>'
                        . '<ul class="site-menu-sub" aria-expanded="true">'.$childMenu.'</ul>'
                    . '</li>';
            } else {
                echo '<li class="site-menu-item hidden-xs site-group-trigger">'
                        . '<a '. (!$value['route'] ? '' : 'href="'. $url .'" class ="waves-effect" target="'. $value['route_target'] .'"') .' >'
                            . '<i class="site-menu-icon '.$value['icon'].'" aria-hidden="true"></i> <span class="hide-menu"> '.$value['name'].' </span> '
                        . '</a>'
                    . '</li>';
            }
        } else {
            $getmodule = str_replace('-', '_', get_module_by_menu($value['id']));
            if($getmodule) {
                if(function_exists('before_left_menu_'.$getmodule['module'])) {
                    call_user_func_array('before_left_menu_'.$getmodule['module'], array($getmodule));
                }
            }
            
            $childMenu = $layout->admin_menu($value['id'], 'child_menu');
            if($childMenu) {
                echo '<li class="site-menu-item has-sub">'
                        . '<a '. (!$value['route'] ? '' : 'href="javascript:void(0)" class ="waves-effect" target="'. $value['route_target'] .'"') .' > <i class="site-menu-icon '.$value['icon'].'" aria-hidden="true"></i> <span class="site-menu-title">'.$value['name'].'</span><span class="site-menu-arrow"></span>'
                        . '</a>'
                        . '<ul class="site-menu-sub" aria-expanded="true">'.$childMenu.'</ul>'
                    . '</li>';
            } else {
                echo '<li class="site-menu-item hidden-xs site-group-trigger">'
                        . '<a '. (!$value['route'] ? '' : 'href="'. $url .'" class ="waves-effect" target="'. $value['route_target'] .'"') .' >'
                            . '<i class="site-menu-icon '.$value['icon'].'" aria-hidden="true"></i> <span class="hide-menu"> '.$value['name'].' </span>'
                        . '</a>'
                    . '</li>';
            }
            
            if($getmodule) {
                if(function_exists('after_left_menu_'.$getmodule['module'])) {
                    call_user_func_array('after_left_menu_'.$getmodule['module'], array($getmodule));
                }
            }
        }
        
    }?>
<?php endif; ?>

