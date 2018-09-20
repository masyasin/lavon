<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OptionForm extends CI_Model {
    
    public $tableName = 'main_config';
    private $controller;
    
    public function __construct() {
        parent::__construct();
        $this->controller =& get_instance();
    }
    
    public function validate($scenario='general') {
        switch ($scenario) {
            case 'general':
                $this->controller->form_validation->set_rules('general_admin_email', 'admin email', 'valid_emails');
                $this->controller->form_validation->set_rules('general_official_email', 'email address', 'valid_emails');
                break;
        }
        return $this->controller->form_validation->run();
    }
    
    public function getRowByOptionId($getID) {
        if(!$getID) {
            return array();
        }
        return $this->db->select()->get_where($this->tableName, array('config_name' => $getID))->row_array();
    }
    
}