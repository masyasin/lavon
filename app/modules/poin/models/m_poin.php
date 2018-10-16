<?php

class M_poin extends CI_Model
{
    public function update($unit_id, $poin, $redeem = 0)
    {
        //ceck if rec not exist
        $not_exist = $this->db->select('COUNT(*) cx')->where(['unit_id'=>$unit_id])->get('unit_poin')->row()->cx > 0;
        $data = [
            'unit_id'=>$unit_id,
            'poin'=>$poin,
            'redeem'=>$redeem,
            'data'=>''
        ];
        if ($not_exist) {
            $this->db->insert('unit_poin', $data);
            $data['id']=$this->db->insert_id();
        } else {
            $prev_version = $this->db->where(['unit_id'=>$unit_id])->get('unit_poin')->row_array();
            $data['poin'] += $prev_version['poin'];
            $data['redeem'] += $prev_version['redeem'];
            $this->db->where('unit_id', $unit_id)->update('unit_poin', $data);
        }
        return $data;
    }
}
