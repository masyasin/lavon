<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 *  Menu admin sebelah kiri
 */
if (!function_exists('admin_left_menu')) {

    function admin_left_menu($prn = 0, $typeMenu = 'menu_section', $showHome = false)
    {
        $CI = &get_instance();
        $CI->load->model('MenuForm');

        $leftNavHtml = '';
        if ($prn) {
            $dataRows = $CI->MenuForm->getAdminLeftMenu($prn);
            if ($dataRows) {
                $params = array('typeMenu' => $typeMenu, 'showHome' => $showHome, 'dataRows' => $dataRows);
                $leftNavHtml .= $CI->load->view('helper/admin_left_menu', $params, true);
            }
        } else {
            //$leftNavHtml = '<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">';
            foreach ($CI->MenuForm->getAdminLeftMenu($prn) as $key => $value) {
                $params = array('typeMenu' => $typeMenu, 'showHome' => (!$key ? true : $showHome), 'dataRow' => $value);
                $leftNavHtml .= $CI->load->view('helper/admin_left_menu', $params, true);
            }
            //$leftNavHtml .= '</div>';
        }
        return $leftNavHtml;
    }

}

/*
 * Untuk menu tambahan dibawah atau diatas seperti add new
 */

if (!function_exists('get_module_by_menu')) {

    function get_module_by_menu($menu_id = 0)
    {
        if (!$menu_id) {
            return '';
        }
        $CI = &get_instance();
        $CI->load->model('MenuForm');
        return $CI->MenuForm->getRowByID($menu_id);
    }

}


/*
 * Untuk ambil upload meta files
 */

if (!function_exists('get_upload_meta')) {

    function get_upload_meta($upload_id = 0, $meta_key = '')
    {
        $CI = &get_instance();
        $CI->load->model('UploadForm');

        $meta_value = $CI->UploadForm->getMeta($upload_id, $meta_key);
        if (!$meta_value) {
            return '';
        }

        if ($meta_key) {
            if ($CI->form_validation->is_serialized($meta_value)) {
                return unserialize($meta_value);
            }
            return $meta_value;
        }
        
        $rows=array();
        foreach ($meta_value as $key => $value) {
            if ($CI->form_validation->is_serialized($value)) {
                $rows[$value['meta_key']] = unserialize($value['meta_value']);
            } else {
                $rows[$value['meta_key']] = trim($value['meta_value']);
            }
        }
        
        return $rows;
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('set_upload_meta')) {

    function set_upload_meta($post_id = 0, $meta_key = '', $meta_value = '')
    {
        $CI = &get_instance();
        $CI->load->model('UploadForm');
        if ($post_id) {
            $CI->UploadForm->db->where('post_id', $post_id);
            $CI->UploadForm->db->where('meta_key', $meta_key);
            $CI->UploadForm->db->delete($CI->UploadForm->tableUploadMeta);
            if ($meta_value) {
                if (is_array($meta_value)) {
                    $meta_value = serialize($meta_value);
                } else {
                    $meta_value = trim($meta_value);
                }
                $CI->UploadForm->db->insert($CI->PostForm->tableUploadMeta, array('post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value));
            }
        }
    }

}


/*
 * Untuk ambil content meta files
 */

if (!function_exists('get_post_meta')) {

    function get_post_meta($post_id = 0, $meta_key = '')
    {
        $CI = &get_instance();
        $CI->load->model('PostForm');

        $meta_value = $CI->PostForm->getMeta($post_id, $meta_key);
        if (!$meta_value) {
            return '';
        }
        
        if ($meta_key) {
            if ($CI->form_validation->is_serialized($meta_value)) {
                return unserialize($meta_value);
            }
            return $meta_value;
        }
        
        $rows=array();
        foreach ($meta_value as $key => $value) {
            if ($CI->form_validation->is_serialized($value)) {
                $rows[$value['meta_key']] = unserialize($value['meta_value']);
            } else {
                $rows[$value['meta_key']] = trim($value['meta_value']);
            }
        }
        
        return $rows;
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('set_post_meta')) {

    function set_post_meta($post_id = 0, $meta_key = '', $meta_value = '')
    {
        $CI = &get_instance();
        $CI->load->model('PostForm');
        if ($post_id) {
            $CI->PostForm->db->where('post_id', $post_id);
            $CI->PostForm->db->where('meta_key', $meta_key);
            $CI->PostForm->db->delete($CI->PostForm->tablePostMeta);
            if ($meta_value && $meta_value) {
                if (is_array($meta_value)) {
                    $meta_value = serialize($meta_value);
                } else {
                    $meta_value = trim($meta_value);
                }
                $CI->PostForm->db->insert($CI->PostForm->tablePostMeta, array('post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value));
            }
        }
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('delete_post_meta')) {

    function delete_post_meta($post_id = 0, $meta_key = '')
    {
        $CI = &get_instance();
        $CI->load->model('PostForm');
        if ($post_id && $meta_key) {
            $CI->PostForm->db->where('post_id', $post_id);
            $CI->PostForm->db->where('meta_key', $meta_key);
            $CI->PostForm->db->delete($CI->PostForm->tablePostMeta);
        }
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('get_post')) {

    function get_post($post_id = 0, $field = '')
    {
        $CI = &get_instance();
        $CI->load->model('PostForm');

        if (is_numeric($post_id)) {
            $row = $CI->PostForm->getRowByID($post_id);
        } else {
            $row = $CI->PostForm->getRowByName($post_id);
        }
       
        if (!$row) {
            return '';
        }
        
        if ($field) {
            if (is_array($field)) {
                $content = array();
                foreach ($field as $key => $value) {
                    if (isset($row[$value])) {
                        if ($row[$value]) {
                            $content[$value] = trim($row[$value]);
                        }
                    }
                }
                return $content;
            } elseif (isset($row[$field])) {
                return $row[$field];
            }
        }
        
        return $row;
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('get_upload')) {

    function get_upload($upload_id = 0, $field = '')
    {
        $CI = &get_instance();
        $CI->load->model('UploadForm');
        
        if (!$upload_id) {
            return '';
        }
        
        $row = $CI->UploadForm->getRowByID($upload_id);
        if (!$row) {
            return '';
        }
        
        if ($field) {
            if (is_array($field)) {
                $content = array();
                foreach ($field as $key => $value) {
                    if (isset($row[$value])) {
                        if ($row[$value]) {
                            $content[$value] = trim($row[$value]);
                        }
                    }
                }
                return $content;
            } elseif (isset($row[$field])) {
                return $row[$field];
            }
        }
        
        return $row;
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('set_option')) {

    function set_option($option_id = '', $option_value = '')
    {
        $CI = &get_instance();
        $CI->load->model('OptionForm');
        if ($option_id) {
            $CI->OptionForm->db->where('option_name', $option_id);
            $CI->OptionForm->db->delete($CI->OptionForm->tableName);
            if ($option_value && $option_value) {
                if (is_array($option_value)) {
                    $option_value = serialize($option_value);
                } else {
                    $option_value = trim($option_value);
                }
                $CI->OptionForm->db->insert($CI->OptionForm->tableName, array('option_name' => $option_id, 'option_value' => $option_value));
            }
        }
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('get_option')) {

    function get_option($option_id)
    {
        $CI = &get_instance();
        $CI->load->model('OptionForm');

        $row = $CI->OptionForm->getRowByOptionId($option_id);
        if ($row) {
            /* if ($CI->form_validation->is_serialized($row['option_value'])) {
                return unserialize($row['option_value']);
            } */
            return $row['option_value'];
        }
        
        return '';
    }

}


/*
 * Untuk ambil upload meta files
 */

if (!function_exists('get_media_url')) {

    function get_media_url()
    {
        $CI = &get_instance();
        return $CI->config->item('media_url');
    }

}


/*
 * create pretty permalink
 */
if (!function_exists('create_unique_slug')) {

    function create_unique_slug($string, $table, $field = 'slug', $key = null, $value = null)
    {
        $t = &get_instance();
        $slug = url_title($string, '-', true);
        $i = 0;
        $params = array();
        $params[$field] = $slug;

        if ($key) {
            $params["$key !="] = $value;
        }

        while ($t->db->where($params)->get($table)->num_rows()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug)) {
                $slug .= '-' . ++$i;
            } else {
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
            }

            $params [$field] = $slug;
        }
        return $slug;
    }

}

/*
 * Untuk ubah format tanggal
 */

if (!function_exists('get_date_format')) {
    function get_date_format($strdate, $src_format, $dest_format)
    {
        $date = date_create_from_format($src_format, $strdate);
        return $date->format($dest_format);
    }
}

/*
 * Untuk ubah format tanggal
 */

if (!function_exists('get_site_url')) {
    function get_site_url($url = '')
    {
        if (substr(strtolower(trim($url)), 0, 4)=='http' || substr(strtolower(trim($url)), 0, 4)=='https') {
            return $url;
        } else {
            return site_url($url);
        }
    }
}

/*
 *  Function untuk file location url
 */
if (!function_exists('get_media_file')) {
    function get_media_file($params, $getcover = false)
    {
        $CI = &get_instance();
        $CI->load->model('UploadForm');
        if (!$params) {
            return '';
        }
        
        if (is_array($params)) {
            if ($getcover) {
                if (isset($params['cover_id'])) {
                    return get_media_file($params['cover_id']);
                }
            } else {
                if (isset($params['full_path'])) {
                    if ($params['file_ext']!=='.youtube') {
                        return get_media_url().$params['full_path'];
                    } else {
                        return $params['full_path'];
                    }
                }
            }
        } else {
            $imgId = is_numeric($params) ? $params : 0;
            $params = $CI->UploadForm->getRowByID($imgId);
            if ($params) {
                if ($getcover) {
                    if (isset($params['cover_id'])) {
                        return get_media_file($params['cover_id']);
                    }
                } else {
                    if (isset($params['full_path'])) {
                        if ($params['file_ext']!=='.youtube') {
                            return get_media_url().$params['full_path'];
                        } else {
                            return $params['full_path'];
                        }
                    }
                }
            }
        }
        
        return '';
    }
}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('get_product_meta')) {

    function get_product_meta($product_id = 0, $meta_key = '')
    {
        $CI = &get_instance();
        $CI->load->model('ProductForm');

        $meta_value = $CI->ProductForm->getMeta($product_id, $meta_key);
        if (!$meta_value) {
            return '';
        }
        
        if ($meta_key) {
            if ($CI->form_validation->is_serialized($meta_value)) {
                return unserialize($meta_value);
            }
            return $meta_value;
        }
        
        $rows=array();
        foreach ($meta_value as $key => $value) {
            if ($CI->form_validation->is_serialized($value)) {
                $rows[$value['meta_key']] = unserialize($value['meta_value']);
            } else {
                $rows[$value['meta_key']] = trim($value['meta_value']);
            }
        }
        
        return $rows;
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('set_product_meta')) {

    function set_product_meta($product_id = 0, $meta_key = '', $meta_value = '')
    {
        $CI = &get_instance();
        $CI->load->model('ProductForm');
        if ($product_id) {
            $CI->ProductForm->db->where('product_id', $product_id);
            $CI->ProductForm->db->where('meta_key', $meta_key);
            $CI->ProductForm->db->delete($CI->ProductForm->tableProductMeta);
            if ($meta_value && $meta_value) {
                if (is_array($meta_value)) {
                    $meta_value = serialize($meta_value);
                } else {
                    $meta_value = trim($meta_value);
                }
                $CI->ProductForm->db->insert($CI->ProductForm->tableProductMeta, array('product_id' => $product_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value));
            }
        }
    }

}

/*
 * Untuk ambil content meta files
 */

if (!function_exists('delete_product_meta')) {

    function delete_product_meta($product_id = 0, $meta_key = '')
    {
        $CI = &get_instance();
        $CI->load->model('ProductForm');
        if ($product_id && $meta_key) {
            $CI->ProductForm->db->where('product_id', $product_id);
            $CI->ProductForm->db->where('meta_key', $meta_key);
            $CI->ProductForm->db->delete($CI->ProductForm->tableProductMeta);
        }
    }

}

/*
 * Untuk display di admin
 */
if (!function_exists('widgets_display')) {
    function widgets_display($post_type, $position, $params = array())
    {
        $CI = &get_instance();
        $widgets = $CI->config->item('widgets');
        foreach ($widgets[$post_type][$position] as $key => $value) {
            if (file_exists(APPPATH.'helpers/widgets/'.$value.'_helper.php')) {
                $CI->load->helper('widgets/'.$value);
                $methodName = $value;
                if (strrpos($value, '/')) {
                    $methodName = substr($value, strrpos($value, '/')+1);
                }
                if (function_exists($methodName)) {
                    call_user_func_array($methodName, array($post_type, (isset($params['post_id']) ? $params['post_id'] : 0), $params, str_replace('-', '_', $position).'_'.$key));
                }
            }
        }
    }
}

/*
 * Untuk validation di admin
 */
if (!function_exists('widgets_model_validate')) {
    function widgets_model_validate($post_type, $params = array())
    {
        $CI = &get_instance();
        $widgets = $CI->config->item('widgets');
        foreach ($widgets[$post_type]['left'] as $key => $value) {
            if (file_exists(APPPATH.'helpers/widgets/'.$value.'_helper.php')) {
                $CI->load->helper('widgets/'.$value);
                $methodName = $value.'_validate';
                if (strrpos($value, '/')) {
                    $methodName = substr($value, strrpos($value, '/')+1).'_validate';
                }
                if (function_exists($methodName)) {
                    call_user_func_array($methodName, array($post_type, (isset($params['post_id']) ? $params['post_id'] : 0), $params));
                }
            }
        }
        
        foreach ($widgets[$post_type]['right'] as $key => $value) {
            if (file_exists(APPPATH.'helpers/widgets/'.$value.'_helper.php')) {
                $CI->load->helper('widgets/'.$value);
                $methodName = $value.'_validate';
                if (strrpos($value, '/')) {
                    $methodName = substr($value, strrpos($value, '/')+1).'_validate';
                }
                if (function_exists($methodName)) {
                    call_user_func_array($methodName, array($post_type, (isset($params['post_id']) ? $params['post_id'] : 0), $params));
                }
            }
        }
    }
}


/*
 * Untuk execute di admin
 */
if (!function_exists('widgets_submit')) {
    function widgets_submit($post_type, $params = array())
    {
        $CI = &get_instance();
        $widgets = $CI->config->item('widgets');
        foreach ($widgets[$post_type]['left'] as $key => $value) {
            if (file_exists(APPPATH.'helpers/widgets/'.$value.'_helper.php')) {
                $CI->load->helper('widgets/'.$value);
                $methodName = $value.'_submit';
                if (strrpos($value, '/')) {
                    $methodName = substr($value, strrpos($value, '/')+1).'_submit';
                }
                if (function_exists($methodName)) {
                    call_user_func_array($methodName, array($post_type, (isset($params['post_id']) ? $params['post_id'] : 0), $params));
                }
            }
        }
        
        foreach ($widgets[$post_type]['right'] as $key => $value) {
            if (file_exists(APPPATH.'helpers/widgets/'.$value.'_helper.php')) {
                $CI->load->helper('widgets/'.$value);
                $methodName = $value.'_submit';
                if (strrpos($value, '/')) {
                    $methodName = substr($value, strrpos($value, '/')+1).'_submit';
                }
                if (function_exists($methodName)) {
                    call_user_func_array($methodName, array($post_type, (isset($params['post_id']) ? $params['post_id'] : 0), $params));
                }
            }
        }
    }
}


if (!function_exists('create_breadcrumb')) {
    function create_breadcrumb()
    {
          $ci = &get_instance();
          $i=1;
          $uri = $ci->uri->segment($i);
          $link = '<ol class="breadcrumb" style="padding:0px;">';
         
        while ($uri != '') {
            $prep_link = '';
            for ($j=1; $j<=$i; $j++) {
                $prep_link .= $ci->uri->segment($j).'/';
            }
          
            $link .='<li class="breadcrumb-item"><a href="'.site_url().'">Home&nbsp;</a></li>';
            $link .='<li class="breadcrumb-item">Admin&nbsp;</li>';
            if ($ci->uri->segment($i+1) == '') {
                $link.='<li class="breadcrumb-item active"><a href="'.site_url($prep_link).'">';
                $link.=ucwords(str_replace("_", " ", $ci->uri->segment($i))).'&nbsp;</a></li> ';
            } else {
                $link.='<li class="breadcrumb-item"><a href="'.site_url($prep_link).'">';
                $link.=$ci->uri->segment($i).'&nbsp;</a></li> ';
            }
         
            $i++;
            $uri = $ci->uri->segment($i);
        }
            $link .= '</ul>';
            return $link;
    }
}


if (!function_exists('get_title')) {
    function get_title()
    {
        $CI = &get_instance();
        $CI->load->model('MenuForm');
        $id = $CI->uri->uri_string();
        return $CI->db->select()->get_where("ap_menu", array('route' => $id))->row_array();
    }
}


if (!function_exists('get_identity')) {
    function get_identity($type = null)
    {
        $CI = &get_instance();
        if ($type=="pict") {
            return $CI->session->getPhoto();
        } elseif ($type=="name") {
            return $CI->session->identity->name;
        } else {
            return $CI->session->identity;
        }
    }
    
}


if (!function_exists('get_user_rules')) {
    function get_user_rules($string = false)
    {
        $CI = &get_instance();
        $CI->load->model('UserForm');
        $data = $CI->UserForm->getGroups($CI->session->getUserId());
        $rules = array();
        if ($string) {
            foreach ($data as $row) {
                $rules[] = $row["rule"];
            }
            return implode(',', $rules);
        } else {
            return $data;
        }
    }
}
