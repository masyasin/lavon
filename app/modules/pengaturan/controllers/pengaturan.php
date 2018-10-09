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
        $data = [];

        $view_config = array(
            'title' => ' Pengaturan Grup'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                       ->set_breadcrumb('Grup', '');
        $this->view('grup', $data, 'navi', $view_config);
    }
    public function pengguna()
    {
        $data = [];

        $view_config = array(
            'title' => ' Pengaturan Pengguna'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                       ->set_breadcrumb('Pengguna', '');
        $this->view('pengguna', $data, 'navi', $view_config);
    }
    public function setting()
    {
        $data = [];

        $view_config = array(
            'title' => ' Settings'
        );
        $this->template->set_breadcrumb('Pengaturan', false)
                       ->set_breadcrumb('Settings', '');
        $this->view('setting', $data, 'navi', $view_config);
    }
}
