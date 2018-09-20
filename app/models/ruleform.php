<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RuleForm extends CI_Model {
    
    public $controller;
    public $tableName 		= 'main_group';
    public $tableRuleModule = 'ap_rulemodule';
    public $tableLayanan	= 'bkpp_layanan';
    public $rowPerPage 		= 50;
    public $ttlRows 		= 0;
    
    public function __construct() {
        parent::__construct();
        if($this->config->item('tableRowPerPage')) {
            $this->rowPerPage = $this->config->item('tableRowPerPage');
        }
        $this->controller =& get_instance();
    }
    
    public function validate() {
        $this->controller->form_validation->set_rules('name', 'group name', array(
            'trim', 
            'required', 
            'min_length[1]', 
            'max_length[255]'
        ));
        return $this->controller->form_validation->run();
    }
    
    public function getRowByID($getID) {
        if(!$getID) {
            return array();
        }
        return $this->db->select()->get_where($this->tableName, array('group_id' => $getID))->row_array();
    }
    
	public function getAllLayanan() {

        return $this->db->select()
                        ->get($this->tableLayanan)
                        ->result_array();
    }
	
    public function getPrivilegeAccess($getID) {
        if(!$getID) {
            return array();
        }
        
        return $this->db->select('module, read, insert, update, remove, publish')
                ->get_where($this->tableRuleModule, array('rule' => $getID))
                ->result_array();
    }
    
    public function getTotalRows($reset=TRUE) {
        if(!$reset)
            return $this->ttlRows;
        
        $getView = trim($this->controller->input->get('view', TRUE));
        $getSearch = trim($this->controller->input->get('search', TRUE));
        
        if($getView) {
            switch ($getView) {
                case 'enable':
                    $this->db->where('status', 1);
                    $this->db->where('trash', 0);
                    break;
                case 'disable':
                    $this->db->where('status', 0);
                    $this->db->where('trash', 0);
                    break;
                case 'trash':
                    $this->db->where('trash', 1);
                    break;
                default:
                    $this->db->where('trash', 0);
                    break;
            }
        }
        
        if($getSearch) {
            $this->db->like('name', $getSearch);
        }
        
        $this->db->from($this->tableName);
        $this->ttlRows = $this->db->count_all_results();
        return $this->ttlRows;
    }
    
    public function getTotalStatus($value='all') {
        $getSearch = trim($this->controller->input->get('search', TRUE));
        switch ($value) {
            case 'enable':
                $this->db->where('status', 1);
                $this->db->where('trash', 0);
                break;
            case 'disable':
                $this->db->where('status', 0);
                $this->db->where('trash', 0);
                break;
            case 'trash':
                $this->db->where('trash', 1);
                break;
            default:
                $this->db->where('trash', 0);
                break;
        }
        
        if($getSearch) {
            $this->db->like('name', $getSearch);
        }
        $this->db->from($this->tableName);
        return $this->db->count_all_results();
    }
    
    public function getPage() {
        $getPage = trim($this->controller->input->get('page', TRUE));
        return $getPage ? (is_numeric($getPage) ? $getPage : 0) : 0;
    }
    
    public function getFetchData() {
        $getView = trim($this->controller->input->get('view', TRUE));
        $getSearch = trim($this->controller->input->get('search', TRUE));
        $getSort = json_decode(trim($this->controller->input->get('sort', TRUE)), TRUE);
        
        if($getView) {
            switch ($getView) {
                case 'enable':
                    $this->db->where('status', 1);
                    $this->db->where('trash', 0);
                    break;
                case 'disable':
                    $this->db->where('status', 0);
                    $this->db->where('trash', 0);
                    break;
                case 'trash':
                    $this->db->where('trash', 1);
                    break;
                default:
                    $this->db->where('trash', 0);
                    break;
            }
        }
        
        if($getSearch) {
            $this->db->like('name', $getSearch);
        }
        
        $this->db->from($this->tableName);
        $this->db->limit($this->rowPerPage, $this->getPage());
        
        if($getSort) {
            foreach ($getSort as $key => $value) {
                if(!in_array($key, array('name')))
                        continue;
                
                if(!in_array($value, array('asc', 'desc')))
                        continue;
                
                $this->db->order_by($key, $value);
            }
        }
        
        return $this->db->get()->result_array();
    }
    
    public function bulkAction($action='', $postid=array()) {
        switch ($action) {
            case 'enable':
                $this->db->set('status', 1);
                $this->db->where_in('group_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'disable':
                $this->db->set('status', 0);
                $this->db->where_in('group_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'trash':
                $this->db->set('trash', 1);
                $this->db->where_in('group_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'restore':
                $this->db->set('trash', 0);
                $this->db->where_in('group_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'delete':
                $this->db->where_in('group_id', $postid);
                $this->db->delete($this->tableName);
                break;
        }
    }
    
    public function getAllRules() {
        $this->db->where('trash', 0);
        $this->db->order_by('group_name asc');
        $this->db->from($this->tableName);
        return $this->db->get()->result_array();
    }
    
}