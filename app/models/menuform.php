<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MenuForm extends CI_Model {

    public $controller;
    public $tableName = 'ap_menu';
    public $tableMenuModule = 'ap_menumodule';
    
    public function __construct() {
        parent::__construct();
        $this->controller =& get_instance();
    }
    
    public function validate() {
        $this->controller->form_validation->set_rules('name', 'menu name', array( 'trim',  'required',  'min_length[1]', 'max_length[255]' ));
        $this->controller->form_validation->set_rules('position', 'position', array( 'trim' ));
        $this->controller->form_validation->set_rules('route', 'route', array( 'trim' ));  
        $this->controller->form_validation->set_rules('route_target', 'route target', array( 'trim' ));
        $this->controller->form_validation->set_rules('module', 'module access', array( 'trim' ));  
        $this->controller->form_validation->set_rules('icon', 'font icon', array( 'trim' ));  
        return $this->controller->form_validation->run();
    }
    
    public function getRowByID($getID) {
        if(!$getID) {
            return array();
        }
        return $this->db->select()->get_where($this->tableName, array('id' => $getID))->row_array();
    }
        
    public function getMaxSort($parentId=0) {
        $this->db->select_max('sort');
        $this->db->where('prn', $parentId);
        $this->db->from($this->tableName);
        $row = $this->db->get()->row_array();
        return $row['sort'];
    }
    
    public function nestableSort($sortData=array(), $parent=0) {
        if($sortData) {
            foreach($sortData as $key=>$value) {
                $this->db->update($this->tableName, array('prn'=>$parent, 'sort'=>$key), array('id'=>$value['id']));
                $row = $this->db->select()->get_where($this->tableName, array('id' => $parent))->row_array();
                if($row)
                    $this->setMenuModule ($row['id'], $row['prn'], $row['module']);
                
                if(isset($value['children'])) {
                    if($value['children']) {
                        $this->nestableSort($value['children'], $value['id']);
                    }
                }
            }
        }
    }
    
    public function setMenuModule($menuId=null, $parentId=null, $moduleId=null) {
        $row = $this->db->select()->get_where($this->tableMenuModule, array('menu' => $menuId, 'carrier'=>$menuId))->row_array();
        if($row)
            $this->db->delete($this->tableMenuModule, array('menu'=>$menuId, 'carrier'=>$menuId));
        
        if($moduleId)
            $this->db->insert($this->tableMenuModule, array('menu'=>$menuId, 'module'=>($moduleId ? $moduleId : null), 'carrier'=>$menuId));
        
        if($parentId)
            $this->_setMenuModule($parentId, ($row['module'] ? $row['module'] : null), ($moduleId ? $moduleId : null), $menuId);
    }
    
    protected function _setMenuModule($menuId=null, $oldModuleId=null, $newModuleId=null, $carrier=null ) {
        if(!$menuId) return;
        
        $this->db->delete($this->tableMenuModule, array('menu'=>$menuId, 'module'=>$oldModuleId, 'carrier'=>$carrier));
        if($newModuleId)
            $this->db->insert($this->tableMenuModule, array('menu'=>$menuId, 'module'=>($newModuleId ? $newModuleId : null), 'carrier'=>$carrier));
        
        $row = $this->db->select()->get_where($this->tableName, array('id' => $menuId))->row_array();
        if($row)
            $this->_setMenuModule($row['prn'], $oldModuleId, $newModuleId, $carrier);
    }
    
    public function getRowsMenuByParent($parentId=0) {
        $this->db->from($this->tableName);
        $this->db->where(array('prn' => $parentId));
        $this->db->order_by('sort', 'asc');
        $this->db->order_by('name', 'asc');
        return $this->db->get()->result_array();
    }
        
    public function getAdminLeftMenu($prn=0) {
        $defaultRole = get_option('general_default_group');
        $defaultRole = is_numeric($defaultRole) ? $defaultRole : 0;
        $sql = "SELECT * FROM (
                    SELECT 
                        a.id, a.name, a.icon, a.route, a.route_target, a.sort
                    FROM 
                        ap_menu a
                        INNER JOIN ap_menumodule b ON a.id=b.menu
                        INNER JOIN ap_module c ON b.module=c.id
                        INNER JOIN ap_rulemodule d ON c.id=d.module
                        INNER JOIN main_group e ON d.rule = e.group_id
                        INNER JOIN ap_userrule f ON f.rule = e.group_id
                        LEFT JOIN ap_menu g ON g.prn = a.id 
                    WHERE
                        a.status=1
                        AND c.status=1
                        AND e.status=1
                        AND e.trash=0
                        AND d.read=1
                        AND a.position = 'LEFT_SIDEBAR'
                        ".($prn ? " AND a.prn=".$prn : " AND (a.prn  = 0 OR a.prn IS NULL)" )." 
                        AND f.user=". $this->session->userdata("cms_user_id") ." 
                    UNION	
                    SELECT 
                        a.id, a.name, a.icon, a.route, a.route_target, a.sort
                    FROM 
                        ap_menu a
                        INNER JOIN ap_menumodule b ON a.id=b.menu
                        INNER JOIN ap_module c ON b.module=c.id
                        INNER JOIN ap_usermodule d ON c.id=d.module
                        LEFT JOIN ap_menu e ON e.prn = a.id 
                    WHERE
                        a.status=1
                        AND c.status=1
                        AND d.read=1
                        AND a.position = 'LEFT_SIDEBAR'
                        ".($prn ? " AND a.prn=".$prn : " AND (a.prn  = 0 OR a.prn IS NULL)" )." 
                        AND d.user=".$this->session->userdata("cms_user_id")." 
            ) as tmp_table
            GROUP BY
                id, name, icon, route, route_target, sort
            ORDER BY
                sort asc, name asc";
        $return = $this->db->query($sql)->result_array();
		
        if($return)
            return $return;
        
        $sql = "SELECT * FROM (
                    SELECT 
                        a.id, a.name, a.icon, a.route, a.route_target, a.sort
                    FROM 
                        ap_menu a
                        INNER JOIN ap_menumodule b ON a.id=b.menu
                        INNER JOIN ap_module c ON b.module=c.id
                        INNER JOIN ap_rulemodule d ON c.id=d.module
						INNER JOIN main_group e ON d.rule = e.group_id
                        LEFT JOIN ap_menu g ON g.prn = a.id 
                    WHERE
                        a.status=1
                        AND c.status=1
                        AND e.status=1
                        AND e.trash=0
                        AND d.read=1
                        AND a.position = 'LEFT_SIDEBAR' 
                        AND e.group_id=". $defaultRole ."
                        ".($prn ? " AND a.prn=".$prn : " AND (a.prn  = 0 OR a.prn IS NULL)" )." 
            ) as tmp_table
            GROUP BY
                id, name, icon, route, route_target, sort
            ORDER BY
                sort asc, name asc";
        return $this->db->query($sql)->result_array();
    }
    
    public function deleteTreeChild($id=0) {
        $this->db->delete($this->tableName, array('id' => $id));
        $rows = $this->db->select()->get_where($this->tableName, array('prn' => $id))->result_array();
        foreach ($rows as $key => $value) {
            $this->deleteTreeChild($value['id']);
        }
    }
    
}
