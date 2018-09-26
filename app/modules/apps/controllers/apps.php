<?php 
class Apps extends CMS_Controller{
	function __construct()
	{
		# code...
		parent::__construct();
       
        $this->load->driver('session');
		// $this->load->model('admin_m');
		// $this->load->model('download_m');
		// $this->load->model('galeri_new_m');
		// $this->load->model('bkpp_m');
		$this->theme = $this->cms_get_config('site_theme');
		$this->template->set_theme($this->theme);

	}
	public function index()
	{
		redirect('cluster/grid');
		$data = [];
		$config = [];

		$this->view('index',$data,'apps',$config);	
	}
}