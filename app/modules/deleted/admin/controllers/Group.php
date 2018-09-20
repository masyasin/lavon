<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CMS_Controller {
    
    public $moduleName = 'tools_group';
    
    public function index() {
        if(!$this->checkRead($this->moduleName))
            show_404 ();
        
        $this->load->model('RuleForm');
        $this->load->library('pagination');

        if ($this->input->post()) {
            $action = trim($this->input->post('action', TRUE));
            $checked = trim($this->input->post('table_records', TRUE));
            $postID = $this->input->post('id', TRUE);
            if (in_array($action, array('delete', 'disable', 'enable', 'trash', 'restore')) && $checked == 'on' && $postID) {
                
                if(in_array($action, array('disable', 'enable', 'trash', 'restore'))) {
                    if(!$this->checkUpdate())
                        show_404 ();
                } else if(!$this->session->checkDelete()) {
                    show_404 ();
                }
                
                $this->RuleForm->bulkAction($action, $postID);
                $this->session->set_flashdata('success', 'Your user group has been ' . ($action == 'trash' ? 'move to ' . $action : $action));
            }
            redirect(current_url() . ($_GET ? '?' . http_build_query($_GET) : ''));
        }

        $config = include APPPATH . 'config/pagging.php';
        $config ['total_rows'] = $this->RuleForm->getTotalRows();
        $this->pagination->initialize($config);
		
		$this->view('admin/admin_view_container', array(
            'headVars' => array(
                'pageTitle' => 'Groups',
                'css' => array(
					site_url() . 'public/assets/vendors/chosen/css/bootstrap-chosen.css',
					site_url() . 'public/assets/plugins/bower_components/icheck/skins/all.css',
					site_url() . 'public/assets/plugins/bower_components/tables/tables.css'
                )
            ),
            'scriptVars' => array(
                'js' => array(
					site_url() . 'public/assets/vendors/chosen/js/chosen.jquery.js',
					site_url() . 'public/assets/plugins/bower_components/icheck/icheck.min.js',
					site_url() . 'public/assets/plugins/bower_components/icheck/icheck.init.js',
					site_url() . 'public/assets/plugins/bower_components/tables/tables.js',
                )
            ),
            'viewFile' => 'admin/group/index',
            'viewVars' => array(
                'model' => $this->RuleForm,
                'pagging' => $this->pagination->create_links(),
				'controller'=>$this
            )
        ),'main_navigation_management',array(
            'layout' => 'management'
        ));
		
    }

    public function form() {
        if(!$this->checkRead($this->moduleName))
            show_404 ();
        
        $this->load->model('ModuleForm');
        $this->load->model('RuleForm');

        $getID = trim($this->input->get('sid', TRUE));
        $dataRow = $this->RuleForm->getRowByID($getID);

        if ($this->input->post()) {
            if ($this->RuleForm->validate() == TRUE) {
                $attributes = array(
                    'group_name' => $this->input->post('name'),
                    'status' => $this->input->post('status'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'modified_at' => date('Y-m-d H:i:s'),
                    'created_by' => $this->m_cms->cms_user_name(),
                    'modified_by' => $this->m_cms->cms_user_name()
                );
				
				$layanan = "";
				
				if(!empty($this->input->post('layanan'))){
					$post_layanan = $this->input->post('layanan');
					$layanan = implode(",",$post_layanan );
					$attributes['layanan'] = $layanan;
				}
				
				
                if (!$getID && $this->checkInsert()) {
                    $this->RuleForm->db->insert($this->RuleForm->tableName, $attributes);
                    $getID = $this->RuleForm->db->insert_id();
                    $this->session->set_flashdata('success', 'Your new user group has been saved');
                } elseif ($this->checkUpdate()) {
                    $this->RuleForm->db->update($this->RuleForm->tableName, $attributes, array('group_id' => $getID));
                    $this->session->set_flashdata('success', 'Your user group has been updated');
                } else {
                    show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
                }

                $this->db->where('rule', $getID);
                $this->db->delete($this->RuleForm->tableRuleModule);
                if ($this->input->post('module')) {
                    foreach ($this->input->post('module') as $key => $value) {
                        $value['rule'] = $getID;
                        $value['module'] = $key;
                        $this->RuleForm->db->insert($this->RuleForm->tableRuleModule, $value);
                    }
                }

                redirect(current_url() . ($dataRow ? '?' . http_build_query($_GET) : ''));
            }
        } elseif ($getID) {
            if ($dataRow) {

                $dataRow['module'] = array();
                foreach ($this->RuleForm->getPrivilegeAccess($getID) as $key => $value) {
                    $modName = $value['module'];
                    unset($value['module']);
                    $dataRow['module'][$modName] = $value;
                }
				
                $_POST = $dataRow;
            } else {
                redirect(current_url());
            }
        } 

		
		$this->view('admin/admin_view_container', array(
			'headVars' => array(
                'pageTitle' => 'Groups Management',
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
					site_url() . 'public/assets/plugins/bower_components/tables/tables.js',
                ),
				'mod_js'=>array(
					'scripts/setting.group.js?'.date("YmdHis")
				)
            ),
            'viewFile' => 'admin/group/form',
            'viewVars' => array('dataRow' 		=> $dataRow,
								'model' 		=> $this->RuleForm,
								'modelModules' 	=> $this->ModuleForm,
								'controller'	=> $this)
        ),'main_navigation_management',array(
            'layout' => 'management'
        ));
		
    }

}
