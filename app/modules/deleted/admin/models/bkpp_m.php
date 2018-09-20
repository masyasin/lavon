<?php 
class Bkpp_m extends CI_Model{
	
	private $tableKonsultasi = "bkpp_konsultasi";
	
	function updateKonsultasi($attributes,$where){
		return $this->db->update($this->tableKonsultasi,$attributes,$where);
	}
}