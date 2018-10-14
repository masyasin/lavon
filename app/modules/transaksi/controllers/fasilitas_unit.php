<?php
class Fasilitas_unit extends CMS_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }
    //---------------------------------------------------------------------fasilitas-unit
    public function index()
    {
        $this->cms_guard_page('transaksi_fasilitas_unit');
        
 
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
        'title' => ' Transaksi Fasilitas Unit'
        );
        $this->template->set_breadcrumb('Transaksi', false)
                   ->set_breadcrumb('Fasilitas Unit', '');
        $this->view('fasilitas_unit', $data, 'transaksi_fasilitas_unit', $view_config);
    }
    public function check_if_already_check_in($unit)
    {
        $tgl_sekarang = date('Y-m-d', time());
        return $this->db->select("COUNT(*) cx")->where(['id_unit'=>$unit['id'],'tgl_dibuat'=>$tgl_sekarang])->get('tr_poin')->row()->cx > 0;
    }
    public function get_check_in_data($unit)
    {
        $tgl_sekarang = date('Y-m-d', time());
        return $this->db->select("tp.*")->where(['id_unit'=>$unit['id'],'tgl_dibuat'=>$tgl_sekarang])->get('tr_poin tp')->row_array();
    }
    public function details_card_numbers_fetch_unit_row_json($id)
    {
        $this->cms_guard_page('transaksi_detail_card_numbers');
        $unit = $this->db->select('u.*,c.nama cluster_name')->join('m_cluster c', 'c.id=u.id_cluster', 'right')->where(['u.id'=> $id,'u.is_active'=>'1'])->get('m_unit u')->row_array();

        $unit['tgl_berlaku'] =date_format_id($unit['tgl_berlaku']);
        $unit['tgl_berakhir'] = date_format_id($unit['tgl_berakhir']);
        $unit['calculated_poin'] =  empty($unit['calculated_poin'])?0:$unit['calculated_poin'];
        
        $unit['already_checkin'] = $this->check_if_already_check_in($unit);

        $unit['members'] = array();
        if (!empty($unit)) {
            $unit['members'] = $this->db->where('id_unit', $id)->get('m_member')->result_array();

            foreach ($unit['members'] as &$member) {
                $member['tgl_lahir'] =  date_format_id($unit['tgl_lahir']);
                $member['collapse'] = true;
            }
        }
        $unit['member_count'] = count($unit['members']);
        $unit['has_member'] = $unit['member_count'] > 0;

        echo json_encode($unit);
    }

    public function do_checkin($value = '')
    {
        # code...
    }
    public function do_checkout($value = '')
    {
        # code...
    }
}
