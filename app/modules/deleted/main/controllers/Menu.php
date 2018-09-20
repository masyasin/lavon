<?php 
class Menu extends CMS_Controller{
	public $moduleName = 'tools_admin_menu';
    
    public function index() {
		if(!$this->checkRead($this->moduleName))
            show_404 ();
		
        $this->view('main/main_navigation_admin', array(
            'headVars' => array(
                'pageTitle' => 'Menu Management',
                'css' => array(
                    base_url().'public/assets/addons/spinners.css',
                    base_url().'public/assets/vendors/toastr/toastr.min.css',
                    base_url().'public/assets/vendors/chosen/css/bootstrap-chosen.css',
                    base_url().'public/assets/vendors/jquery-nestable/nestable.css?'.date("YmdHis"),
                )
            ),
            'scriptVars' => array(
                'js' => array(
                   base_url().'public/assets/vendors/chosen/js/chosen.jquery.js',
                   base_url().'public/assets/vendors/toastr/toastr.min.js',
                   base_url().'public/assets/vendors/jquery-nestable/jquery.nestable.js',
                   base_url().'public/assets/plugins/bower_components/icheck/icheck.min.js',
                  
                ),
				'mod_js'=>array(
					'scripts/admin.menu.js?'.date("YmdHis")
				)
            ),
            'viewFile' => 'main/menu/index',
            'viewVars' => array( 'nestableOutput' => $this->getNestableMenu() )
        ),'main_navigation_management',array(
            'layout' => 'management'
        ));
    }

    public function form() {
        //$this->session->setCheckModule($this->moduleName);
        if(!$this->checkInsert($this->moduleName) && !$this->checkUpdate($this->moduleName))
            show_404 ();

        $this->load->model('ModuleForm');
        $this->load->model('MenuForm');

        $isValidation = FALSE;
        $getID = trim($this->input->post('id', TRUE));
        $dataRow = $this->MenuForm->getRowByID($getID);

        if ($this->input->post()) {
            $isValidation = TRUE;
            if ($this->MenuForm->validate() == TRUE) {
                $attributes = $this->input->post();
                unset($attributes['id']);
                $attributes['module'] = $attributes['module'] ? $attributes['module'] : null;

                if (!$getID) {
                    $this->MenuForm->db->insert($this->MenuForm->tableName, $attributes);
                    $getID = $this->ModuleForm->db->insert_id();
                } else {
                    $this->MenuForm->db->update($this->MenuForm->tableName, $attributes, array('id' => $getID));
                }

                $_POST['id'] = $getID;
                $this->MenuForm->setMenuModule($getID, $attributes['prn'], ($attributes['module'] ? $attributes['module'] : null));
            }
        } else {
            $maxsort = $this->MenuForm->getMaxSort() + 1;
            $attributes = array('prn' => 0, 'sort' => $maxsort, 'name' => 'Menu ' . $maxsort);
            $this->MenuForm->db->insert($this->MenuForm->tableName, $attributes);
            $attributes['id'] = $this->ModuleForm->db->insert_id();
            $_POST = $attributes;
        }

        $dataModules = $this->ModuleForm->getActiveModule();
        $this->load->view('main/menu/dditem', array(
            'isValidation' => $isValidation,
            'dataModules' => $dataModules,
            'dataRow' => $dataRow
        ));
    }

    public function sort() {
       // $this->session->isLogin(TRUE);
        if (!$this->input->is_ajax_request() || !$this->input->post() || !$this->checkUpdate($this->moduleName))
            show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");
        
        $this->load->model('MenuForm');
        $sort = json_decode($this->input->post('sort'), true);
        $this->MenuForm->nestableSort($sort);
        exit;
    }

    public function remove() {
       // $this->session->isLogin(TRUE);
        if (!$this->input->is_ajax_request() || !$this->input->post() || !$this->checkDelete($this->moduleName))
            show_error("Anda tidak bisa mengakses halaman ini...,harap hubungi Administrator",403,"RESTRICTED AREA");

        $this->load->model('MenuForm');
        $getID = trim($this->input->post('id', TRUE));
        $this->MenuForm->deleteTreeChild($getID);
        exit;
    }
    
    public function getNestableMenu($parentId=0) {
        $this->load->model('ModuleForm');
        $this->load->model('MenuForm');
        
        $html = '';
        $dataModules = $this->ModuleForm->getActiveModule();
        foreach ($this->MenuForm->getRowsMenuByParent($parentId) as $key => $value) {
            $viewParams = array( 'isValidation' => FALSE, 'dataModules' => $dataModules, 'dataRow' => $value, 'dataFetch' => TRUE );
            $_POST = $value;
            $html .= $this->load->view('main/menu/dditem', $viewParams, TRUE);
        }
        return $html;
    }
	
}