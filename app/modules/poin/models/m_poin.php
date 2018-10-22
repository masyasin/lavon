<?php

class M_poin extends CI_Model
{
    public function update($id_unit, $poin, $redeem = 0)
    {
        //ceck if rec not exist
        $not_exist = $this->db->select('COUNT(*) cx')->where(['id_unit'=>$id_unit])->get('unit_poin')->row()->cx == 0;
        $data = [
            'id_unit'=>$id_unit,
            'poin'=>$poin,
            'redeem'=>$redeem,
            'data'=>''
        ];
        if ($not_exist) {
            $this->db->insert('unit_poin', $data);
            $data['id']=$this->db->insert_id();
        } else {
            $prev_version = $this->db->where(['id_unit'=>$id_unit])->get('unit_poin')->row_array();
            $data['poin'] += $prev_version['poin'];
            $data['redeem'] += $prev_version['redeem'];
            $this->db->where('id_unit', $id_unit)->update('unit_poin', $data);
        }
        $this->db->where('id',$id_unit)->update('m_unit',['calculated_poin'=>$data['poin']]);
        return $data;
    }
}
