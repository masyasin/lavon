<?php
class Pengaturan extends CMS_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }

    public function grup()
    {
        $this->cms_guard_page('pengaturan_grup');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('main_group'));
        $crud->set_subject($this->cms_lang('User Group'));

        $crud->required_fields('group_name');
        $crud->unique_fields('group_name');
        $crud->unset_read();

        $crud->columns('group_name', 'description');
        $crud->edit_fields('group_name', 'description', 'users', 'navigations', 'privileges');
        $crud->add_fields('group_name', 'description', 'users', 'navigations', 'privileges');
        $crud->display_as('group_name', $this->cms_lang('Group'))
            ->display_as('description', $this->cms_lang('Description'))
            ->display_as('users', $this->cms_lang('Users '))
            ->display_as('navigations', $this->cms_lang('Navigations'))
            ->display_as('privileges', $this->cms_lang('Privileges'));


        $crud->set_relation_n_n('users', cms_table_name('main_group_user'), cms_table_name('main_user'), 'group_id', 'user_id', 'user_name');
        $crud->set_relation_n_n('navigations', cms_table_name('main_group_navigation'), cms_table_name('main_navigation'), 'group_id', 'navigation_id', 'navigation_name');
        $crud->set_relation_n_n('privileges', cms_table_name('main_group_privilege'), cms_table_name('main_privilege'), 'group_id', 'privilege_id', 'privilege_name');
        $crud->callback_before_delete(array(
            $this,
            'before_delete_group'
        ));

        $crud->unset_texteditor('description');


        $crud->set_lang_string('delete_error_message', $this->cms_lang('You cannot delete admin group or group which is not empty, please empty the group first'));

        $crud->set_language($this->cms_language());
        $data = $crud->render();

        $view_config = array(
        'title' => ' Pengaturan Grup'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                   ->set_breadcrumb('Grup', '');
        $this->view('grup', $data, 'pengaturan_grup', $view_config);
    }
    public function pengguna()
    {
        $this->cms_guard_page('pengaturan_pengguna');
         $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('main_user'));
        $crud->set_subject($this->cms_lang('User'));

        $crud->required_fields('user_name', 'password');
        $crud->unique_fields('user_name');
        $crud->unset_read();

        $crud->columns('avatar', 'user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('avatar', 'user_name', 'email', 'real_name', 'active', 'groups');
        $crud->add_fields('avatar', 'user_name', 'email', 'password', 'real_name', 'active', 'groups');
        $crud->field_type('active', 'true_false');
        $crud->set_field_upload('avatar', 'public/assets/uploads/files/avatar');
        $crud->display_as('user_name', $this->cms_lang('User Name'))
            ->display_as('email', $this->cms_lang('Email'))
            ->display_as('real_name', $this->cms_lang('Real Name'))
            ->display_as('active', $this->cms_lang('Active'))
            ->display_as('groups', $this->cms_lang('Groups'));

        $crud->set_relation_n_n('groups', cms_table_name('main_group_user'), cms_table_name('main_group'), 'user_id', 'group_id', 'group_name');
        $crud->callback_before_insert(array(
            $this,
            'before_insert_user'
        ));
        $crud->callback_before_delete(array(
            $this,
            'before_delete_user'
        ));

        if ($crud->getState() == 'edit') {
            $state_info  = $crud->getStateInfo();
            $primary_key = $state_info->primary_key;
            if ($primary_key == $this->cms_user_id() || $primary_key == 1) {
                $crud->callback_edit_field('active', array(
                    $this,
                    'read_only_user_active'
                ));
            }
        }

        $crud->set_lang_string('delete_error_message', 'You cannot delete super admin user or your own account');

        $crud->set_language($this->cms_language());

        $data = $crud->render();

        $view_config = array(
        'title' => ' Pengaturan Pengguna'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                   ->set_breadcrumb('Pengguna', '');
        $this->view('pengguna', $data, 'pengaturan_pengguna', $view_config);
    }
    public function read_only_user_active($value, $row)
    {
        $input   = '<input name="active" value="' . $value . '" type="hidden" />';
        $caption = $value == 0 ? 'Inactive' : 'Active';
        return $input . $caption;
    }

    public function before_insert_user($post_array)
    {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }

    public function before_delete_user($primary_key, $post_array)
    {
        //The super admin user cannot be deleted, a user cannot delete his/her own account
        if (($primary_key == 1) || ($primary_key == $this->cms_user_id())) {
            return false;
        }
        return $post_array;
    }
    public function setting()
    {
        $this->cms_guard_page('pengaturan_setting');

        $crud = $this->new_crud();
        $crud->set_theme('datatables');
        $crud->unset_jquery();

        $crud->set_table(cms_table_name('main_config'));
        $crud->set_subject($this->cms_lang('Configuration'));
        
        $crud->unique_fields('config_name');
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_export();
        $crud->unset_print();

        $crud->columns('config_name', 'value');
        $crud->edit_fields('config_name', 'value', 'description');
        $crud->add_fields('config_name', 'value', 'description');

        $crud->display_as('config_name', $this->cms_lang('Kode'))
            ->display_as('value', $this->cms_lang('Konten'))
            ->display_as('description', $this->cms_lang('Keterangan'));

        $crud->unset_texteditor('description');
        $crud->unset_texteditor('value');

        $operation = $crud->getState();
        if ($operation == 'edit' || $operation == 'update' || $operation == 'update_validation') {
            $crud->field_type('config_name', 'readonly');
            $crud->field_type('description', 'readonly');
        } elseif ($operation == 'add' || $operation == 'insert' || $operation == 'insert_validation') {
            //$crud->set_rules('config_name', 'Configuration Key', 'required');
            $crud->required_fields('config_name');
        }

        $crud->callback_after_insert(array(
            $this,
            'after_insert_config'
        ));
        $crud->callback_after_update(array(
            $this,
            'after_update_config'
        ));
        $crud->callback_before_delete(array(
            $this,
            'before_delete_config'
        ));

        $crud->set_language($this->cms_language());

        $data = $crud->render();

        $view_config = array(
        'title' => ' Settings'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                   ->set_breadcrumb('Settings', '');
        $this->view('setting', $data, 'pengaturan_setting', $view_config);
    }
    public function after_insert_config($post_array, $primary_key)
    {
        // adjust configuration file entry
        cms_config($post_array['config_name'], $post_array['value']);
        return true;
    }

    public function after_update_config($post_array, $primary_key)
    {
        // adjust configuration file entry
        $query = $this->db->select('config_name')->from(cms_table_name('main_config'))->where('config_id', $primary_key)->get();
        if ($query->num_rows()>0) {
            $row = $query->row();
            $config_name = $row->config_name;
            cms_config($config_name, $post_array['value']);
        }
        return true;
    }

    public function before_delete_config($primary_key)
    {
        $query = $this->db->select('config_name')->from(cms_table_name('main_config'))->where('config_id', $primary_key)->get();
        if ($query->num_rows()>0) {
            $row = $query->row();
            $config_name = $row->config_name;
            // delete configuration file entry
            cms_config($config_name, '', true);
        }
        return true;
    }
    // -----------------------------------------------------------------------------------------
    public function modul()
    {
        $this->cms_guard_page('pengaturan_modul');
        
        $this->load->library('files');
        $data = [];
        if (isset($_FILES['userfile'])) {
            // upload new module
            $directory = basename($_FILES['userfile']['name'], '.zip');
            
            // subsite_auth
            $subsite_auth_file = APPPATH.'modules/'.$directory.'/subsite_auth.php';
            $backup_subsite_auth_file = APPPATH.'modules/'.$directory.'_subsite_auth.php';
            $subsite_backup = false;
            if (file_exists($subsite_auth_file)) {
                copy($subsite_auth_file, $backup_subsite_auth_file);
                $subsite_backup = true;
            }
            // config
            $config_dir = APPPATH.'modules/'.$directory.'/config';
            $backup_config_dir = APPPATH.'modules/'.$directory.'_config';
            $config_backup = false;
            if (file_exists($config_dir) && is_dir($config_dir)) {
                $this->files->recurse_copy($config_dir, $backup_config_dir);
                $config_backup = true;
            }
        }
        
        
        $data['upload'] = $this->files->upload(APPPATH.'modules/', 'userfile', 'upload');
        if ($data['upload']['success']) {
            if ($subsite_backup) {
                copy($backup_subsite_auth_file, $subsite_auth_file);
                unlink($backup_subsite_auth_file);
            }
            if ($config_backup) {
                $this->files->recurse_copy($backup_config_dir, $config_dir);
                $this->files->rrmdir($backup_config_dir);
            }
        }

        // show the view
        $modules = $this->cms_get_module_list();
        

        for ($i=0; $i<count($modules); $i++) {
            $module = $modules[$i];
            $module_path = $module['module_path'];
        }
        $data['modules'] = $modules;
        $data['upload_new_module_caption'] = $this->cms_lang('Upload New Module');
        $view_config = array(
        'title' => ' Pengaturan Modul'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                   ->set_breadcrumb('Modul', '');

        $this->view('modul', $data, 'pengaturan_modul', $view_config);
    }

    //-----------------------------------------------------------------------------------------------
    public function otoritas()
    {
        $this->cms_guard_page('pengaturan_otoritas');

        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('main_authorization'));
        $crud->set_subject('Otoritas');

        $crud->columns('authorization_id', 'authorization_name', 'description');
        $crud->display_as('authorization_id', 'Code')->display_as('authorization_name', 'Name')->display_as('description', 'Description');

        $crud->unset_texteditor('description');

        // $crud->set_subject('Authorization List');

        // $crud->unset_add();
        $crud->unset_delete();
        // $crud->unset_edit();
        $crud->required_fields('authorization_name');
        $crud->unique_fields('authorization_name');
        $crud->unset_read();

        $crud->set_language($this->cms_language());

        $output = $crud->render();

        $view_config = array(
        'title' => ' Pengaturan Otoritas',
        'layout'=>'full'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                   ->set_breadcrumb('Otoritas', '');

        $this->view('otoritas', $output, 'pengaturan_otoritas', $view_config);
    }
    // Hak Akses ===============================================================
    public function hak_akses()
    {
        $this->cms_guard_page('pengaturan_hak_akses');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('main_privilege'));
        $crud->set_subject($this->cms_lang('Hak Akses'));

        $crud->required_fields('privilege_name');
        $crud->unique_fields('privilege_name');
        $crud->unset_read();

        $crud->columns('privilege_name', 'title', 'description');
        $crud->edit_fields('privilege_name', 'title', 'description', 'authorization_id', 'groups');
        $crud->add_fields('privilege_name', 'title', 'description', 'authorization_id', 'groups');

        $crud->set_relation('authorization_id', cms_table_name('main_authorization'), 'authorization_name'); //, 'groups');

        $crud->set_relation_n_n('groups', cms_table_name('main_group_privilege'), cms_table_name('main_group'), 'privilege_id', 'group_id', 'group_name');

        $crud->display_as('authorization_id', 'Otoritas')
        ->display_as('groups', $this->cms_lang('Groups'))
        ->display_as('privilege_name', 'Kode')
        ->display_as('title', $this->cms_lang('Title'))
        ->display_as('description', $this->cms_lang('Description'));

        $crud->unset_texteditor('description');

        $crud->set_language($this->cms_language());

        $output = $crud->render();
        $view_config = array(
        'title' => ' Pengaturan Hak Akses',
        'layout'=>'full'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                   ->set_breadcrumb('Hak Akses', '');

        $this->view('hak_akses', $output, 'pengaturan_hak_akses', $view_config);
    }
    // NAVIGATION ==============================================================
    public function navigation($parent_id = null)
    {
        $this->cms_guard_page('pengaturan_akses_route');
        $crud = $this->new_crud();
        $crud->set_theme('datatables');

        $crud->unset_jquery();

        $crud->set_table(cms_table_name('main_navigation'));
        $crud->set_subject('Route');

        $crud->required_fields('navigation_name', 'title');
        $crud->unique_fields('navigation_name', 'title', 'path');
        $crud->unset_read();

        $crud->columns('navigation_name', 'url', 'authorization_id');
        $crud->edit_fields('navigation_name', 'parent_id', 'title', 'bootstrap_glyph', 'page_title', 'page_keyword', 'description', 'active', 'only_content', 'is_static', 'static_content', 'url', 'default_theme', 'default_layout', 'authorization_id', 'groups', 'index');
        $crud->add_fields('navigation_name', 'parent_id', 'title', 'bootstrap_glyph', 'page_title', 'page_keyword', 'description', 'active', 'only_content', 'is_static', 'static_content', 'url', 'default_theme', 'default_layout', 'authorization_id', 'groups', 'index');
        $crud->field_type('active', 'true_false');
        $crud->field_type('is_static', 'true_false');
        // get themes to give options for default_theme field
        $themes     = $this->cms_get_theme_list();
        $theme_path = array();
        foreach ($themes as $theme) {
            $theme_path[] = $theme['path'];
        }
        $crud->field_type('default_theme', 'enum', $theme_path);
        $crud->field_type('default_layout', 'enum', []);
        $crud->display_as('navigation_name', $this->cms_lang('Kode'))
        ->display_as('is_root', $this->cms_lang('Is Root'))
        ->display_as('navigation_child', 'Sub Menu')
        ->display_as('parent_id', $this->cms_lang('Parent'))
        ->display_as('title', 'Nama')
        ->display_as('page_title', $this->cms_lang('Page Title'))
        ->display_as('page_keyword', $this->cms_lang('Page Keyword (Comma Separated)'))
        ->display_as('description', $this->cms_lang('Description'))
        ->display_as('url', $this->cms_lang('path'))
        ->display_as('active', 'Enabled')
        ->display_as('is_static', $this->cms_lang('Static'))
        ->display_as('static_content', $this->cms_lang('Static Content'))
        ->display_as('authorization_id', $this->cms_lang('Otoritas'))
        ->display_as('groups', $this->cms_lang('Groups'))
        ->display_as('only_content', $this->cms_lang('Only show content'))
        ->display_as('default_theme', $this->cms_lang('Default Theme'))
        ->display_as('default_layout', $this->cms_lang('Default Layout'));

        $crud->order_by('index,parent_id ', 'asc');

        $crud->unset_texteditor('description');
        $crud->field_type('only_content', 'true_false');

        $crud->field_type('bootstrap_glyph', 'enum', array('glyphicon-adjust', 'glyphicon-align-center', 'glyphicon-align-justify', 'glyphicon-align-left', 'glyphicon-align-right', 'glyphicon-arrow-down', 'glyphicon-arrow-left', 'glyphicon-arrow-right', 'glyphicon-arrow-up', 'glyphicon-asterisk', 'glyphicon-backward', 'glyphicon-ban-circle', 'glyphicon-barcode', 'glyphicon-bell', 'glyphicon-bold', 'glyphicon-book', 'glyphicon-bookmark', 'glyphicon-briefcase', 'glyphicon-bullhorn', 'glyphicon-calendar', 'glyphicon-camera', 'glyphicon-certificate', 'glyphicon-check', 'glyphicon-chevron-down', 'glyphicon-chevron-left', 'glyphicon-chevron-right', 'glyphicon-chevron-up', 'glyphicon-circle-arrow-down', 'glyphicon-circle-arrow-left', 'glyphicon-circle-arrow-right', 'glyphicon-circle-arrow-up', 'glyphicon-cloud', 'glyphicon-cloud-download', 'glyphicon-cloud-upload', 'glyphicon-cog', 'glyphicon-collapse-down', 'glyphicon-collapse-up', 'glyphicon-comment', 'glyphicon-compressed', 'glyphicon-copyright-mark', 'glyphicon-credit-card', 'glyphicon-cutlery', 'glyphicon-dashboard', 'glyphicon-download', 'glyphicon-download-alt', 'glyphicon-earphone', 'glyphicon-edit', 'glyphicon-eject', 'glyphicon-envelope', 'glyphicon-euro', 'glyphicon-exclamation-sign', 'glyphicon-expand', 'glyphicon-export', 'glyphicon-eye-close', 'glyphicon-eye-open', 'glyphicon-facetime-video', 'glyphicon-fast-backward', 'glyphicon-fast-forward', 'glyphicon-file', 'glyphicon-film', 'glyphicon-filter', 'glyphicon-fire', 'glyphicon-flag', 'glyphicon-flash', 'glyphicon-floppy-disk', 'glyphicon-floppy-open', 'glyphicon-floppy-remove', 'glyphicon-floppy-save', 'glyphicon-floppy-saved', 'glyphicon-folder-close', 'glyphicon-folder-open', 'glyphicon-font', 'glyphicon-forward', 'glyphicon-fullscreen', 'glyphicon-gbp', 'glyphicon-gift', 'glyphicon-glass', 'glyphicon-globe', 'glyphicon-hand-down', 'glyphicon-hand-left', 'glyphicon-hand-right', 'glyphicon-hand-up', 'glyphicon-hd-video', 'glyphicon-hdd', 'glyphicon-header', 'glyphicon-headphones', 'glyphicon-heart', 'glyphicon-heart-empty', 'glyphicon-home', 'glyphicon-import', 'glyphicon-inbox', 'glyphicon-indent-left', 'glyphicon-indent-right', 'glyphicon-info-sign', 'glyphicon-italic', 'glyphicon-leaf', 'glyphicon-link', 'glyphicon-list', 'glyphicon-list-alt', 'glyphicon-lock', 'glyphicon-log-in', 'glyphicon-log-out', 'glyphicon-magnet', 'glyphicon-map-marker', 'glyphicon-minus', 'glyphicon-minus-sign', 'glyphicon-move', 'glyphicon-music', 'glyphicon-new-window', 'glyphicon-off', 'glyphicon-ok', 'glyphicon-ok-circle', 'glyphicon-ok-sign', 'glyphicon-open', 'glyphicon-paperclip', 'glyphicon-pause', 'glyphicon-pencil', 'glyphicon-phone', 'glyphicon-phone-alt', 'glyphicon-picture', 'glyphicon-plane', 'glyphicon-play', 'glyphicon-play-circle', 'glyphicon-plus', 'glyphicon-plus-sign', 'glyphicon-print', 'glyphicon-pushpin', 'glyphicon-qrcode', 'glyphicon-question-sign', 'glyphicon-random', 'glyphicon-record', 'glyphicon-refresh', 'glyphicon-registration-mark', 'glyphicon-remove', 'glyphicon-remove-circle', 'glyphicon-remove-sign', 'glyphicon-repeat', 'glyphicon-resize-full', 'glyphicon-resize-horizontal', 'glyphicon-resize-small', 'glyphicon-resize-vertical', 'glyphicon-retweet', 'glyphicon-road', 'glyphicon-save', 'glyphicon-saved', 'glyphicon-screenshot', 'glyphicon-sd-video', 'glyphicon-search', 'glyphicon-send', 'glyphicon-share', 'glyphicon-share-alt', 'glyphicon-shopping-cart', 'glyphicon-signal', 'glyphicon-sort', 'glyphicon-sort-by-alphabet', 'glyphicon-sort-by-alphabet-alt', 'glyphicon-sort-by-attributes', 'glyphicon-sort-by-attributes-alt', 'glyphicon-sort-by-order', 'glyphicon-sort-by-order-alt', 'glyphicon-sound-5-1', 'glyphicon-sound-6-1', 'glyphicon-sound-7-1', 'glyphicon-sound-dolby', 'glyphicon-sound-stereo', 'glyphicon-star', 'glyphicon-star-empty', 'glyphicon-stats', 'glyphicon-step-backward', 'glyphicon-step-forward', 'glyphicon-stop', 'glyphicon-subtitles', 'glyphicon-tag', 'glyphicon-tags', 'glyphicon-tasks', 'glyphicon-text-height', 'glyphicon-text-width', 'glyphicon-th', 'glyphicon-th-large', 'glyphicon-th-list', 'glyphicon-thumbs-down', 'glyphicon-thumbs-up', 'glyphicon-time', 'glyphicon-tint', 'glyphicon-tower', 'glyphicon-transfer', 'glyphicon-trash', 'glyphicon-tree-conifer', 'glyphicon-tree-deciduous', 'glyphicon-unchecked', 'glyphicon-upload', 'glyphicon-usd', 'glyphicon-user', 'glyphicon-volume-down', 'glyphicon-volume-off', 'glyphicon-volume-up', 'glyphicon-warning-sign', 'glyphicon-wrench', 'glyphicon-zoom-in', 'glyphicon-zoom-out'));
        $crud->field_type('index', 'hidden');

        $crud->set_relation('parent_id', cms_table_name('main_navigation'), 'navigation_name');
        $crud->set_relation('authorization_id', cms_table_name('main_authorization'), 'authorization_name');

        $crud->set_relation_n_n('groups', cms_table_name('main_group_navigation'), cms_table_name('main_group'), 'navigation_id', 'group_id', 'group_name');

        if (isset($parent_id) && intval($parent_id)>0) {
            $crud->where(cms_table_name('main_navigation').'.parent_id', $parent_id);
            $state = $crud->getState();
            if ($state == 'add') {
                $crud->field_type('parent_id', 'hidden', $parent_id);
            }
        } else {
            $crud->where(array(cms_table_name('main_navigation').'.parent_id' => null));
        }
        $crud->add_action(
            'Move Up',
            'wb-triangle-up',
            site_url($this->cms_module_path().'/action_navigation_move_up').'/'
        );
        $crud->add_action(
            'Move Down',
            'wb-triangle-down',
            site_url($this->cms_module_path().'/action_navigation_move_down').'/'
        );

        $crud->callback_column('active', array(
        $this,
        'column_navigation_active'
        ));

        $crud->callback_column('navigation_child', array(
        $this,
        'column_navigation_child'
        ));

        $crud->callback_before_insert(array(
        $this,
        'before_insert_navigation'
        ));
        $crud->callback_before_delete(array(
        $this,
        'before_delete_navigation'
        ));

        $crud->set_language($this->cms_language());
        $crud->set_view_file('list', APPPATH.'modules/'.$this->cms_module_path().'/views/gc/navigation/list.php');
        $output = $crud->render();

        $navigation_path = array();
        if (isset($parent_id) && intval($parent_id)>0) {
            $this->db->select('navigation_name')
            ->from(cms_table_name('main_navigation'))
            ->where('navigation_id', $parent_id);
            $query = $this->db->get();
            if ($query->num_rows()>0) {
                $row = $query->row();
                $navigation_name = $row->navigation_name;
                $navigation_path = $this->cms_get_navigation_path($navigation_name);
            }
        }
        $output->navigation_path = $navigation_path;
        $view_config = array(
        'title' => ' Pengaturan Route',
        'layout'=>'full'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                   ->set_breadcrumb('Route', '');

        $this->view('navigation', $output, 'pengaturan_akses_route', $view_config);
    }
    public function action_navigation_move_up($primary_key)
    {
        $query = $this->db->select('navigation_name, parent_id')
            ->from(cms_table_name('main_navigation'))
            ->where('navigation_id', $primary_key)
            ->get();
        $row = $query->row();
        $navigation_name = $row->navigation_name;
        $parent_id = $row->parent_id;

        // move up
        $this->cms_do_move_up_navigation($navigation_name);

        // redirect
        if (isset($parent_id)) {
            redirect('main/navigation/'.$parent_id.'#record_'.$primary_key);
        } else {
            redirect('main/navigation'.'#record_'.$primary_key);
        }
    }

    public function action_navigation_move_down($primary_key)
    {
        $query = $this->db->select('navigation_name, parent_id')
            ->from(cms_table_name('main_navigation'))
            ->where('navigation_id', $primary_key)
            ->get();
        $row = $query->row();
        $navigation_name = $row->navigation_name;
        $parent_id = $row->parent_id;

        // move down
        $this->cms_do_move_down_navigation($navigation_name);

        // redirect
        if (isset($parent_id)) {
            redirect('main/navigation/'.$parent_id.'#record_'.$primary_key);
        } else {
            redirect('main/navigation'.'#record_'.$primary_key);
        }
    }

    public function before_insert_navigation($post_array)
    {
        //get parent's navigation_id
        $query = $this->db->select('navigation_id')
            ->from(cms_table_name('main_navigation'))
            ->where('navigation_id', is_int($post_array['parent_id'])? $post_array['parent_id']: null)
            ->get();
        $row   = $query->row();

        $parent_id = isset($row->navigation_id) ? $row->navigation_id : null;

        //index = max index+1
        $query = $this->db->select_max('index')
            ->from(cms_table_name('main_navigation'))
            ->where('parent_id', $parent_id)
            ->get();
        $row   = $query->row();
        $index = $row->index;
        if (!isset($index)) {
            $index = 1;
        } else {
            $index = $index+1;
        }

        $post_array['index'] = $index;

        if (!isset($post_array['authorization_id']) || $post_array['authorization_id'] == '') {
            $post_array['authorization_id'] = 1;
        }

        return $post_array;
    }

    public function before_delete_navigation($primary_key)
    {
        $this->db->delete(cms_table_name('main_quicklink'), array(
            'navigation_id' => $primary_key
        ));
    }

    public function column_navigation_active($value, $row)
    {
        $target = site_url($this->cms_module_path() . '/toggle_navigation_active/' . $row->navigation_id);
        return  '<input target="'.$target.'" class="navigation_active" name="record_'.$row->navigation_id.'" type="checkbox" class="js-switch-small" data-plugin="switchery" data-size="small" '.($value?'checked=""':'').' data-switchery="'.($value?'true':'false').'" style="display: none;">';
        $html = '<a name="record_'.$row->navigation_id.'">&nbsp;</a>';
        
        if ($value == 0) {
            $html .= '<span target="' . $target . '" class="navigation_active">Inactive</span>';
        } else {
            $html .= '<span target="' . $target . '" class="navigation_active">Active</span>';
        }
        return $html;
    }

    public function column_navigation_child($value, $row)
    {
        $html = '';
        $this->db->select('navigation_id')
            ->from(cms_table_name('main_navigation'))
            ->where('parent_id', $row->navigation_id);
        $query = $this->db->get();
        $child_count = $query->num_rows();
        if ($child_count<=0) {
            $html .= '&nbsp; -';
        } else {
            $html .= '<a class="btn" href="'.site_url($this->cms_module_path().'/navigation/'.$row->navigation_id).'">'.
                $this->cms_lang('Manage Children')
                .'</a>';
        }
        $html .= '<a class="btn" href="'.site_url($this->cms_module_path().'/navigation/'.$row->navigation_id).'/add">'.
            ''
            .'<i class="icon wb-plus" aria-hidden="true"></i>'
            .'</a>';
        return $html;
    }

    public function toggle_navigation_active($navigation_id)
    {
        if ($this->input->is_ajax_request()) {
            $this->db->select('active')->from(cms_table_name('main_navigation'))->where('navigation_id', $navigation_id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row       = $query->row();
                $new_value = ($row->active == 0) ? 1 : 0;
                $this->db->update(cms_table_name('main_navigation'), array(
                    'active' => $new_value
                ), array(
                    'navigation_id' => $navigation_id
                ));
                $this->cms_show_json(array(
                    'success' => true
                ));
            } else {
                $this->cms_show_json(array(
                    'success' => false
                ));
            }
        }
    }
    public function get_layout($theme = '')
    {
        if ($this->input->is_ajax_request()) {
            if ($theme == '') {
                $theme = $this->cms_get_config('site_theme');
            }
            $layout_list = array('');
            $this->load->helper('directory');
            $files = directory_map(APPPATH.'themes/'.$theme.'/views/layouts/', 1);
            sort($files);
            foreach ($files as $file) {
                if (is_dir(APPPATH.'themes/'.$theme.'/views/layouts/'.$file)) {
                    continue;
                }
                $file = str_ireplace('.php', '', $file);
                $layout_list[] = $file;
            }
            $this->cms_show_json($layout_list);
        }
    }
}
