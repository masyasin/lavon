<?php
class Galeri_new_m extends CI_Model{
	private $tableName = "bkpp_galery_images";
	private $tableItem = "bkpp_galery_image_items";
	
	function update($attributes,$where){
		return $this->db->update($this->tableName,$attributes,$where);
	}
	
	function get_total_item($id){
		$this->db->where('galery_id', $id);
		$this->db->from($this->tableItem);
		return $this->db->count_all_results(); 
	}
	
}