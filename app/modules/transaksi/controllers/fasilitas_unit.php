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
    public function check_if_already_check_in($id_unit)
    {
        $tgl_sekarang = date('Y-m-d', time());
        return $this->db->select("COUNT(*) cx")->where(['id_unit'=>$id_unit,'DATE(tgl_dibuat)'=>$tgl_sekarang,'is_complete'=>0])->get('tr_poin')->row()->cx > 0;
    }
    public function get_check_in_data($id_unit)
    {
        $tgl_sekarang = date('Y-m-d', time());
        $daftar_fasilitas = $this->db->select('tp.id as id_tr,f.id,f.nama,f.gambar')->join('m_fasilitas f', 'tp.id_fasilitas=f.id')->where(['tp.id_unit'=>$id_unit,'DATE(tp.tgl_dibuat)'=>$tgl_sekarang, 'tp.is_complete'=>0])->get('tr_poin tp')->result_array();
        $daftar_fasilitas_paged=[];
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
        return $daftar_fasilitas_paged;
    }
    public function details_card_numbers_fetch_unit_row_json($id)
    {
        $this->cms_guard_page('transaksi_detail_card_numbers');
        $unit = $this->db->select('u.*,c.nama cluster_name')->join('m_cluster c', 'c.id=u.id_cluster', 'right')->where(['u.id'=> $id,'u.is_active'=>'1'])->get('m_unit u')->row_array();
        
        $now = time();
        $unit['is_expired'] = strtotime($unit['tgl_berakhir'])>$now;

        $unit['tgl_berlaku'] =date_format_id($unit['tgl_berlaku']);
        $unit['tgl_berakhir'] = date_format_id($unit['tgl_berakhir']);
        $unit['calculated_poin'] =  empty($unit['calculated_poin'])?0:$unit['calculated_poin'];
        
        $unit['already_checkin'] = $this->check_if_already_check_in($unit['id']);
        if ($unit['already_checkin']) {
            $unit['fasilitas'] = $this->get_check_in_data($unit['id']);
        }

       
        
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

    public function do_checkin($id_unit)
    {
        $already_checkin = $this->check_if_already_check_in();
        if (!$already_checkin) {
            $request_body = file_get_contents('php://input');
            $obj = json_decode($request_body);
            $fasilitas_ids = $obj->fasilitas;
            $tgl_sekarang = date('Y-m-d', time());
            $waktu_sekarang = date('H:i:s', time());
            foreach ($fasilitas_ids as $id_fasilitas) {
                $tr_poin = [
                    'id_fasilitas' => $id_fasilitas,
                    'is_complete' => 0,
                    'tgl_dibuat' => $tgl_sekarang,
                    'calculated' => 0,
                    'durasi'=>0,
                    'waktu_checkin' => $waktu_sekarang,
                    'waktu_checkout' => $waktu_sekarang,
                    'nilai_poin' => 0,
                    'id_unit' => $id_unit,
                    'dibuat_oleh' => $this->cms_user_id(),
                    'diupdate_oleh' => $this->cms_user_id(),
                    'tgl_dibuat'=>$tgl_sekarang.' '.$waktu_sekarang,
                    'tgl_diubah'=>$tgl_sekarang.' '.$waktu_sekarang,
                    'tgl_berlaku'=> date('Y-'.'12-30', time())
                ];

                $this->db->insert('tr_poin', $tr_poin);
            }

            echo json_encode(['id_unit'=>$id_unit,'success'=>true]);
        }
    }
    public function do_checkout($value = '')
    {
        # code...
    }
}
