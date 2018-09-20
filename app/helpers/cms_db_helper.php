<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;
function cms_navigation_get_old_url($old_url_part = array()){
	$ci =& get_instance(); 
	$old_url = '';

	# DISABLE DB CHECK OLD URL
	/*
	while(count($old_url_part)>0){
                        
        $query = $this->db->select('url')
            ->from(cms_table_name('main_navigation'))
            ->like('url', implode('/', $old_url_part))
            ->get();

        if($query->num_rows()>0){
            $row = $query->row();
            $old_url = $row->url;
            break;
        }else{
            $new_old_url_part = array();
            for($i=0; $i<count($old_url_part)-1; $i++){
                $new_old_url_part[] = $old_url_part[$i];
            }
            $old_url_part = $new_old_url_part;
        }
    }
    */
    return $old_url;
}

function cms_navigation_get_navigations($user_id,$not_login,$login,$super_user,$where_is_root){
	$ci  =& get_instance(); 
	$query = "SELECT navigation_id, navigation_name, bootstrap_glyph, is_static, title, description, url, active,
                    (
                        (authorization_id = 1) OR
                        (authorization_id = 2 AND $not_login) OR
                        (authorization_id = 3 AND $login) OR
                        (
                            (authorization_id = 4 AND $login) AND
                            (
                                (SELECT COUNT(*) FROM ".cms_table_name('main_group_user')." AS gu WHERE gu.group_id=1 AND gu.user_id =" . addslashes($user_id) . ")>0
                                    OR $super_user OR
                                (SELECT COUNT(*) FROM ".cms_table_name('main_group_navigation')." AS gn
                                    WHERE
                                        gn.navigation_id=n.navigation_id AND
                                        gn.group_id IN
                                            (SELECT group_id FROM ".cms_table_name('main_group_user')." WHERE user_id = " . addslashes($user_id) . ")
                                )>0
                            )
                        )
                    ) AS allowed
                FROM ".cms_table_name('main_navigation')." AS n WHERE
                    $where_is_root ORDER BY n.".$ci->db->protect_identifiers('index');

    $cache_key = md5(crc32($query));
    // GET FROM CACHE
    $cache_path = APPPATH . "cache/query/" . $cache_key . '.yml';
    if(file_exists($cache_path)){
    	return  Yaml::parse(file_get_contents($cache_path));

    }

	$result = $ci->db->query($query)->result_array();
	file_put_contents($cache_path, Yaml::dump($result));
	return $result;
}
function cms_quicklinks_get_quicklinks($user_id,$not_login,$login,$super_user){
	$ci  =& get_instance(); 
	$query = "SELECT q.navigation_id, navigation_name, bootstrap_glyph, is_static, title, description, url, active
                        FROM
                            ".cms_table_name('main_navigation')." AS n,
                            ".cms_table_name('main_quicklink')." AS q
                        WHERE
                            (
                                q.navigation_id = n.navigation_id
                            )
                            AND
                            (
                                (authorization_id = 1) OR
                                (authorization_id = 2 AND $not_login) OR
                                (authorization_id = 3 AND $login) OR
                                (
                                    (authorization_id = 4 AND $login) AND
                                    (
                                        (SELECT COUNT(*) FROM ".cms_table_name('main_group_user')." AS gu WHERE gu.group_id=1 AND gu.user_id =" . addslashes($user_id) . ")>0
                                            OR $super_user OR
                                        (SELECT COUNT(*) FROM ".cms_table_name('main_group_navigation')." AS gn
                                            WHERE
                                                gn.navigation_id=n.navigation_id AND
                                                gn.group_id IN
                                                    (SELECT group_id FROM ".cms_table_name('main_group_user')." WHERE user_id = " . addslashes($user_id) . ")
                                        )>0
                                    )
                                )
                            ) ORDER BY q.".$this->db->protect_identifiers('index');

	$cache_key = md5(crc32($query));
    // GET FROM CACHE
    $cache_path = APPPATH . "cache/query/" . $cache_key . '.yml';
    if(file_exists($cache_path)){
    	return  Yaml::parse(file_get_contents($cache_path));

    }

	$result = $ci->db->query($query)->result_array();
	file_put_contents($cache_path, Yaml::dump($result));
	return $result;
}

function cms_widgets_get_widgets($login,$not_login,$user_id,$super_user,$slug_where,$widget_name_where){
	$ci  =& get_instance(); 
	$query = "SELECT
                    widget_id, widget_name, is_static, title,
                    description, url, slug, static_content
                FROM ".cms_table_name('main_widget')." AS w WHERE
                    (
                        (authorization_id = 1) OR
                        (authorization_id = 2 AND $not_login) OR
                        (authorization_id = 3 AND $login) OR
                        (
                            (authorization_id = 4 AND $login) AND
                            (
                                (SELECT COUNT(*) FROM ".cms_table_name('main_group_user')." AS gu WHERE gu.group_id=1 AND gu.user_id ='" . addslashes($user_id) . "')>0
                                    OR $super_user OR
                                (SELECT COUNT(*) FROM ".cms_table_name('main_group_widget')." AS gw
                                    WHERE
                                        gw.widget_id=w.widget_id AND
                                        gw.group_id IN
                                            (SELECT group_id FROM ".cms_table_name('main_group_user')." WHERE user_id = " . addslashes($user_id) . ")
                                )>0
                            )
                        )
                    ) AND $slug_where AND $widget_name_where ORDER BY ".$ci->db->protect_identifiers('index');

	$cache_key = md5(crc32($query));
    // GET FROM CACHE
    $cache_path = APPPATH . "cache/query/" . $cache_key . '.yml';
    if(file_exists($cache_path)){
    	return  Yaml::parse(file_get_contents($cache_path));

    }

	$result = $ci->db->query($query)->result_array();
	file_put_contents($cache_path, Yaml::dump($result));
	return $result;
 
}

function cms_get_module_name($module_path){
	$ci  =& get_instance(); 

	

	$query = "SELECT `module_name` FROM `main_module` WHERE `module_path` = '$module_path'";
 

	$cache_key = md5(crc32($query));
    // GET FROM CACHE
    $cache_path = APPPATH . "cache/query/" . $cache_key . '.yml';
    if(file_exists($cache_path)){
    	return  Yaml::parse(file_get_contents($cache_path));

    }
    $rs = $ci->db->select('module_name')
            ->from(cms_table_name('main_module'))
            ->where('module_path', $module_path)
            ->get();
	$result = $rs->row_array();
	file_put_contents($cache_path, Yaml::dump($result));
	return (object)$result;
}

function cms_get_module_path($module_path){
	$ci  =& get_instance(); 

	

	$query = "SELECT `module_name`, `module_path` FROM `main_module` WHERE `module_path` = '$module_path'";
 

	$cache_key = md5(crc32($query));
    // GET FROM CACHE
    $cache_path = APPPATH . "cache/query/" . $cache_key . '.yml';
    if(file_exists($cache_path)){
    	return  Yaml::parse(file_get_contents($cache_path));

    }
    $rs = $ci->db->select('module_name,module_path')
            ->from(cms_table_name('main_module'))
            ->where('module_path', $module_path)
            ->get();
	$result = $rs->row_array();
	file_put_contents($cache_path, Yaml::dump($result));
	return (object)$result;
}

