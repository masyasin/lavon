<?php

class Admin extends CMS_Controller
{
	public $moduleName = 'admin';
	public $uriForm	   = '';
	
	function __construct()
	{
		# code...
		parent::__construct();
       
        $this->load->driver('session');
		$this->load->model('admin_m');
		$this->load->model('download_m');
		$this->load->model('galeri_new_m');
		$this->load->model('bkpp_m');
		$this->theme = $this->cms_get_config('site_theme');
		$this->template->set_theme($this->theme);

	}
	public function index()
	{
		# code...
		// redirect('admin/dashboard','refresh');

        echo "Hello, Welcome ".$this->m_cms->cms_user_real_name(). anchor('main/logout','Logout');
	}

	public function ui()
	{
		redirect('admin/dashboard','refresh');
	}
	public function image_slider($a='',$b='',$c='')
	{
		$this->moduleName = "konten_image_slider";
		if(!$this->checkRead($this->moduleName)){
			show_error("Akses Ditolak... harap hubungi Administrator",403,$heading = 'An Error Was Encountered');
		}
		
		//$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_banner'));
        $crud->set_subject('Image');

        $crud->required_fields('gambar','judul','keterangan');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
        $crud->columns('gambar','judul','keterangan','date');
		
        if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
        
		$crud->change_field_type('date','invisible');
		$crud->callback_before_insert(array($this->admin_m,'cb_auto_date'));
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_date'));

        $crud->edit_fields('gambar','judul','keterangan','date');
        $crud->add_fields('gambar','judul','keterangan','date');
        $crud->display_as('date', 'Tanggal');

		$crud->set_field_upload('gambar','public/assets/uploads/files/banners');
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Image Slider'
        );

        $this->view('admin/image_slider', $output, 'admin_area',$view_config);
	}

	public function download($a='',$b='',$c='')
	{
		//$this->cms_guard_page('admin_area');
		$this->moduleName = "konten_download";
		$this->uriForm    = "konten_download_publish";
		
		
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_download'));
        $crud->set_subject('Download');

        $crud->required_fields('file','judul','keterangan','date');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		$crud->columns('file','judul','keterangan','date');
		$crud->add_fields('file','judul','keterangan','date');
		$crud->edit_fields('file','judul','keterangan');
		
		if($this->checkPublish($this->moduleName)){
			 $crud->columns('file','judul','keterangan','date','publish');
			 $crud->add_fields('file','judul','keterangan','date','publish','publish_date');
			 $crud->edit_fields('file','judul','keterangan','publish','publish_date');
			 $crud->callback_column('publish', array($this,'_publish'));
		}
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
		$crud->field_type('date', 'hidden', date("Y-m-d"));
		$crud->callback_before_insert(array($this->admin_m,'cb_auto_date'));
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_date'));

       
        $crud->display_as('date', 'Tanggal');

		$crud->set_field_upload('file','public/assets/uploads/files/attachments');
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Download'
        );

        $this->view('admin/download', $output, 'admin_area',$view_config);
	}
	
	public function konten_download_publish(){
		if($this->input->post("publish")==1){
			$title		= "Publish";
			$attributes = array(
				"publish"		=>$this->input->post("publish"),
				"publish_date"	=>date("Y-m-d H:i:s",strtotime($this->input->post("publish_date"))),
			);
		}else{
			$title		= "UnPublish";
			$attributes = array(
				"publish"		=>$this->input->post("publish")
			);
		}
		$where=array("id"=>$this->input->post("id"));
		if($this->download_m->update($attributes,$where)){
			echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Di $title"));
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Data Berhasil Di $title"));
		}
	}
	
	
    public function galeri_items($a='',$b='',$c='')
    {
        //$this->cms_guard_page('admin_area');
		$this->moduleName = "konten_galeri";
		
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_galery_image_items'));
        $crud->set_subject('Gambar');

        $crud->required_fields('file','judul','keterangan');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
        $crud->columns('file','judul','keterangan','tgl_dibuat');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('file','judul','keterangan','galery_id');
        $crud->add_fields('file','judul','keterangan','tgl_dibuat','galery_id');
        $crud->display_as('date', 'Tanggal');
		$crud->field_type('tgl_dibuat', 'hidden', date("Y-m-d"));
		$crud->field_type('galery_id', 'hidden', $a);
        
       //$crud->change_field_type('tgl_dibuat','invisible');
       //$crud->callback_before_insert(array($this->admin_m,'cb_auto_tgl'));
	   
	   
	   
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_tgl'));
        $crud->where('galery_id',$a);
        $galeri = $this->admin_m->get_galeri($a);

        $slug_dir = underscorize($galeri->slug);
		
		if (!is_dir('public/assets/uploads/files/galery_images/'. $slug_dir)) {
			mkdir('public/assets/uploads/files/galery_images/'. $slug_dir, 0777, TRUE);
		}
		
        $crud->set_field_upload('file','public/assets/uploads/files/galery_images/'. $slug_dir);
        $output = $crud->render();
        $output->galeri = $galeri;
        $view_config = array(
            'layout' => 'management',
            'title' =>'Galeri Items ' . $galeri->judul
        );

        $this->view('admin/galeri_item', $output, 'admin_area',$view_config);
    }
	public function galeri($a='',$b='',$c='')
	{
		
		$this->moduleName = "konten_galeri";
		$this->uriForm 	  = "konten_galeri_publish";
		
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
        if($a == 'items'){
            return $this->galeri_items($b,$c);
        }
		
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');
        //$crud->set_model('galeri_m');
	
        $crud->set_table(cms_table_name('bkpp_galery_images'));
        $crud->set_subject('Album');

        $crud->required_fields('judul','keterangan');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		$crud->columns('judul','jml_gbr','tgl_dibuat');
		$crud->fields('judul','keterangan');
		$crud->add_fields('judul','keterangan','tgl_dibuat','slug');
		$crud->edit_fields('judul','keterangan');
        
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		if($this->checkPublish($this->moduleName)){
			 $crud->columns('judul','jml_gbr','tgl_dibuat','publish');
			 $crud->add_fields('judul','keterangan','tgl_dibuat','publish','publish_date','slug');
			 $crud->edit_fields('judul','keterangan','publish','publish_date');
			 $crud->callback_column('publish', array($this,'_publish'));
		}
        
        $crud->display_as('tgl_dibuat', 'Tanggal');
        $crud->display_as('jml_gbr', 'Gambar');
		$crud->callback_before_insert(array($this->admin_m,'cb_auto_slug'));
		$crud->callback_before_update(array($this->admin_m,'cb_auto_slug'));
		
		$crud->field_type('tgl_dibuat', 'hidden', date("Y-m-d"));
		$crud->field_type('slug', 'invisible');
		
        $crud->add_action('data', 'wb-gallery',site_url($this->cms_module_path().'/galeri/items').'/');
		$crud->callback_column('jml_gbr',array($this,'_total_sub_item'));
		// $crud->set_field_upload('file','public/assets/uploads/files/attachments');
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Galeri'
        );

        $this->view('admin/galeri', $output, 'admin_area',$view_config);
	}
	
	public function _total_sub_item($value, $row){
		$value = $this->galeri_new_m->get_total_item($row->id);
		return $value;
	}
	
	
	public function konten_galeri_publish(){
		if($this->input->post("publish")==1){
			$title		= "Publish";
			$attributes = array(
				"publish"		=>$this->input->post("publish"),
				"publish_date"	=>date("Y-m-d H:i:s",strtotime($this->input->post("publish_date"))),
			);
		}else{
			$title		= "UnPublish";
			$attributes = array(
				"publish"		=>$this->input->post("publish")
			);
		}
		$where=array("id"=>$this->input->post("id"));
		if($this->galeri_new_m->update($attributes,$where)){
			echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Di $title"));
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Data Berhasil Di $title"));
		}
	}
	
	
	
    public function video($a='',$b='',$c='')
    {
		
		$this->moduleName = "konten_video";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
        if($a == 'items'){
            return $this->video_items($b,$c);
        }
        //$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');
        $crud->set_model('video_m');

        $crud->set_table(cms_table_name('bkpp_galery_videos'));
        $crud->set_subject('Album');

        $crud->required_fields('judul','keterangan');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
		
        $crud->columns('judul','jml_link','tgl_dibuat');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('judul','keterangan');
        $crud->add_fields('judul','keterangan','tgl_dibuat');
        $crud->display_as('tgl_dibuat', 'Tanggal');
        $crud->display_as('jml_link', 'Video');
		$crud->field_type('tgl_dibuat', 'hidden', date("Y-m-d"));
        // $crud->callback_before_insert(array($this->admin_m,'cb_auto_tgl'));
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_tgl'));
        $crud->add_action('data', 'wb-video',
            site_url($this->cms_module_path().'/video/items').'/');
        // $crud->set_field_upload('file','public/assets/uploads/files/attachments');
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Video'
        );

        $this->view('admin/video', $output, 'admin_area',$view_config);
    }
    public function video_items($a='',$b='',$c='')
    {
		
		$this->moduleName = "konten_video";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
        //$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_galery_video_items'));
        $crud->set_subject('Video');

        $crud->required_fields('url','judul','keterangan');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
        $crud->columns('url','judul','keterangan','tgl_dibuat');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('url','judul','keterangan');
        $crud->add_fields('url','judul','keterangan','tgl_dibuat');
        $crud->display_as('tgl_dibuat', 'Tanggal');
        //$crud->callback_before_insert(array($this->admin_m,'cb_auto_tgl'));
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_tgl'));    
        //$crud->change_field_type('tgl_dibuat','invisible');
		
		$crud->field_type('tgl_dibuat', 'hidden', date("Y-m-d"));
		
        // $crud->callback_before_insert(array($this->admin_m,'cb_auto_date'));
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_date'));
        $crud->where('galery_id',$a);
        $galeri = $this->admin_m->get_video($a);

        $slug_dir = underscorize($galeri->slug);

        // $crud->set_field_upload('file','public/assets/uploads/files/galery_images/'. $slug_dir);
        $output = $crud->render();
        $output->galeri = $galeri;
        $view_config = array(
            'layout' => 'management',
            'title' =>'Video Items ' . $galeri->judul
        );

        $this->view('admin/video_item', $output, 'admin_area',$view_config);
    }
	public function links($a='',$b='',$c='')
	{
		$this->moduleName = "konten_links";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
		//$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_links'));
        $crud->set_subject('Link');

        $crud->required_fields('gambar','judul','keterangan');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
        $crud->columns('gambar','judul','date');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('gambar','judul','keterangan','date');
        $crud->add_fields('gambar','judul','keterangan','date');
        $crud->display_as('date', 'Tanggal');
        
        $crud->change_field_type('date','invisible');
		$crud->callback_before_insert(array($this->admin_m,'cb_auto_date'));
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_date'));



		$crud->set_field_upload('gambar','public/assets/uploads/files/links');
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Links'
        );

        $this->view('admin/galeri', $output, 'admin_area',$view_config);
	}
	public function polling_data($a='',$b='',$c='',$d='')
	{
		$this->moduleName = "konten_polling";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}

		//$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');
        $crud->where('parent',$a);

        $crud->set_table(cms_table_name('polling_data'));
   
        $crud->set_subject('Polling Data');

        $crud->required_fields('ip','value');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
        $crud->columns('ip','value');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('ip','value','parent');
        $crud->add_fields('ip','value','parent');
        $crud->display_as('date', 'Tanggal');

        $crud->field_type('parent', 'hidden', $a);

        $polling_data = $this->config->item('polling_data');
        $crud->field_type('value','dropdown',$polling_data);

		//$crud->set_view_file('list',APPPATH.'modules/'.$this->cms_module_path().'/views/gc/polling_data/list.php');
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Polling Data'
        );

        $output->polling = $this->admin_m->get_polling($a);
        $this->session->set_userdata('polling_id',$a);

        $output->polling_wg =$this->template->load_view('partials/homepage/polling.php');

        $this->view('admin/polling_data', $output, 'admin_area',$view_config);
	}
	public function polling($a='',$b='',$c='',$d='')
	{
		$this->moduleName = "konten_polling";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
		if($a=='data'){
			return $this->polling_data($b,$c,$d);
		}
		//$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('pollings'));
        $crud->set_subject('Polling');

        $crud->required_fields('judul','date');        
        $crud->unset_print();
        $crud->unset_export();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
        $crud->columns('judul','date');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('judul','date');
        $crud->add_fields('judul','date');
        $crud->display_as('date', 'Tanggal');

		$crud->add_action('data', 'wb-stats-bars',
            site_url($this->cms_module_path().'/polling/data').'/');

		 $crud->callback_after_delete(array($this->admin_m,'del_poll_data'));
		//$crud->set_view_file('list',APPPATH.'modules/'.$this->cms_module_path().'/views/gc/polling/list.php');

        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Polling'
        );

        $this->view('admin/polling', $output, 'admin_area',$view_config);
	}
	public function bkpp_konsultasi($a='',$b='',$c='')
	{
		$this->moduleName = "bkpp_konsultasi";
		$this->uriForm 	  = "bkpp_konsultasi_publish";
		
		
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		//$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_konsultasi'));
        $crud->set_subject('Konsultasi');

        $crud->required_fields('pengirim','email','pertanyaan');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		$crud->columns('pengirim','pertanyaan','jawaban','tanggal');
		$crud->fields('untuk','pengirim','email','pertanyaan','tanggal','jawaban','tanggal_dijawab');	
		
		
		
		if($this->checkPublish($this->moduleName)){
			$crud->columns('pengirim','pertanyaan','jawaban','tanggal','publish');
			$crud->fields('untuk','pengirim','email','pertanyaan','tanggal','jawaban','tanggal_dijawab','publish','publish_date');	
			$crud->callback_column('publish', array($this,'_publish'));
		}
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		$crud->in_where("untuk",'('.$this->m_cms->cms_group_layanan()["layanan"][0].')');

        $subject_dd = $this->config->item('subject_konsultasi');
        $crud->field_type('untuk','dropdown',$subject_dd);
        $crud->field_type('publish','true_false');
       	
        $crud->set_rules('email','Email','valid_email');

        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Konsultasi'
        );

        $this->view('admin/konsultasi', $output, 'admin_area',$view_config);
	}
	
	public function bkpp_konsultasi_publish(){
		if($this->input->post("publish")==1){
			$title		= "Publish";
			$attributes = array(
				"publish"		=>$this->input->post("publish"),
				"publish_date"	=>date("Y-m-d H:i:s",strtotime($this->input->post("publish_date"))),
			);
		}else{
			$title		= "UnPublish";
			$attributes = array(
				"publish"		=>$this->input->post("publish")
			);
		}
		$where=array("id"=>$this->input->post("id"));
		if($this->bkpp_m->updateKonsultasi($attributes,$where)){
			echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Di $title"));
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Data Berhasil Di $title"));
		}
	}
	
	
	public function _publish($value, $row)
	{
		$title = "";
		if(isset($row->article_title)){
			$title=$row->article_title;
		}elseif(isset($row->judul)){
			$title=$row->judul;
		}
		return "<a href='javascript:void(0)' data-title='$title' data-toggle='tooltip' title='".($value==1?"Un Publish":"Publish")."' data-uri='".site_url('admin/'.$this->uriForm)."' data-id='".$row->id."' class='btn btn-lg ".($value==1?"btn-unpublish":"btn-publish")."'><i class='".($value==1?"fa fa-cloud-download text-warning":"fa fa-cloud-upload text-success")."'></a>";
	}
	
	public function bkpp_buku_tamu($a='',$b='',$c='')
	{
		$this->moduleName = "bkpp_buku_tamu";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
		//$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_buku_tamu'));
        $crud->set_subject('Entri');

        $crud->required_fields('nama','email','isi');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
        $crud->columns('nama','isi','jawaban','tanggal');
        
        $crud->fields( 'nama','email','isi','tanggal','jawaban','tanggal_dijawab','publish');	

   
        $crud->field_type('publish','true_false');
       	
        $crud->set_rules('email','Email','valid_email');

        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Manage Buku Tamu'
        );

        $this->view('admin/buku_tamu', $output, 'admin_area',$view_config);
	}
	public function bkpp_video($a='',$b='',$c='')
	{
		$this->moduleName = "bkpp_video";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		//$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_galery_videos'));
        $crud->set_subject('Video');

        $crud->required_fields('judul','keterangan');        
        $crud->unset_print();
        $crud->unset_export();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
        $crud->columns('judul','keterangan');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('judul','keterangan');
        $crud->add_fields('judul','keterangan');
        $crud->display_as('date', 'Tanggal');

	
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Video'
        );

        $this->view('admin/video', $output, 'admin_area',$view_config);
	}
	
	public function bkpp($cmd='',$a='',$b='',$c='',$d='')
    {
        $method = 'bkpp_'.(str_replace('-','_',$cmd));

        if(method_exists($this, $method)){
            return $this->{$method}($a,$b,$c,$d);
        }
    }


    public function bkpp_layanan($a='',$b='',$c='')
    {
        //$this->cms_guard_page('admin_area');
		
		$this->moduleName = "bkpp_layanan";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
		
        $crud = $this->new_crud();
        $crud->set_theme('datatables');

        $crud->unset_jquery();

        $crud->set_table('bkpp_layanan');
        $crud->set_subject('Layanan');

        $crud->required_fields('judul', 'kategori','konten');
        $crud->fields('judul', 'kategori','konten','slug','date');
        $crud->change_field_type('slug','invisible');
		$crud->change_field_type('date','invisible');
        $kategori = array(
        	'layanan' => 'Layanan',
        	'jabatan-fungsional' => 'Jabatan Fungsional'
        );

        $crud->field_type('kategori','dropdown',$kategori);
        $crud->unique_fields('judul');
    
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();

		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
        $crud->order_by('date','desc');

        $crud->callback_before_insert(array($this->admin_m,'cb_auto_date_slug'));
        $crud->callback_before_update(array($this->admin_m,'cb_auto_date_slug'));

        $crud->columns( 'judul','kategori');
  
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Layanan'
        );
        $this->view('layanan', $output, 'admin_area',$view_config);
    }
    
    public function bkpp_profile($a='',$b='',$c='')
    {
		
		$this->moduleName = "bkpp_profil";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
        //$this->cms_guard_page('admin_area');

        $crud = $this->new_crud();
        $crud->set_theme('datatables');

        $crud->unset_jquery();

        $crud->set_table('bkpp_profile');
        $crud->set_subject('Profil');

        $crud->required_fields('judul','konten');

        $crud->unique_fields('judul');
        $crud->unset_read();
        $crud->unset_export();
        $crud->unset_print();
		
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
        
        $crud->columns( 'judul');
        
        $crud->fields('judul','gambar','keterangan_gambar','hide_gambar','konten','slug','date');
  		$crud->field_type('hide_gambar','true_false');
  		$crud->field_type('slug','invisible');
  		$crud->field_type('date','invisible');
  		$crud->display_as('hide_gambar','Sembunyikan Gambar');

  		$crud->callback_before_insert(array($this->admin_m,'cb_auto_date_slug'));
        $crud->callback_before_update(array($this->admin_m,'cb_auto_date_slug'));

        $crud->set_field_upload('gambar','public/assets/uploads/files/profile_images');
        $crud->order_by('date','desc');

        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' => 'Manage Halaman Profile'
        );
        $this->view('profile', $output, 'admin_area',$view_config);
    }

    public function bkpp_info_dinas($a='',$b='',$c='')
    {
		$this->moduleName = "bkpp_info_dinas";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
       // $this->cms_guard_page('admin_area');

        $crud = $this->new_crud();
        $crud->set_theme('datatables');

        $crud->unset_jquery();

        $crud->set_table('bkpp_info_dinas');
        $crud->set_subject('Info Dinas');

        $crud->required_fields('judul', 'kategori','isi');
        $crud->fields('judul', 'gambar','keterangan_gambar','isi','file','slug','date');
        $crud->change_field_type('slug','invisible');
		$crud->change_field_type('date','invisible');
      

        $crud->unique_fields('judul');
    
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
        $crud->order_by('date','desc');

        $crud->callback_before_insert(array($this->admin_m,'cb_auto_date_slug'));
        $crud->callback_before_update(array($this->admin_m,'cb_auto_date_slug'));

        $crud->columns( 'judul','file');
        $crud->display_as('file','Lampiran');

        $crud->set_field_upload('gambar','public/assets/uploads/files/info_dinas');
        $crud->set_field_upload('file','public/assets/uploads/files/attachments');

  
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' => 'Manage Info Dinas'
        );
        $this->view('info_dinas', $output, 'admin_area',$view_config);
    }

    public function bkpp_agenda($a='',$b='',$c='')
    {
		$this->moduleName = "bkpp_agenda";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
        //$this->cms_guard_page('admin_area');
		
        $crud = $this->new_crud();
        $crud->set_theme('datatables');

        $crud->unset_jquery();

        $crud->set_table('bkpp_agenda_kegiatan');
        $crud->set_subject('Agenda');

        $crud->required_fields('date','judul', 'tempat','keterangan');
        $crud->fields('date','judul','tempat', 'gambar','keterangan_gambar','keterangan','slug');
        $crud->change_field_type('slug','invisible');
		// $crud->change_field_type('date','invisible');
      

        $crud->unique_fields('judul');
    
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
        $crud->order_by('date','desc');
		
		
		

        $crud->callback_before_insert(array($this->admin_m,'cb_auto_slug'));
        $crud->callback_before_update(array($this->admin_m,'cb_auto_slug'));

        $crud->columns( 'judul','date','tempat');
        $crud->display_as('date','Tanggal/Waktu');

        $crud->set_field_upload('gambar','public/assets/uploads/files/agenda_kegiatan');

  
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' => 'Manage Agenda Kegiatan'
        );
        $this->view('agenda_kegiatan', $output, 'admin_area',$view_config);
    }
    public function bkpp_pengumuman($a='',$b='',$c='')
    {
		$this->moduleName = "bkpp_pengumuman";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
        //$this->cms_guard_page('admin_area');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_theme('datatables');

        $crud->set_table(cms_table_name('bkpp_pengumuman'));
        $crud->set_subject('Pengumuman');

        $crud->required_fields('text','date');        
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();
		
		
		if(!$this->checkInsert($this->moduleName)){
			$crud->unset_add();
		}
		if(!$this->checkUpdate($this->moduleName)){
			$crud->unset_edit();
		}
		if(!$this->checkDelete($this->moduleName)){
			$crud->unset_delete();
		}
		
		
        $crud->columns('text','date');
        // $crud->columns('user_name', 'email', 'real_name', 'active', 'groups');
        $crud->edit_fields('text','date');
        $crud->add_fields('text','date');
        $crud->display_as('date', 'Tanggal');
        
        $crud->change_field_type('date','invisible');
        $crud->callback_before_insert(array($this->admin_m,'cb_auto_date'));
        // $crud->callback_before_update(array($this->admin_m,'cb_auto_date'));



      //  $crud->set_field_upload('gambar','public/assets/uploads/files/links');
        $output = $crud->render();
        $view_config = array(
            'layout' => 'management',
            'title' =>'Pengumuman'
        );

        $this->view('admin/pengumuman', $output, 'admin_area',$view_config);
    }
	
	
	/* public function blog($cmd='',$a='',$b='',$c='',$d='')
    {
        $method = 'bkpp_'.(str_replace('-','_',$cmd));

        if(method_exists($this, $method)){
            return $this->{$method}($a,$b,$c,$d);
        }
    } */
	
    public function artikel($cmd='',$b='1',$c='25',$d='',$e='')
    {
		$this->moduleName = "konten_artikel";
		$this->uriForm    = "artikel/publish";
		if(!$this->checkRead($this->moduleName)){
			show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
		}
	   
        $this->load->library('articles');
        $this->load->model('article_m');
        switch ($cmd) {
            case 'set_category':
                $result = $this->article_m->set_category();
                echo json_encode($result);
                exit;
                break;
            case 'add_category':
                $result = $this->article_m->add_category();
                echo json_encode($result);
                exit;
                break;
            case 'delete':
                $id = $this->input->post('rowid');
                if(is_numeric($id)){
                    $this->article_m->delete($id);
                    echo json_encode(array('status'=>true));
                }
                exit;
                break;
				
			case 'bulk-delete':
				$count=0;
				foreach($this->input->post('data') as $val){
					if(is_numeric($val)){
						if($this->article_m->delete($val)){
							$count=$count+1;
						}
					}
				}
				
				if(count($this->input->post('data')) == $count){
					echo json_encode(array('status'=>true,'msg'=>'Data berhasil dihapus'));
				}elseif($count===0){
					echo json_encode(array('status'=>false,'msg'=>'Data gagal dihapus!'));
				}else{
					echo json_encode(array('status'=>true,'msg'=>'Sebagian data gagal dihapus!'));
				}
				exit;
                break;
				
				
			case 'publish':
                $id 	 = $this->input->post('id');
				if($this->input->post('publish')==1){
					$title   = "Publish";
					$publish = array(
						"publish"=>$this->input->post('publish'),
						"publish_date"=>date("Y-m-d H:i:s",strtotime($this->input->post("publish_date")))
					);
				}else{
					$title   = "UnPublish";
					$publish = array(
						"publish"=>$this->input->post('publish')
					);
				}
                if(is_numeric($id)){
					if($this->article_m->publish($id,$publish)){
						echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Di $title"));
					}else{
						echo json_encode(array("success"=>false,"msg"=>"Data Berhasil Di $title"));
					}
                }
                exit;
                break;
				
				
            case 'upload_images':
                if ($_FILES['file']['name']) {
                    if (!$_FILES['file']['error']) {
                        $name = md5(rand(100, 200));
                        $ext = explode('.', $_FILES['file']['name']);
                        $valid_ext = array('jpeg','jpg','png','gif');
                        if(!in_array(strtolower($ext[1]),$valid_ext)){
                            echo "INVALID" . $ext[1];
                            exit;
                        }
                        $filename = $name . '.' . $ext[1];
                        $destination = 'public/assets/uploads/files/summernote_images/' . $filename; //change this directory
                        $location = $_FILES["file"]["tmp_name"];
                        move_uploaded_file($location, $destination);
                        echo site_url('public/assets/uploads/files/summernote_images/' . $filename);//change this URL
                        exit;
                    }
                    else
                    {
                      echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
                    }
                }
                break;
            case 'edit':
                $data = array(
                    'article' => $this->article_m->get_row($b),
					'article_category' => $this->article_m->get_blog_categories(),
                    'article_page' => $this->uri->segment(5),
					'auth'	 => $this
                );
                $view_config = array(
                    'layout' => ($this->input->is_ajax_request()?'ajax':'management'),
                    'title' =>'Edit Artikel',
					'auth'	 => $this
                );

                 $this->view('admin/article_edit', $data, 'admin_area',$view_config);
                break;
			case 'add':
                $data = array(
                    'article_page' => $this->uri->segment(4),
                    'article_category' => $this->article_m->get_blog_categories(),
					'auth'	 => $this
                );
                $view_config = array(
                    'layout' => ($this->input->is_ajax_request()?'ajax':'management'),
                    'title' =>'Tambah Artikel'
                );
                 $this->view('admin/article_add', $data, 'admin_area',$view_config);
                break;
			case 'submit':
				$this->load->library('upload');
				$data = array(
					'article_title'	=> $_REQUEST["article_title"],
					'article_url'	=> slugify(strtolower($_REQUEST["article_title"])),
					//'keyword'		=>$_REQUEST["keyword"],
					//'description'	=>$_REQUEST["description"],
					'content'		=> $_REQUEST["content"],
					//'allow_comment' =>$_REQUEST["allow_comment"]
				);
				
				if(isset($_FILES['file']['name'])){
					$this->upload->initialize(array(
						'upload_path' => 'public/assets/uploads/files/attachments',
						'max_size'=>0,
						'file_ext_tolower' => TRUE,
						'xss_clean' => FALSE,
						'allowed_types' => 'doc|docx|xls|xlsx|pdf|zip|rar|ppt|pptx'
						
					));
					if($this->upload->do_upload('file')) {
						$uploadFile = $this->upload->data();
						$data['file'] = $uploadFile["file_name"];
						
					}else{
						$result["msg"] 		= $this->upload->display_errors();
						$result["success"] 	= false;
						echo json_encode($result);
						exit();
					} 
					
				}
				
				if(isset($_FILES['alt_image']['name'])){
					$this->upload->initialize(array(
						'upload_path' => 'public/assets/uploads/files/article_images',
						'max_size'=>0,
						'file_ext_tolower' => TRUE,
						'xss_clean' => FALSE,
						'allowed_types' => 'gif|jpg|png|jpeg'
					));

					if($this->upload->do_upload('alt_image')) {
						$uploadImg = $this->upload->data();
						$data['alt_image'] = $uploadImg["file_name"];
						
					}else{
						$result["msg"] 		= $this->upload->display_errors();
						$result["success"] 	= false;
						echo json_encode($result);
						exit();
					} 
				}
				if(isset($_POST["article_id"])){
					$prosesData = $this->article_m->update($data);
				}else{
					$prosesData = $this->article_m->insert($data);
				}
				
				
				if($prosesData){
					$result["msg"] 		= "data berhasil di simpan";
					$result["success"] 	= true;
				}
				
				echo json_encode($result);
				
				break;
            
            default:
                $view_config = array(
                    'layout' => 'management',
                    'title'  => 'Manage Artikel',
					'auth'	 => $this
                );
                $pagination_url = 'admin/artikel' ;

                $ob = $this->input->get('ob');
                $odesc = $this->input->get('odesc');
                $category = $this->input->get('category');
                $keywords = $this->input->get('keywords');
                
                $qs = array();

                if(!empty($ob)){
                    $qs[]= 'ob='. $ob;
                }
                if(!empty($odesc)){
                    $qs[]= 'odesc='. $odesc;
                }
                if(!empty($category)){
                    $qs[]='category='.$category;
                }
				if(!empty($keywords)){
                    $qs[]='keywords='.$keywords;
                }
                $blog_categories = $this->article_m->get_blog_categories($category);
                $pagination_url .= '?'. implode('&', $qs);
                $pagination = create_pagination($pagination_url,  $this->article_m->get_count(), 10, 3);
                $data = array(
					'auth'	 => $this,
                    'pagination' => $pagination,
                    'articles' => $this->article_m->get_list($pagination['limit'],$pagination['offset']),
                    'odesc' => $this->input->get('odesc'),
                    'ob' => $this->input->get('ob'),
                    'category' => $category,
                    'keywords' => $keywords,
                    'blog_categories' => $blog_categories
                );
                // $this->output->enable_profiler(1);
                $this->view('admin/articles', $data, 'admin_area',$view_config);
                break;
        }
    }
}
?>