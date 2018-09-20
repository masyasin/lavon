<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CMS_Controller {

    public $moduleName = 'tools_user';
    
    public function index() {
        if(!$this->checkRead($this->moduleName))
            show_404 ();
        
        $this->load->model('RuleForm');
        $this->load->model('UserForm');
        $this->load->library('pagination');

        if ($this->input->post()) {
            $action = trim($this->input->post('action', TRUE));
            $checked = trim($this->input->post('table_records', TRUE));
            $postID = $this->input->post('id', TRUE);
            if (in_array($action, array('delete', 'disable', 'enable', 'trash', 'restore')) && $checked == 'on' && $postID) {
                
                if(in_array($action, array('disable', 'enable', 'trash', 'restore'))) {
                    if(!$this->session->checkUpdate())
                        show_404 ();
                } else if(!$this->session->checkDelete()) {
                    show_404 ();
                }
                
                $this->UserForm->bulkAction($action, $postID);
                $this->session->set_flashdata('success', 'Your user has been ' . ($action == 'trash' ? 'move to ' . $action : $action));
            }
            redirect(current_url() . ($_GET ? '?' . http_build_query($_GET) : ''));
        }

        $config = include APPPATH . 'config/pagging.php';
        $config ['total_rows'] = $this->UserForm->getTotalRows();
        $this->pagination->initialize($config);
		
		$this->view('admin/admin_view_container', array(
            'headVars' => array(
                'pageTitle' => 'User',
                'css' => array(
					site_url() . 'public/assets/vendors/chosen/css/bootstrap-chosen.css',
					site_url() . 'public/assets/plugins/bower_components/icheck/skins/all.css',
					site_url() . 'public/assets/plugins/bower_components/custom-select/custom-select.css',
					site_url() . 'public/assets/plugins/bower_components/tables/tables.css'
                )
            ),
            'scriptVars' => array(
                'js' => array(
					site_url() . 'public/assets/vendors/chosen/js/chosen.jquery.js',
					site_url() . 'public/assets/plugins/bower_components/icheck/icheck.min.js',
					site_url() . 'public/assets/plugins/bower_components/icheck/icheck.init.js',
					site_url() . 'public/assets/plugins/bower_components/custom-select/custom-select.min.js',
					site_url() . 'public/assets/plugins/bower_components/tables/tables.js'
                )
            ),
            'viewFile' => 'admin/users/index',
            'viewVars' => array(
                'model' => $this->UserForm,
                'pagging' => $this->pagination->create_links(),
                'userGroups' => $this->RuleForm->getAllRules(),
                'controller' => $this,
            )
        ),'main_navigation_management',array(
            'layout' => 'management'
        ));
		
		
    }

    public function form() {
        if(!$this->checkRead($this->moduleName))
            show_404 ();
        
        $this->load->model('ModuleForm');
        $this->load->model('UserForm');
        $this->load->model('RuleForm');

        $getID = trim($this->input->get('sid', TRUE));
        $dataRow = $this->UserForm->getRowByID($getID);

        if ($this->input->post()) {
            if ($this->UserForm->validate('cms') == TRUE) {
                $attributes = array(
                    'email' => strtolower($this->input->post('email')),
                    'user_name' => strtolower($this->input->post('user_name')),
                    'real_name' => strtolower($this->input->post('real_name')),
                    'active' => $this->input->post('active')
                );

                $password = trim($this->input->post('password'));
                /* if ($password) {
                    $authkey = generateAuthKey();
                    $attributes = array_merge($attributes, array('auth_key' => $authkey, 'password_hash' => $this->encrypt->encode($password, $authkey)));
                } */

                if (!$getID && $this->checkInsert()) {
					if ($password) {
						 $attributes['password'] = md5($password);
					} 
                    $this->UserForm->db->insert($this->UserForm->tableName, $attributes);
                    $getID = $this->UserForm->db->insert_id();
                    $this->session->set_flashdata('success', 'Your new user has been saved');
                } elseif ($this->checkUpdate()) {
                    $this->UserForm->db->update($this->UserForm->tableName, $attributes, array('user_id' => $getID));
                    $this->session->set_flashdata('success', 'Your user has been updated');
                } else {
                    show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
                }

                $this->db->where('user', $getID);
                $this->db->delete($this->UserForm->tableUserRule);
                if ($this->input->post('groups')) {
                    foreach ($this->input->post('groups') as $key => $value) {
                        $attr = array();
                        $attr['user'] = $getID;
                        $attr['rule'] = $value;
                        $this->UserForm->db->insert($this->UserForm->tableUserRule, $attr);
                    }
                }

                $this->db->where('user', $getID);
                $this->db->delete($this->UserForm->tableUserModule);
                if ($this->input->post('module')) {
                    foreach ($this->input->post('module') as $key => $value) {
                        $value['user'] = $getID;
                        $value['module'] = $key;
                        $this->UserForm->db->insert($this->UserForm->tableUserModule, $value);
                    }
                }

                redirect(current_url() . ($_GET ? '?' . http_build_query($_GET) : ''));
            }
        } elseif ($getID) {
            if ($dataRow) {

                $dataRow['module'] = array();
                foreach ($this->UserForm->getPrivilegeAccess($getID) as $key => $value) {
                    $modName = $value['module'];
                    unset($value['module']);
                    $dataRow['module'][$modName] = $value;
                }

                $dataRow['groups'] = array();
                foreach ($this->UserForm->getGroups($getID) as $key => $value) {
                    $dataRow['groups'][] = $value['rule'];
                }

                $_POST = $dataRow;
            } else {
                redirect(current_url());
            }
        } elseif (!$this->checkInsert()) {
            show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
        }
		
		$this->view('admin/admin_view_container', array(
            'headVars' => array(
                'pageTitle' => 'Users',
                'css' => array(
					site_url() . 'public/assets/vendors/chosen/css/bootstrap-chosen.css',
					site_url() . 'public/assets/plugins/bower_components/icheck/skins/all.css',
					site_url() . 'public/assets/plugins/bower_components/custom-select/custom-select.css',
					site_url() . 'public/assets/plugins/bower_components/tables/tables.css'
                )
            ),
            'scriptVars' => array(
                'js' => array(
					site_url() . 'public/assets/vendors/chosen/js/chosen.jquery.js',
					site_url() . 'public/assets/plugins/bower_components/icheck/icheck.min.js',
					site_url() . 'public/assets/plugins/bower_components/icheck/icheck.init.js',
					site_url() . 'public/assets/plugins/bower_components/custom-select/custom-select.min.js',
					site_url() . 'public/assets/plugins/bower_components/tables/tables.js'
                ),
				'mod_js'=>array(
					'scripts/setting.user.js?'.date("YmdHis")
				)
            ),
            'viewFile' => 'admin/users/form',
            'viewVars' => array(
                'model' 			=> $this->UserForm,
                'activeModules' 	=> $this->ModuleForm->getActiveModule(),
                'groupModules' 		=> $this->RuleForm->getAllRules(),
                'selectGroups' 		=> $this->input->post('groups', array()),
                'controller' 		=> $this,
				'dataRow' 			=> $dataRow
            )
        ),'main_navigation_management',array(
            'layout' => 'management'
        ));
		
		
		
    }

}
