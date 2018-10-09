<?php
class Dashboard extends CMS_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }
    public function index()
    {
        redirect('dashboard/statistik');
    }
    public function statistik()
    {
        $data = [];

        $view_config = array(
            'title' => ' Dashboard'
        );
        $this->template->set_breadcrumb('Dashboard', false)
                       ->set_breadcrumb('Statistik', '');
        $this->view('statistik', $data, 'navi', $view_config);
    }
}
