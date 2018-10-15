<?php
class Transaksi extends CMS_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }

    //---------------------------------------------------------------------redeem-point
    public function redeem_poin()
    {
        $this->cms_guard_page('transaksi_redeem_poin');
        
        $data = [];

        $view_config = array(
            'title' => ' Transaksi Redeem Poin'
        );
        $this->template->set_breadcrumb('Transaksi', false)
                       ->set_breadcrumb('Redeem Poin', '');
        $this->view('redeem_poin', $data, 'transaksi_redeem_poin', $view_config);
    }
     //---------------------------------------------------------------------histori_transaksi_poin
    public function histori_transaksi_poin()
    {
        $this->cms_guard_page('transaksi_histori_transaksi_poin');
        
        $data = [];

        $view_config = array(
            'title' => ' Histori Transaksi Poin'
        );
        $this->template->set_breadcrumb('Transaksi', false)
                       ->set_breadcrumb('Histori Transaksi Poin', '');
        $this->view('histori_transaksi_poin', $data, 'transaksi_histori_transaksi_poin', $view_config);
    }
       //---------------------------------------------------------------------histori_check_inout
    public function histori_check_inout()
    {
        $this->cms_guard_page('transaksi_histori_check_inout');
        
        $data = [];

        $view_config = array(
            'title' => ' Histori Check In/Out'
        );
        $this->template->set_breadcrumb('Transaksi', false)
                       ->set_breadcrumb('Histori Check In/Out', '');
         $this->view('histori_check_inout', $data, 'transaksi_histori_check_inout', $view_config);
    }
      //---------------------------------------------------------------------histori_redeem_poin
    public function histori_redeem_poin()
    {
        $this->cms_guard_page('transaksi_histori_redeem_poin');
        
        $data = [];

        $view_config = array(
            'title' => ' Histori Redeem Poin'
        );
        $this->template->set_breadcrumb('Transaksi', false)
                       ->set_breadcrumb('Histori Redeem Poin', '');
        $this->view('histori_redeem_poin', $data, 'transaksi_histori_redeem_poin', $view_config);
    }
}
