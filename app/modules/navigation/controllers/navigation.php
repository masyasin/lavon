<?php 
class Navigation extends CMS_Controller{
	function __construct()
	{
		# code...
		parent::__construct();
       
        $this->load->driver('session');
		$this->theme = $this->cms_get_config('site_theme');
		$this->template->set_theme($this->theme);

	}
	public function index()
	{
		$data = [];
		$config = [];

		$this->view('index',$data,'apps',$config);	
	}
	public function grid($parent_id=NULL)
    {
    	// error_reporting(E_ALL);
        // $this->cms_guard_page('main_navigation_management');
        $crud = $this->new_crud();
        $crud->set_theme('datatables');

        $crud->unset_jquery();

        $crud->set_table(cms_table_name('main_navigation'));
        $crud->set_subject('Menu');

        $crud->required_fields('navigation_name', 'title');
        $crud->unique_fields('navigation_name', 'title', 'url');
        $crud->unset_read();

        $crud->columns('title', 'navigation_child',  'active');
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
        $crud->display_as('navigation_name', $this->cms_lang('Navigation Code'))
            ->display_as('is_root', $this->cms_lang('Is Root'))
            ->display_as('navigation_child', 'Sub Menu')
            ->display_as('parent_id', $this->cms_lang('Parent'))
            ->display_as('title','Menu')
            ->display_as('page_title', $this->cms_lang('Page Title'))
            ->display_as('page_keyword', $this->cms_lang('Page Keyword (Comma Separated)'))
            ->display_as('description', $this->cms_lang('Description'))
            ->display_as('url', $this->cms_lang('URL (Where is it point to)'))
            ->display_as('active', 'Enabled')
            ->display_as('is_static', $this->cms_lang('Static'))
            ->display_as('static_content', $this->cms_lang('Static Content'))
            ->display_as('authorization_id', $this->cms_lang('Authorization'))
            ->display_as('groups', $this->cms_lang('Groups'))
            ->display_as('only_content', $this->cms_lang('Only show content'))
            ->display_as('default_theme', $this->cms_lang('Default Theme'))
            ->display_as('default_layout', $this->cms_lang('Default Layout'));

        $crud->order_by('index,parent_id ', 'asc');

        $crud->unset_texteditor('description');
        $crud->field_type('only_content', 'true_false');

        $crud->field_type('bootstrap_glyph','enum',array('glyphicon-adjust', 'glyphicon-align-center', 'glyphicon-align-justify', 'glyphicon-align-left', 'glyphicon-align-right', 'glyphicon-arrow-down', 'glyphicon-arrow-left', 'glyphicon-arrow-right', 'glyphicon-arrow-up', 'glyphicon-asterisk', 'glyphicon-backward', 'glyphicon-ban-circle', 'glyphicon-barcode', 'glyphicon-bell', 'glyphicon-bold', 'glyphicon-book', 'glyphicon-bookmark', 'glyphicon-briefcase', 'glyphicon-bullhorn', 'glyphicon-calendar', 'glyphicon-camera', 'glyphicon-certificate', 'glyphicon-check', 'glyphicon-chevron-down', 'glyphicon-chevron-left', 'glyphicon-chevron-right', 'glyphicon-chevron-up', 'glyphicon-circle-arrow-down', 'glyphicon-circle-arrow-left', 'glyphicon-circle-arrow-right', 'glyphicon-circle-arrow-up', 'glyphicon-cloud', 'glyphicon-cloud-download', 'glyphicon-cloud-upload', 'glyphicon-cog', 'glyphicon-collapse-down', 'glyphicon-collapse-up', 'glyphicon-comment', 'glyphicon-compressed', 'glyphicon-copyright-mark', 'glyphicon-credit-card', 'glyphicon-cutlery', 'glyphicon-dashboard', 'glyphicon-download', 'glyphicon-download-alt', 'glyphicon-earphone', 'glyphicon-edit', 'glyphicon-eject', 'glyphicon-envelope', 'glyphicon-euro', 'glyphicon-exclamation-sign', 'glyphicon-expand', 'glyphicon-export', 'glyphicon-eye-close', 'glyphicon-eye-open', 'glyphicon-facetime-video', 'glyphicon-fast-backward', 'glyphicon-fast-forward', 'glyphicon-file', 'glyphicon-film', 'glyphicon-filter', 'glyphicon-fire', 'glyphicon-flag', 'glyphicon-flash', 'glyphicon-floppy-disk', 'glyphicon-floppy-open', 'glyphicon-floppy-remove', 'glyphicon-floppy-save', 'glyphicon-floppy-saved', 'glyphicon-folder-close', 'glyphicon-folder-open', 'glyphicon-font', 'glyphicon-forward', 'glyphicon-fullscreen', 'glyphicon-gbp', 'glyphicon-gift', 'glyphicon-glass', 'glyphicon-globe', 'glyphicon-hand-down', 'glyphicon-hand-left', 'glyphicon-hand-right', 'glyphicon-hand-up', 'glyphicon-hd-video', 'glyphicon-hdd', 'glyphicon-header', 'glyphicon-headphones', 'glyphicon-heart', 'glyphicon-heart-empty', 'glyphicon-home', 'glyphicon-import', 'glyphicon-inbox', 'glyphicon-indent-left', 'glyphicon-indent-right', 'glyphicon-info-sign', 'glyphicon-italic', 'glyphicon-leaf', 'glyphicon-link', 'glyphicon-list', 'glyphicon-list-alt', 'glyphicon-lock', 'glyphicon-log-in', 'glyphicon-log-out', 'glyphicon-magnet', 'glyphicon-map-marker', 'glyphicon-minus', 'glyphicon-minus-sign', 'glyphicon-move', 'glyphicon-music', 'glyphicon-new-window', 'glyphicon-off', 'glyphicon-ok', 'glyphicon-ok-circle', 'glyphicon-ok-sign', 'glyphicon-open', 'glyphicon-paperclip', 'glyphicon-pause', 'glyphicon-pencil', 'glyphicon-phone', 'glyphicon-phone-alt', 'glyphicon-picture', 'glyphicon-plane', 'glyphicon-play', 'glyphicon-play-circle', 'glyphicon-plus', 'glyphicon-plus-sign', 'glyphicon-print', 'glyphicon-pushpin', 'glyphicon-qrcode', 'glyphicon-question-sign', 'glyphicon-random', 'glyphicon-record', 'glyphicon-refresh', 'glyphicon-registration-mark', 'glyphicon-remove', 'glyphicon-remove-circle', 'glyphicon-remove-sign', 'glyphicon-repeat', 'glyphicon-resize-full', 'glyphicon-resize-horizontal', 'glyphicon-resize-small', 'glyphicon-resize-vertical', 'glyphicon-retweet', 'glyphicon-road', 'glyphicon-save', 'glyphicon-saved', 'glyphicon-screenshot', 'glyphicon-sd-video', 'glyphicon-search', 'glyphicon-send', 'glyphicon-share', 'glyphicon-share-alt', 'glyphicon-shopping-cart', 'glyphicon-signal', 'glyphicon-sort', 'glyphicon-sort-by-alphabet', 'glyphicon-sort-by-alphabet-alt', 'glyphicon-sort-by-attributes', 'glyphicon-sort-by-attributes-alt', 'glyphicon-sort-by-order', 'glyphicon-sort-by-order-alt', 'glyphicon-sound-5-1', 'glyphicon-sound-6-1', 'glyphicon-sound-7-1', 'glyphicon-sound-dolby', 'glyphicon-sound-stereo', 'glyphicon-star', 'glyphicon-star-empty', 'glyphicon-stats', 'glyphicon-step-backward', 'glyphicon-step-forward', 'glyphicon-stop', 'glyphicon-subtitles', 'glyphicon-tag', 'glyphicon-tags', 'glyphicon-tasks', 'glyphicon-text-height', 'glyphicon-text-width', 'glyphicon-th', 'glyphicon-th-large', 'glyphicon-th-list', 'glyphicon-thumbs-down', 'glyphicon-thumbs-up', 'glyphicon-time', 'glyphicon-tint', 'glyphicon-tower', 'glyphicon-transfer', 'glyphicon-trash', 'glyphicon-tree-conifer', 'glyphicon-tree-deciduous', 'glyphicon-unchecked', 'glyphicon-upload', 'glyphicon-usd', 'glyphicon-user', 'glyphicon-volume-down', 'glyphicon-volume-off', 'glyphicon-volume-up', 'glyphicon-warning-sign', 'glyphicon-wrench', 'glyphicon-zoom-in', 'glyphicon-zoom-out'));
            $crud->field_type('index','hidden');

        $crud->set_relation('parent_id', cms_table_name('main_navigation'), 'navigation_name');
        $crud->set_relation('authorization_id', cms_table_name('main_authorization'), 'authorization_name');

        $crud->set_relation_n_n('groups', cms_table_name('main_group_navigation'), cms_table_name('main_group'), 'navigation_id', 'group_id', 'group_name');

        if(isset($parent_id) && intval($parent_id)>0){
            $crud->where(cms_table_name('main_navigation').'.parent_id', $parent_id);
            $state = $crud->getState();
            if($state == 'add'){
                $crud->field_type('parent_id', 'hidden', $parent_id);
            }
        }else{
            $crud->where(array(cms_table_name('main_navigation').'.parent_id' => NULL));
        }
        $crud->add_action('Move Up', 'wb-triangle-up',
            site_url($this->cms_module_path().'/action_navigation_move_up').'/');
        $crud->add_action('Move Down', 'wb-triangle-down',
            site_url($this->cms_module_path().'/action_navigation_move_down').'/');

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
        $crud->set_view_file('list',APPPATH.'modules/'.$this->cms_module_path().'/views/gc/navigation/list.php');
        $output = $crud->render();

        $navigation_path = array();
        if(isset($parent_id) && intval($parent_id)>0){
            $this->db->select('navigation_name')
                ->from(cms_table_name('main_navigation'))
                ->where('navigation_id', $parent_id);
            $query = $this->db->get();
            if($query->num_rows()>0){
                $row = $query->row();
                $navigation_name = $row->navigation_name;
                $navigation_path = $this->cms_get_navigation_path($navigation_name);
            }
        }
        $output->navigation_path = $navigation_path;
        $config = array(
            // 'layout' => 'full'
        );

  //      $this->theme = $this->cms_get_config('site_theme');
		// $this->template->set_theme($this->theme);
 
       // print_r($this->template); 
       $this->view('index', $output, 'navi',$config);
    }

    public function action_navigation_move_up($primary_key){
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
        if(isset($parent_id)){
            redirect('navigation/grid/'.$parent_id.'#record_'.$primary_key);
        }else{
            redirect('navigation/grid'.'#record_'.$primary_key);
        }
    }

    public function action_navigation_move_down($primary_key){
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
        if(isset($parent_id)){
            redirect('navigation/grid/'.$parent_id.'#record_'.$primary_key);
        }else{
            redirect('navigation/grid'.'#record_'.$primary_key);
        }
    }

    public function before_insert_navigation($post_array)
    {        
        //get parent's navigation_id
        $query = $this->db->select('navigation_id')
            ->from(cms_table_name('main_navigation'))
            ->where('navigation_id', is_int($post_array['parent_id'])? $post_array['parent_id']: NULL)
            ->get();
        $row   = $query->row();

        $parent_id = isset($row->navigation_id) ? $row->navigation_id : NULL;

        //index = max index+1
        $query = $this->db->select_max('index')
            ->from(cms_table_name('main_navigation'))
            ->where('parent_id', $parent_id)
            ->get();
        $row   = $query->row();
        $index = $row->index;
        if (!isset($index)){
            $index = 1;
        }else{
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
    {$target = site_url($this->cms_module_path() . '/toggle_navigation_active/' . $row->navigation_id);
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
        if($child_count<=0){
            $html .= '&nbsp; -';
        }else{
            $html .= '<a class="add_btn" href="'.site_url($this->cms_module_path().'/grid/'.$row->navigation_id).'">'.
                $this->cms_lang('Manage Children')
                .'</a>';
        }
        $html .= '<a class="add_btn" href="'.site_url($this->cms_module_path().'/grid/'.$row->navigation_id).'/add">'.
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
}