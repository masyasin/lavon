<?php
/** application/libraries/MY_Form_validation **/ 
class MY_Form_validation extends CI_Form_validation 
{
    public $CI;
    public $_field_data         = array();
    public $_config_rules       = array();
    public $_error_array        = array();
    public $_error_messages     = array();
    public $_error_prefix       = '<p>';
    public $_error_suffix       = '</p>';
    public $error_string        = '';
    public $_safe_form_data     = FALSE;

    /**
     * Is Unique
     *
     * Check if the input value doesn't already exist
     * in the specified database field.
     *
     * @param   string
     * @param   string  field
     * @return  bool
     */
    public function is_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.]', $table, $field);
        if ($this->CI->db !== NULL)
        {
            $query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
            return $query->num_rows() === 0;
        }
        return FALSE;
    }

    public function valid_url($url)
    {
        $pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
        return (bool) preg_match($pattern, $url);
    }
	public function whitespace($value) {
        if($value) {
            if(COUNT(explode(' ', trim($value)))>=2) {
                $this->set_message('whitespace', 'The {field} can not contain whitespace');
                return FALSE;
            }
            return TRUE;
        }
        
        $this->set_message('whitespace', 'The {field} field is required.');
        return FALSE;
    }
    
    public function is_serialized($value) {
        if($value) {
            if((@unserialize($value) == false)) {
                $this->set_message('is_serialized', 'The {field} field not serialized.');
                return FALSE;
            }
            return TRUE;
        }
        
        $this->set_message('is_serialized', 'The {field} field not serialized.');
        return FALSE;
    }
    
    public function getFieldData() {
        return $this->_field_data;
    }
}