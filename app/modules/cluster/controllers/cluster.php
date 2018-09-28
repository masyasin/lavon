<?php 
class Cluster extends CMS_Controller{
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
		redirect('cluster/grid');
	}
	public function grid()
	{
		
		$crud = $this->new_crud();
        $crud->unset_jquery();
		$crud->set_subject('Cluster');        
        $crud->set_theme('datatables');
        $crud->columns('nama','kode');
        $crud->set_table('m_cluster');
        // $crud->set_table('m_unit');

        $output = $crud->render();

        $config = array(
            'title' => 'Cluster'
        );

  //      
 
       // print_r($output); 
       $this->view('index', $output, 'navi',$config);
   }
}