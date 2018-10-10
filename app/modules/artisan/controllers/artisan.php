<?php
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class Artisan extends MX_Controller
{
    public function __construct($value = '')
    {
        parent::__construct();
        // $this->load_database();

        error_reporting(E_ALL);
    }
    public function hello()
    {
        echo "Hello";
    }
    public function hello_world()
    {
        echo "Hello World";
    }
    public function console($cmd = '', $a = '', $b = '', $c = '', $d = '', $e = '')
    {
        $method = str_replace(':', '_', $cmd);

        if (method_exists($this, $method)) {
            return $this->{$method}($a, $b, $c, $d, $e);
        }

        echo ('Unexistent command '."$cmd\n");
    }

    public function encrypt_str($a = '', $b = '', $c = '')
    {
        echo my_simple_crypt($a, 'e') . "\n";
    }

    public function add_widget($name, $module, $method = '')
    {
        if (empty($name) || empty($module)|| empty($method)) {
            echo "HELP ./artisan add:widget <name> <module> <method>\n";
            exit();
        }
        echo "Adding widget $name ...\n";

        $widget = array(
            'widget_name' => $name,
            'title' => "Widget $name",
            'description' => "Widget $name",
            'url' => $module .(!empty($method)?'/':'') .$method,
            'authorization_id' => 1,
            'active' => 1,
            'is_static' => 0,
            'index' => 100,

        );

        $this->db->insert('main_widget', $widget);
    }
    public function add_module($name)
    {
        if (empty($name)) {
            echo "add:module <module_name>\n";
            exit;
        }

        #check module existent
        $module_exist = $this->db->where('module_name', $name)->select("COUNT(module_id) cx")->get('main_module')->row()->cx > 0;
        if ($module_exist) {
            echo "module named \"${name}\" already exists, please specify different name.\n";
            exit;
        }
        echo "CEREATE module files\n";
        $module_dir = APPPATH."modules/$name/";
        if (!is_dir($module_dir)) {
            echo "MKDIR $module_dir\n";
            mkdir($module_dir);
        }

        $ctrl_dir = $module_dir."/controllers/";
        if (!is_dir($ctrl_dir)) {
            echo "MKDIR $ctrl_dir\n";
            mkdir($ctrl_dir);
        }

        $view_dir = $module_dir."/views/";
        if (!is_dir($view_dir)) {
            echo "MKDIR $view_dir\n";
            mkdir($view_dir);
        }
        $model_dir = $module_dir."/models/";
        if (!is_dir($ctrl_dir)) {
            echo "MKDIR $model_dir\n";
            mkdir($model_dir);
        }

        $config_dir = $module_dir."/config/";
        if (!is_dir($config_dir)) {
            echo "MKDIR $config_dir\n";
            mkdir($config_dir);
        }
        $lib_dir = $module_dir."/libraries/";
        if (!is_dir($lib_dir)) {
            echo "MKDIR $lib_dir\n";
            mkdir($lib_dir);
        }
        $asset_dir = $module_dir."/assets/";
        if (!is_dir($asset_dir)) {
            echo "MKDIR $asset_dir\n";
            mkdir($asset_dir);
        }

        $ctrl_file = $ctrl_dir."${name}.php";

        $ctrl_file_content = "<?php \nclass ".ucfirst($name)." extends CMS_Controller{\n}";
        if (!file_exists($ctrl_file)) {
            echo "WRITE $ctrl_file\n";
            file_put_contents($ctrl_file, $ctrl_file_content);
        }

        $module = array(
            'module_name' => $name,
            'module_path' => $name,
            'version' => '1.0',
            'user_id' => '1'
        );

        echo "INSERT main_module\n";
        $this->db->insert('main_module', $module);

        $this->dump_module_config();
        $this->clear_cache();
    }
    public function clear_cache()
    {
        $twig_cache_dir  = APPPATH . 'cache/';
        $image_cache_dir = $this->config->item('image_cache_dir');
    }
    public function add_navigation($name, $path, $auth = "4")
    {
        if (empty($name) or empty($path)) {
            echo "add:navigation <navigation_name> <path>\n";
            exit;
        }
        #check module existent
        $nav_exist = $this->db->where('navigation_name', $name)->select("COUNT(navigation_id) cx")->get('main_navigation')->row()->cx > 0;
        if ($nav_exist) {
            echo "navigation named \"${name}\" already exists, please specify different name.\n";
            exit;
        }

        $last_index = $this->db->select("MAX(n.index) max_index")->get("main_navigation n")->row()->max_index + 1;

        $navigation = array(
            'navigation_name' => $name,
            'url' => $path,
            'is_static' => 0,
            'authorization_id'=> $auth,
            'index'=>$last_index,
            'default_theme' => 'metronic',
            'default_layout' => 'full',
            'page_keyword' => $name,
            'description' => ucfirst($name),
            'page_title' => ucfirst($name),
            'bootstrap_glyph' => 'glyphicon-home',
            'title'=>$name

        );

        echo "INSERT main_navigation\n";
        $this->db->insert('main_navigation', $navigation);

        $this->clear_cache();
    }

    public function dump_module_config()
    {
        $modules = $this->db->get('main_module')->result_array();
        $module_config = array();
        foreach ($modules as $module) {
            $module_config[$module['module_name']] = $module;
        }
        
        $dump = Yaml::dump($module_config);

        $config_path = APPPATH. 'config/main_module.yml';

        file_put_contents($config_path, $dump);
        echo "WRITE $config_path\n";
    }

    public function cache_clear()
    {
        $cache_path = APPPATH . 'cache/';
        $asset_cache = $cache_path . 'assets/';
        echo "CLEANING ${asset_cache}*\n";

        foreach (glob($asset_cache."*.{js,css,map}", GLOB_BRACE) as $filename) {
            echo "DEL $filename ". "\n";
            unlink($filename);
        }

        $cookies_cache = $cache_path . 'cookies/';
        echo "CLEANING ${cookies_cache}*\n";

        foreach (glob($cookies_cache."*.{txt}", GLOB_BRACE) as $filename) {
            echo "DEL $filename ". "\n";
            unlink($filename);
        }

        $query_cache = $cache_path . 'query/';
        echo "CLEANING ${query_cache}*\n";

        foreach (glob($query_cache."*.{yml}", GLOB_BRACE) as $filename) {
            echo "DEL $filename ". "\n";
            unlink($filename);
        }

        $thumbnail_cache = FCPATH . 'public/assets/caches/image_files/';
        echo "CLEANING ${thumbnail_cache}*\n";

        foreach (glob($thumbnail_cache."*") as $filename) {
            echo "DEL $filename ". "\n";
            unlink($filename);
        }
    }

    public function attach_navprivil($nav)
    {
//      if(empty($nav)){
//          echo "attach:navprivil <nav>\n";
//          exit;
//      }
//      $nav = $this->db->where('navigation_name',$nav)->get('main_navigation')->row();
//
//      if(empty($nav)){
//          echo "navigation name $name DOESNT EXISTS\n";
//          exit;
//      }
//      $navprivils = config_item('konsultan_group');
//
//      foreach($navprivils as $group_id){
//          $ck = $this->db->select("count(*) cx")
//                     ->from('main_goup_navigation gn')
//                     ->join('main_navigation mn','mn.group_id=gn.group_id')
//                     ->where('mn.navigation_name',$nav)
//                     ->where('gn.group_id',$group_id)
//                     ->get()
//                     ->row()
//                     ->cx > 0;
//
//      }
//
    }
    public function dump_menu_config($value = '')
    {
        $menus = [
        'dashboard'=>['title'=>'Dashboard','icon'=>'icon-home','items'=>[ 'dashboard/statistik'=> 'Statistik' ] ],
        'transaksi'=>['title'=>'Transaksi','icon'=>'icon-globe','items'=>[ 'transaksi/details-card-numbers'=> 'Member Details Cards',
                                                                       'transaksi/fasilitas' => 'Fasilitas Member Poin',
                                                                       'transaksi/redeempoin' => 'Redeem Poin',
                                                                       'transaksi/history' => 'History'
                                                                     ]
                 ],
        'manajemen'=>['title'=>'Manajemen','icon'=>'icon-puzzle','items'=>[ 'manajemen/cluster'=> 'Cluster',
                                                                        'manajemen/unit'=>'Unit',
                                                                        'manajemen/tenan'=>'Tenan',
                                                                        'manajemen/fasilitas'=>'Fasilitas',
                                                                        'manajemen/marcendaise'=>'Marcendaise',
                                                                        'manajemen/memberpoin'=>'Member Poin'
                                                                      ]
                 ],
        'laporan'=>['title'=>'Laporan','icon'=>'icon-bar-chart','items'=>[ 'laporan/unit-member-details'=> 'Unit &amp; Member Details',
                                                                        'laporan/tenan-fasilitas'=>'Tenan &amp; Fasilitas',
                                                                        'laporan/unit-member-poin'=>'Unit &amp; Member Poin',
                                                                        'laporan/marcendaise'=>'Marcendaise',
                                                                        'laporan/redeempoin'=>'Redeem Poin',
                                                                        'laporan/memberpoin'=>'Member Poin'
                                                                      ]
                 ],
        'pengaturan'=>['title'=>'Pengaturan','icon'=>'icon-wrench','items'=>[ 'pengaturan/grup'=> 'Grup',
                                                                        'pengaturan/pengguna'=>'Pengguna',
                                                                        'pengaturan/setting'=>'Setting',
                                                                        'pengaturan/modul'=>'Modul'
                                                                      ]
                 ],
        ];

        $dump = Yaml::dump($menus, 4, 4);

        $config_path = APPPATH. 'config/main_menu.yml';

        file_put_contents($config_path, $dump);
        echo "WRITE $config_path\n";
    }
    /* Lavon script start here */
    public function cp_assets()
    {
        $src_theme_dir = realpath(FCPATH.'../metronic/assets').'/';
        $dst_theme_dir = realpath(theme_path('assets')).'/';

        $file_to_proc = APPPATH.'views/theming/login.php';

        echo "SRC:". $src_theme_dir."\n";
        echo "DST:". $dst_theme_dir."\n";
        echo "FILE:". $file_to_proc."\n";

        $src_html = $this->load->view('theming/design', array(), 1);
        $src_html = str_replace('{{ theme_assets }}/', $src_theme_dir, $src_html);

        // $dom = pQuery::parseStr($src_html);
        // $script_tags = $dom->query('link');

        $unexistens = "global/plugins/typeahead/typeahead.css,global/plugins/typeahead/handlebars.min.js,global/plugins/typeahead/typeahead.bundle.min.js";
        
        $files = explode(",", $unexistens);
        foreach ($files as $file) {
            $file = trim($file);

            $src = $src_theme_dir . $file;
            $dst = $dst_theme_dir . $file;

            $dir = dirname($dst);
            if (!is_dir($dir)) {
                echo "MD $dir\n";
                mkdir($dir, 0777, true);
            }
            echo "CP $src --> $dst \n";
            copy($src, $dst);
        }
        /*$script_tags = $dom->query('script');
        foreach ($script_tags as $tag) {
            $src = $tag->attr('src'); //. "\n";
            if(preg_match('/^http/',$src)){
                continue;
            }
            $src=trim($src);
            $dst = str_replace($src_theme_dir,$dst_theme_dir,$src);
            // $file = basename($dst);
            $dir = dirname($dst);
            if(!is_dir($dir)){
                echo "MD $dir\n";
                mkdir($dir,0777,true);
            }
            echo "CP $src --> $dst \n";
            copy($src,$dst);
        }

        $script_tags = $dom->query('link');
        foreach ($script_tags as $tag) {
            $src = $tag->attr('href'); //. "\n";
            if(preg_match('/^http/',$src)){
                continue;
            }
            if($tag->attr('rel' != 'stylesheet')){
                continue;
            }
            $dst = str_replace($src_theme_dir,$dst_theme_dir,$src);
            // $file = basename($dst);
            $dir = dirname($dst);
            if(!is_dir($dir)){
                echo "MD $dir\n";
                mkdir($dir,0777,true);
            }
            echo "CP $src --> $dst \n";
            copy($src,$dst);
        }
        */
        // echo $src_html;
    }

    public function reset_passwd()
    {
        $this->db->where('user_name', 'admin')->update('main_user', ['password'=>md5('admin')]);
        echo "your admin password is now admin";
    }

    public function insert_routes()
    {
        /*
'manajemen/cluster'=> 'cluster/grid',
                'manajemen/unit'=>'unit/index',
                'manajemen/tenan'=>'tenan/grid',
                'manajemen/fasilitas'=>'fasilitas/grid',
                'manajemen/marcendaise'=>'marcendaise/grid',
                'manajemen/memberpoin'=>'memberpoin/grid',
        */
        $data = [
                'transaksi/details-card-numbers'=>'transaksi/details_card_numbers',
                'transaksi/details-card-numbers-save'=>'transaksi/details_card_numbers_save',
                'transaksi/details-card-numbers-fetch-unit-row-json'=>'transaksi/details_card_numbers_fetch_unit_row_json',

        ];

        $buffer = '<'.'?'."php";

        foreach ($data as $src => $dst) {
            $content="
\$route['$src']               = '$dst';
\$route['$src(:any)']         = '$dst/\$1';
\$route['$src(:any)/(:any)']  = '$dst/\$1/\$2';
\$route['$src(:any)/(:any)/(:any)']  = '$dst/\$1/\$2/\$3';
\$route['$src(:any)/(:any)/(:any)/(:any)']  = '$dst/\$1/\$2/\$3/\$4';
";
            $buffer.= $content;
        }

        file_put_contents(APPPATH.'config/new_routes.php', $buffer);
    }
}
