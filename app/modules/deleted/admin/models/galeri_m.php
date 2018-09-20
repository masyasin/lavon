<?php

class Galeri_m extends grocery_CRUD_Model
{
	
	function get_list()
    {
    	if($this->table_name === null)
    		return false;

    	$select = "`{$this->table_name}`.*";
    	// ADD YOUR SELECT FROM JOIN HERE, for example: <------------------------------------------------------
  		$select .= ", COUNT(bkpp_galery_image_items.id) jml_gbr";
    	//set_relation special queries
    	if(!empty($this->relation))
    	{
    		foreach($this->relation as $relation)
    		{
    			list($field_name , $related_table , $related_field_title) = $relation;
    			$unique_join_name = $this->_unique_join_name($field_name);
    			$unique_field_name = $this->_unique_field_name($field_name);

				if(strstr($related_field_title,'{'))
				{
					$related_field_title = str_replace(" ","&nbsp;",$related_field_title);
    				$select .= ", CONCAT('".str_replace(array('{','}'),array("',COALESCE({$unique_join_name}.",", ''),'"),str_replace("'","\\'",$related_field_title))."') as $unique_field_name";
				}
    			else
    			{
    				$select .= ", $unique_join_name.$related_field_title AS $unique_field_name";
    			}

    			if($this->field_exists($related_field_title))
    				$select .= ", `{$this->table_name}`.$related_field_title AS '{$this->table_name}.$related_field_title'";
    		}
    	}

    	//set_relation_n_n special queries. We prefer sub queries from a simple join for the relation_n_n as it is faster and more stable on big tables.
    	if(!empty($this->relation_n_n))
    	{
			$select = $this->relation_n_n_queries($select);
    	}

    	$this->db->select($select);
    	// ADD YOUR JOIN HERE for example: <------------------------------------------------------
  		$this->db->join('bkpp_galery_image_items',"bkpp_galery_image_items.galery_id = {$this->table_name}.id");
  		$this->db->group_by("{$this->table_name}.id");
    	$results = $this->db->get($this->table_name)->result();

    	return $results;
    }
	
	
	
}