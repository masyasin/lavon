<?php
class Member extends CMS_Controller
{
    public function index()
    {
        # code...
    }
    public function entry()
    {
        $daftar_kota = $this->db->get('m_kota')->result_array();
        $jenis_identitas = ['KTP'=>'KTP','SIM'=>'SIM','Passport'=>'Passport'];
        $status_member = ['Home Owner'=>'Home Owner','Lessee'=>'Lessee'];
        $daftar_unit = $this->db->select('id,unit_number')->where('is_active', '1')->get('m_unit')->result_array();
        $data = array(
            'daftar_kota' => $daftar_kota,
            'jenis_identitas' => $jenis_identitas,
            'status_member'=>$status_member,
            'daftar_unit'=>$daftar_unit
        );

        $config=array(
            'title'=>'Entry Card/Member Detail'
        );
        $this->view('member_details', $data, 'navi', $config);
    }
}
