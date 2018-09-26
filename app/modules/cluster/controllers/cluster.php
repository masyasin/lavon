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
		# code...
	}
	public function grid()
	{
		
		$crud = $this->new_crud();
        $crud->unset_jquery();
        
        $crud->set_theme('datatables');

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