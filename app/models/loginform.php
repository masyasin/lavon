<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginForm extends CI_Model {
    
    public $tableName 		= 'main_user';
    public $tableUserModule = 'ap_usermodule';
    public $tableUserRule 	= 'ap_userrule';
    public $tableRule 		= 'main_group';
    public $tableRuleModule = 'ap_rulemodule';
    public $tableModule 	= 'ap_module';
    
    private $controller;
    private $_userData = array();

    public function __construct() {
        parent::__construct();
        $this->controller =& get_instance();
    }
    
    public function validate() {
        $this->controller->form_validation->set_rules('username', 'username', array( 'trim', 'required', 
            array('user_login_validate_callable', array($this, 'user_login_validate'))
        ));
        $this->controller->form_validation->set_rules('password', 'password', array( 'trim', 'required', 
            array('password_validate_callable', array($this, 'password_validate'))
        ));
        return $this->controller->form_validation->run();
    }
    
    public function user_login_validate($value) {
        if(!$this->getUser($value)) {
            $this->controller->form_validation->set_message('user_login_validate_callable', 'Invalid {field} <a href="'.site_url('resetpwd').'">Lost your password?</a>');
            return FALSE;
        }
        return TRUE;
    }
    
    public function password_validate($value) {
        if($this->getUser()) {
            $pwd = $this->controller->encrypt->decode($this->_userData['password_hash'], $this->_userData['auth_key']);
            if($pwd != $value) {
                $this->controller->form_validation->set_message('password_validate_callable', 'Invalid {field} <a href="'.site_url('resetpwd').'">Lost your password?</a>');
                return FALSE;
            }
        }
        return TRUE;
    }
    
    public function getUserById($getID) {
        if(!$getID) {
            return array();
        }
        return $this->db->select()->get_where($this->tableName, array('id' => $getID))->row_array();
    }
    
    public function getUser($getID='') {
        if(!$getID) {
            return $this->_userData;
        }
        $this->_userData = $this->db->select()->get_where($this->tableName, array('username' => strtolower($getID), 'status'=>1, 'trash'=>0))->row_array();
        return $this->_userData;
    }
    
    public function getIdentity($getID) {
        return $this->db->select()->get_where($this->tableName, array('id' => $getID, 'status'=>1, 'trash'=>0))->row();
    }
    
    public function checkModuleStatus($module='') {
        return ($this->db->limit(1)->get_where($this->tableModule, array('id'=>$module, 'status'=>1))->num_rows() === 0) ? FALSE : TRUE;
    }
    
    public function checkUserAuth($userId=0, $module='', $field='read') {
        return ($this->db->limit(1)->get_where($this->tableUserModule, array('user' => $userId, 'module'=>$module, $field=>1))->num_rows() === 0) ? FALSE : TRUE;
    }
    
    public function checkRuleAuth($userId=0, $module='', $field='read') {
        $hasAuth = FALSE;
        $rows = $this->db->select()->get_where($this->tableUserRule, array('user' => $userId))->result_array();
        if($rows) {
            foreach ($rows as $key => $value) {
                $status = ($this->db->limit(1)->get_where($this->tableRule, array('group_id'=>$value['rule'], 'status'=>1, 'trash'=>0))->num_rows() === 0) ? FALSE : TRUE;
                if(!$status)
                    continue;
                
                $hasAuth = ($this->db->limit(1)->get_where($this->tableRuleModule, array('rule' => $value['rule'], 'module'=>$module, $field=>1))->num_rows() === 0) ? FALSE : TRUE;
                if($hasAuth) {
                    break;
                }
            }
        } else {
            $defaultRole = get_option('general_default_group');
            $defaultRole = is_numeric($defaultRole) ? $defaultRole : 0;
            $status = ($this->db->limit(1)->get_where($this->tableRule, array('group_id'=>$defaultRole, 'status'=>1, 'trash'=>0))->num_rows() === 0) ? FALSE : TRUE;
            if($status) {
                $hasAuth = ($this->db->limit(1)->get_where($this->tableRuleModule, array('rule' => $defaultRole, 'module'=>$module, $field=>1))->num_rows() === 0) ? FALSE : TRUE;
            }
        }
        return $hasAuth;
    }
    
}