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
    public function fasilitas()
    {
    }
    /*START details-card-number */
    public function details_card_numbers()
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
            'title'=>' Member Details &amp; Card Number'
        );
        $this->template->set_breadcrumb('Transaksi', false)
                       ->set_breadcrumb('Member Details Card', '');
        $this->view('details_card_numbers', $data, 'navi', $config);
    }

    public function details_card_numbers_save($id)
    {
        
        $request_body = file_get_contents('php://input');
        $obj = json_decode($request_body);
        $input_unit = $obj->unit;
        $deleted_queue_ids = $obj->deleted_queue_ids;
        // print_r($input_unit);

        $members = $input_unit->members;
        $now=date('Y-m-d H:i:s');
        $unit = [
            'card_number' => $input_unit->card_number,
            'tgl_berlaku' => $input_unit->tgl_berlaku,
            'tgl_berakhir'=> $input_unit->tgl_berakhir,
            'tgl_diubah' => $now
        ];
        // print_r($unit);
        $this->db->where('id', $input_unit->id)->update('m_unit', $unit);

        foreach ($members as $member) {
            $data = [
                'id_unit' => $input_unit->id,
                'tgl_berlaku' =>  $input_unit->tgl_berlaku,
                'tgl_berakhir' => $input_unit->tgl_berakhir,
                'tgl_diubah' => $now,
                'nama'=>$member->nama,
                'tgl_lahir'=>$member->tgl_lahir,
                'jenis_identitas'=>$member->jenis_identitas,
                 'jenis_identitas' => $member->jenis_identitas,
                 'nomor_identitas'=>$member->nomor_identitas,
                 'kontak'=>$member->kontak,
                 'email'=>$member->email,
                 'distrik'=>$member->distrik,
                 'id_kota'=>$member->id_kota,
                 'status'=>$member->status,
                 'is_active'=>'1'
            ];
            // print_r($data);
            if (!empty($member->id)) {
                $this->db->where('id', $member->id)->update('m_member', $data);
            } else {
                $data['tgl_dibuat'] = $now;
                $this->db->insert('m_member', $data);
            }
        }
        $process_delete_counter = 0;
        foreach ($deleted_queue_ids as $id) {
            if (!empty($id)) {
                $this->db->or_where('id', $id);
                $process_delete_counter+=1;
            }
        }
        if ($process_delete_counter>0) {
            $this->db->delete('m_member');
        }
        

        $response = array(
            'id' => $input_unit->id,
            'unit_number'=> $input_unit->unit_number
        );

        echo json_encode($response);
    }
    public function details_card_numbers_fetch_unit_row_json($id)
    {
        $unit = $this->db->select('u.*,c.nama cluster_name')->join('m_cluster c', 'c.id=u.id_cluster', 'right')->where(['u.id'=> $id,'u.is_active'=>'1'])->get('m_unit u')->row_array();
        $unit['members'] = array();
        if (!empty($unit)) {
            $unit['members'] = $this->db->where('id_unit', $id)->get('m_member')->result_array();
        }
        $unit['member_count'] = count($unit['members']);
        $unit['has_member'] = $unit['member_count'] > 0;

        echo json_encode($unit);
    }
    /* END details-card-number */
}