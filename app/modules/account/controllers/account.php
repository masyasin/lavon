<?php 
class Account extends CMS_Controller{
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
	public function login()
	{
		if($this->input->method() == 'post'){

			$this->form_validation->set_rules('username', 'Username', 'required');
        	$this->form_validation->set_rules('password', 'Password', 'required');

			$this->load->library('session');
			$old_url = $this->session->flashdata('cms_old_url');

			//get user input
			$identity = $this->input->post('username');
			$password = $this->input->post('password');

			 if ($this->form_validation->run()) {
			 	
	            if ($this->cms_do_login($identity, $password)) {
	                //if old_url exist, redirect to old_url, else redirect to main/index
	                if (isset($old_url)) {
	                    $this->session->set_flashdata('cms_old_url', NULL);
	                    // seek for the closest url that exist in navigation table to avoid something like manage_x/index/edit/1/error to be appeared
	                    $old_url_part = explode('/', $old_url);
	                    
	                    $old_url = cms_navigation_get_old_url($old_url_part);

	                    redirect(empty($old_url) ? 'apps' : $old_url);
	                } else {
	                    redirect('apps');
	                }
	            } else {
	                //the login process failed
	                //save the old_url again
	                if (isset($old_url)) {
	                    $this->session->keep_flashdata('cms_old_url');
	                }

	                //view login again
	                $data = array(
	                    "identity" => $identity,
	                    "message" => 'Username dan Password salah',
	                    "providers" => $this->cms_third_party_providers(),
	                    "login_caption" => $this->cms_lang("Login"),
	                    // "register_caption" => $this->cms_lang("Register"),
	                    // "allow_register"=> $allow_register,
	                );
	                $this->view('login', $data, 'account_login', $view_config );
	                return;
	            }
	        }//END OF FORM VALIDATION
	        
		}//END OF CHECK REQUEST TYPE IS POST
		 
		$this->view('login', $data, 'account_login', $view_config );
	}
	public function logout()
    {
        $this->cms_do_logout();
        redirect('account/login');
    }
	

}