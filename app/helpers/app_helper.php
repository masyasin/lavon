<?php

class LZW
{
    public static function compress($unc)
    {
        $i;
        $c;
        $wc;
        $w = "";
        $dictionary = array();
        $result = array();
        $dictSize = 256;
        for ($i = 0; $i < 256; $i += 1) {
            $dictionary[chr($i)] = $i;
        }
        for ($i = 0; $i < strlen($unc); $i++) {
            $c = $unc[$i];
            $wc = $w.$c;
            if (array_key_exists($w.$c, $dictionary)) {
                $w = $w.$c;
            } else {
                array_push($result, $dictionary[$w]);
                $dictionary[$wc] = $dictSize++;
                $w = (string)$c;
            }
        }
        if ($w !== "") {
            array_push($result, $dictionary[$w]);
        }
        return implode(",", $result);
    }
 
    public static function decompress($com)
    {
        $com = explode(",", $com);
        $i;
        $w;
        $k;
        $result;
        $dictionary = array();
        $entry = "";
        $dictSize = 256;
        for ($i = 0; $i < 256; $i++) {
            $dictionary[$i] = chr($i);
        }
        $w = chr($com[0]);
        $result = $w;
        for ($i = 1; $i < count($com); $i++) {
            $k = $com[$i];
            if ($dictionary[$k]) {
                $entry = $dictionary[$k];
            } else {
                if ($k === $dictSize) {
                    $entry = $w.$w[0];
                } else {
                    return null;
                }
            }
            $result .= $entry;
            $dictionary[$dictSize++] = $w . $entry[0];
            $w = $entry;
        }
        return $result;
    }
}
function array_if_not_exist(&$source, $key)
{
    if (!isset($source[$key])) {
        $source[$key]=array();
    }
}
function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array ( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
            
    $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
    $tanggal = date('Y-m-d', strtotime($tanggal));
    $split    = explode('-', $tanggal);
    $tgl_indo = preg_replace('/^0/', '', $split[2]) . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}
function time_ago($original, $date_orig = '')
{


    date_default_timezone_set('Asia/Jakarta');
    $chunks = array(
      array(60 * 60 * 24 * 365, 'tahun'),
      array(60 * 60 * 24 * 30, 'bulan'),
      array(60 * 60 * 24 * 7, 'minggu'),
      array(60 * 60 * 24, 'hari'),
      array(60 * 60, 'jam'),
      array(60, 'menit'),
    );
 
    $today = time();
    $since = $today - $original;
 
    if ($since > 604800) {
      // $print = date("M jS", $original);
        if ($since > 31536000) {
            $print = date("Y-m-d", $original);
            return tanggal_indo($print, true);
        }
    }
 
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
 
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }
 
    $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
    return $print . ' yang lalu';
}

/**
 * Get Youtube video ID from URL
 *
 * @param string $url
 * @return mixed Youtube video ID or FALSE if not found
 */
function getYoutubeIdFromUrl($url)
{
    $parts = parse_url($url);
    if (isset($parts['query'])) {
        parse_str($parts['query'], $qs);
        if (isset($qs['v'])) {
            return $qs['v'];
        } elseif (isset($qs['vi'])) {
            return $qs['vi'];
        }
    }
    if (isset($parts['path'])) {
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
// --------------------------------------------------------------------

/**
 * Magic Get function to get data
 *
 * @access  public
 * @param     string
 * @return  mixed
 */
/**
 * Modifies a string to remove all non ASCII characters and spaces.
 */
function slugify($text, $rplc = '-')
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', $rplc, $text);
 
    // trim
    $text = trim($text, $rplc);
 
    // transliterate
    if (function_exists('iconv')) {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }
 
    // lowercase
    $text = strtolower($text);
 
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
 
    if (empty($text)) {
        return 'n-a';
    }
 
    return $text;
}

function underscorize($str)
{
    return slugify($str, '_') ;
}
function p($a)
{
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}
function v($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

// clean table header
function clean_header($array)
{
    $CI = get_instance();
    $CI->load->helper('inflector');
    foreach ($array as $a) {
        $arr[] = humanize($a);
    }
    return $arr;
}

function ci_config_item($key)
{
    $ci =& get_instance();
    return $ci->config->item($key);
}

function frozen_loading_tag($class, $width = 318, $height = 73, $border = false, $border_color = '#666666')
{
    return '<div class="frozen-loading ' .($class?"frz_${class}":'').'" style="z-index:100000;'.($border?"border:solid 1px ${border_color};":'').'width:'.$width.'px;height:'.$height.'px;position:absolute;background: transparent url('.theme_url().'images/Windows8_loader.gif) no-repeat center center"></div>';
}

function theme_url($inside = '')
{

    return  site_url() . basename(APPPATH) .'/themes/'.ci_config_item('site_theme').'/'.$inside;
}
function theme_path($inside = '')
{

    return  APPPATH .'themes/'.ci_config_item('site_theme').'/'.$inside;
}
function module_path($inside)
{
    return APPPATH . "modules/$inside/";
}
function get_img_tag($htmlContent)
{
    $dom = new DOMDocument();
    $dom->loadHTML($htmlContent);
    $xml = simplexml_import_dom($dom);
    $images = $xml -> xpath('//img/@src');
    
    $src = theme_url(). 'img/Image_not_available_LG.jpg';
    
    if (count($images)) {
        $src = (string)$images[0];
    }
    return $src;
}

function captionize($label, $remove_suffix = "_id")
{
    $label = strtolower($label);
    $label = preg_replace('/(.*)(_id)$/', '\1', $label);
    $label = ucwords(str_replace('_', ' ', $label));
    return $label;
}
function captionizelist($spar, $str, $uppercase = false)
{
    $output = array();
    $input  = explode($spar, $str);
    foreach ($input as $s) {
        $output[]=captionize($s);
    }
    return implode(', ', $output);
}
function array_default_keyval(&$array, $key, $value)
{
    if (!isset($array[$key]) || empty($array[$key])) {
        $array[$key] = $value;
    }
}
function my_simple_crypt($string, $action = 'e')
{
    // you may change these values to your own
    $secret_key = 'sun-gho-khong';
    $secret_iv = 'thong-sam-chong';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
 
    if ($action == 'e') {
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } elseif ($action == 'd') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
 
    return $output;
}

function html2text($html)
{
    $html = new \Html2Text\Html2Text($html);
    return $html->getText();
}

function html2textA($arr, $keys = array())
{
    $output = array();

    foreach ($arr as $item) {
        foreach ($keys as $k) {
            $item[$k] = html2text($item[$k]);
        }
        $output[] = $item;
    }

    return $output;
}

function validation_errors_array($prefix = '', $suffix = '')
{
    if (false === ($OBJ = & _get_validation_object())) {
        return '';
    }

    return $OBJ->error_array($prefix, $suffix);
}

function add_cached_header()
{
    error_reporting(0);
    $headers = apache_request_headers();
    //print_r($headers);
    $timestamp = time();
    $tsstring = gmdate('D, d M Y H:i:s ', $timestamp) . 'GMT';
    $etag = md5($timestamp);
    header("Last-Modified: $tsstring");
    header("ETag: \"{$etag}\"");
    header('Expires: Thu, 01-Jan-70 00:00:01 GMT');

    if (isset($headers['If-Modified-Since'])) {
            //echo 'set modified header';
        if (intval(time()) - intval(strtotime($headers['IF-MODIFIED-SINCE'])) < 300) {
            header('HTTP/1.1 304 Not Modified');
            exit();
        }
    }
    flush();
}
function combine_assets($files, $ext = '', $import = false)
{
    if ($ext == 'css' && $import) {
        $buffer = "";

        foreach ($files as $file) {
            $buffer .= "@import url('".site_url($file)."');\n";
        }

        return $buffer;
    }
    $buffer = '';
    $no =1;
    foreach ($files as $file) {
        if (file_exists($file)) {
            //$buffer .= ($no != 1 ? "\n\n":"")."/**file_".($no++)."******".$file."****/\n\n";
            $buffer .= "\n\n".file_get_contents($file);
        }
    }
    return $buffer;
}

function bkpp_m($method, $a = '3', $b = '', $c = '')
{
//    $ci =& get_instance();
//    $ci->load->model('homepage/bkpp_m');
//    return $ci->bkpp_m->${method}($a,$b,$c);
}
function ci_template($method, $a = '', $b = '', $c = '')
{
    $ci =& get_instance();
    return $ci->template->${$method}($a, $b, $c);
}
function get_share_count($url)
{
//    $ci   =& get_instance();
//    $url  = str_replace(base_url(), '', $url);
//    $hash = md5($url);
//
//    $rs = $ci->db->select("SUM(cx) total")->where('hash',$hash)->get('shares');
//
//    if($rs->num_rows() > 0){
//        return $rs->row()->total + 0;
//    }

    return '0';
}

function is_localserver()
{
    $whitelist = array('127.0.0.1', "::1");
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

function thumb_image($source, $destination, $width, $height)
{
    
    $imagine   = new Imagine\Gd\Imagine();
    $size      = new Imagine\Image\Box($width, $height);
    $mode      = Imagine\Image\ImageInterface::FILTER_UNDEFINED;
    $resizeimg = $imagine->open($source)
                    ->resize($size, $mode);
    $sizeR     = $resizeimg->getSize();
    $widthR    = $sizeR->getWidth();
    $heightR   = $sizeR->getHeight();

    $preserve  = $imagine->create($size);
    $startX = $startY = 0;
    if ($widthR < $width) {
        $startX = ( $width - $widthR ) / 2;
    }
    if ($heightR < $height) {
        $startY = ( $height - $heightR ) / 2;
    }
    $preserve->paste($resizeimg, new Imagine\Image\Point($startX, $startY))
        ->save($destination);
}

function share_counter_text()
{
//    $sc = get_share_count(current_url());
//    $sc_txt = $sc > 0 ? 'Dibagikan ' . $sc .' kali.' : 'Bagikan halaman ini.';
//
//    return $sc_txt;
}

function gc_theme_script_tag($path)
{
    return '<script type="text/javascript" src="'.base_url('public/assets/gc/themes/'.$path).'"></script>';
}

function gc_column_format($row, $field)
{
    $date_column = ci_config_item('date_column');

    if (preg_match('/\//', $row->$field)) {
        return $row->$field;
    }

    if (in_array($field, $date_column)) {
        return date('m/d/Y', strtotime($row->$field));
    }
    return $row->$field;
}
function gc_value_format($value, $field)
{
    $date_column = ci_config_item('date_column');
    if (preg_match('/\//', $value)) {
        print_r($field);
    }
    if (in_array($field, $date_column)) {
        return date('m/d/Y', strtotime($value));
    }
    return $value;
}

function my_simple_log($str)
{
    $log_file = APPPATH . 'logs/my_simple_log.php';
    $h = fopen($log_file, 'a');

    $buffer = "---- START SQL QUERY AT ".date('m-d-Y H:i:s')."----\n" . $str . "\n";
    fwrite($h, $buffer);
    fclose($h);
}

function create_pagination($uri, $total_rows, $limit = null, $uri_segment = 4, $full_tag_wrap = true, $end_qs = '')
{
        $ci = & get_instance();
        $ci->load->library('pagination');

        $current_page = $ci->uri->segment($uri_segment, 0);

    if (empty($current_page)) {
        $current_page = $ci->input->get('per_page');
    }



        // Initialize pagination
        $config['suffix'] = $ci->config->item('url_suffix');
        $config['base_url'] = $config['suffix'] !== false ? rtrim(site_url($uri), $config['suffix']) : site_url($uri);
        // Count all records
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit === null ? 10 : $limit;
        $config['uri_segment'] = $uri_segment;
        $config['page_query_string'] = true;

        $config['num_links'] = 8;

        $config['full_tag_open'] = '<div class="parent-pagination"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';

        $config['first_link'] = '&lt;&lt;';
        $config['first_tag_open'] = '<li class="first">';
        $config['first_tag_close'] = '</li>';

        $config['prev_link'] = '<b class="fa fa-angle-left"></b>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['next_link'] = '<b class="fa fa-angle-right"></b>';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';

        $config['last_link'] = '&gt;&gt;';
        $config['last_tag_open'] = '<li class="last">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $ci->pagination->initialize($config);

        return array(
            'current_page' => $current_page,
            'per_page' => $config['per_page'],
            'limit' => $config['per_page'],
            'offset' =>$current_page,
            'links' => $ci->pagination->create_links($full_tag_wrap)
        );
}


function date_format_id($mysql_date)
{
    return date('d/m/Y', strtotime($mysql_date));
}

function date_format_mysql($id_date)
{
    $str = explode('/', $id_date);
    $Y   = $str[2];
    $m   = $str[1];
    $d   = $str[0];
    return date('Y-m-d', strtotime("$Y-$m-$d"));
}
function array_kv($arr, $key)
{
    $tmp=[];
    foreach ($arr as $r) {
        $kkey= $r[$key];
        unset($r[$key]);
        $tmp[$kkey]=$r;
    }

    return $tmp;
}
