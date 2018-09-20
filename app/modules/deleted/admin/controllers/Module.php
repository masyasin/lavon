<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CMS_Controller {

    public $moduleName = 'tools_module';
    
    public function index() {
        // $this->session->isLogin(TRUE);
        if(!$this->checkRead($this->moduleName))
            show_404 ();
        //$this->cms_guard_page('main_navigation_management');
        $this->load->model('ModuleForm');
        $this->load->library('pagination');

        if ($this->input->post()) {
            $action = trim($this->input->post('action', TRUE));
            $checked = trim($this->input->post('table_records', TRUE));
            $postID = $this->input->post('id', TRUE);
            if (in_array($action, array('delete', 'disable', 'enable')) && $checked == 'on' && $postID) {
                
                if(in_array($action, array('disable', 'enable'))) {
                    if(!$this->session->checkUpdate())
                        show_404 ();
                } else if(!$this->session->checkDelete()) {
                    show_404 ();
                }
                
                $this->ModuleForm->bulkAction($action, $postID);
                $this->session->set_flashdata('success', 'Your module has been ' . $action);
            }

			
			redirect(current_url() . ($_GET ? '?' . http_build_query($_GET) : ''));
			
        }

        $config = include APPPATH . 'config/pagging.php';
        $config ['total_rows'] = $this->ModuleForm->getTotalRows();
        $this->pagination->initialize($config);

        $this->view('admin/admin_view_container', array(
            'headVars' => array(
                'pageTitle' => 'Module Management',
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
            'viewFile' => 'admin/module/index',
            'viewVars' => array(
                'model' => $this->ModuleForm,
                'pagging' => $this->pagination->create_links()
            )
        ),'main_navigation_management',array(
            'layout' => 'management'
        ));
		
		
    }

    public function form() {
       // $this->session->isLogin(TRUE);
       // $this->session->setCheckModule($this->moduleName);
        if(!$this->checkInsert() && !$this->checkUpdate())
            show_404 ();
        $this->load->model('ModuleForm');
        $getID = trim($this->input->get('sid', TRUE));
        $dataRow = $this->ModuleForm->getRowByID($getID);
        $actions = array('read' => 0, 'insert' => 0, 'update' => 0, 'remove' => 0,'publish'=>0);

        if ($this->input->post()) {
            if ($this->ModuleForm->validate() == TRUE) {
                $attributes = array_merge($this->input->post(), array_diff_key($actions, $this->input->post()));
                if (!$getID /* && $this->checkInsert() */) {
                    $this->ModuleForm->db->insert($this->ModuleForm->tableName, $attributes);
                    //$this->session->set_flashdata('success', 'Your new module has been saved');
                } elseif ($this->checkUpdate()) {
                    $this->ModuleForm->db->update($this->ModuleForm->tableName, $attributes, array('id' => $getID));
                   // $this->session->set_flashdata('success', 'Your module has been updated');
                } else {
                    show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
                }
				
                redirect(current_url() . ($dataRow ? '?' . http_build_query($_GET) : ''));
            }
        } elseif ($getID) {
            if ($dataRow) {
                $_POST = $dataRow;
            } else {
                redirect(current_url());
            }
        }
		
		$this->view('admin/admin_view_container', array(
            'headVars' => array('pageTitle' => 'Module Management'),
            'viewFile' => 'admin/module/form',
            'viewVars' => array('dataRow' => $dataRow,'table'=>$this->db->list_tables(),'model' => $this->ModuleForm,'controller'=>$this)
        ),'main_navigation_management',array(
            'layout' => 'management'
        ));
    }
	
	

}
