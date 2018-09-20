<?php

/**
* 
*/
class Download_m extends CMS_Model
{

	private $tableName = "bkpp_download";

	function update($attributes,$where){
		return $this->db->update($this->tableName,$attributes,$where);
	}
}