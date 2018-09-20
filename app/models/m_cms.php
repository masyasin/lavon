<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cms extends CMS_Model{
	
	public function cms_group_layanan(){
        $query = $this->db->select('group_name,layanan')
            ->from(cms_table_name('main_group'))
            ->join(cms_table_name('ap_userrule'), cms_table_name('ap_userrule').'.rule = '.cms_table_name('main_group').'.group_id')
            ->where(cms_table_name('ap_userrule').'.user', $this->cms_user_id())
            ->get();
        $group_name = array();
        foreach($query->result() as $row){
            $group_name["group"][]   = $row->group_name;
            $group_name["layanan"][] = $row->layanan;
        }
        return $group_name;
	}
	
}