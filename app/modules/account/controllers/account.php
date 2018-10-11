<?php
class Account extends CMS_Controller
{
    function __construct()
    {
        # code...
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }
    public function login()
    {
        if ($this->input->method() == 'post') {
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
                        $this->session->set_flashdata('cms_old_url', $old_url);
                        // seek for the closest url that exist in navigation table to avoid something like manage_x/index/edit/1/error to be appeared
                        $old_url_part = explode('/', $old_url);
                        // print_r($old_url_part);
                        // die();
                        $old_url = cms_navigation_get_old_url($old_url_part);
                        // die($old_url);
                        redirect(empty($old_url) ? 'dashboard' : $old_url);
                    } else {
                        redirect('dashboard');
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
                    $this->view('login', $data, 'account_login', $view_config);
                    return;
                }
            }//END OF FORM VALIDATION
        }//END OF CHECK REQUEST TYPE IS POST
         
        $this->view('login', $data, 'account_login', $view_config);
    }
    public function logout()
    {
        $this->cms_do_logout();
        redirect('account/login');
    }
    public function profile()
    {
        $this->cms_guard_page('account_profile');
        
        $data = [];

        $view_config = array(
            'title' => ' Profile'
        );
        $this->template->set_breadcrumb('Account', false)
                       ->set_breadcrumb('Profile', '');
         $this->view('profile', $data, 'account_profile', $view_config);
    }
}
