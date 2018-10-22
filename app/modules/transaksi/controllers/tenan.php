<?php

class Tenan extends CMS_Controller
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
    	$this->cms_guard_page('transaksi_tenan');
        // $this->delete_incomplete();
 
        $daftar_kota_tmp = $this->db->get('m_kota')->result_array();
        $daftar_kota = [];

        foreach ($daftar_kota_tmp as $kota) {
            $daftar_kota[$kota['id']]=$kota['nama'];
        }
        $jenis_identitas = ['KTP'=>'KTP','SIM'=>'SIM','Passport'=>'Passport'];
        $status_member = ['Home Owner'=>'Home Owner','Lessee'=>'Lessee'];
        $daftar_unit = $this->db->select('id,unit_number')->where('is_active', '1')->get('m_unit')->result_array();
        $daftar_fasilitas = $this->db->select('id,nama,gambar')->get('m_fasilitas')->result_array();
        $daftar_fasilitas_paged = [];
        $daftar_tenan_tmp=$this->db->select('id,nama')->get('m_tenan')->result_array();
        $daftar_tenan=array_kv($daftar_tenan_tmp,'id');

        $row = [];
        $max_index = count($daftar_fasilitas);

        foreach ($daftar_fasilitas as $index => $fasilitas) {
            $fasilitas['url_gambar']=site_url('public/assets/uploads/files/fasilitas/'.$fasilitas['gambar']);
            $fasilitas['is_checked']=false;
            $row[] = $fasilitas;
            if (($index+1) % 5 == 0) {
                $daftar_fasilitas_paged[]=$row;
                $row = [];
                if (($index+1) == $max_index) {
                    continue;
                }
            }
            if (($index+1) == $max_index) {
                $daftar_fasilitas_paged[]=$row;
            }
        }

        $data = array(
        'daftar_kota' => $daftar_kota,
        'jenis_identitas' => $jenis_identitas,
        'status_member'=>$status_member,
        'daftar_unit'=>$daftar_unit,
        'daftar_fasilitas'=>$daftar_fasilitas_paged
        );

        $view_config = array(
        'title' => ' Transaksi Tenan'
        );
        $this->template->set_breadcrumb('Transaksi', false)
               ->set_breadcrumb('Tenan', '');
        $this->view('tenan', $data, 'transaksi_tenan', $view_config);
    }
}