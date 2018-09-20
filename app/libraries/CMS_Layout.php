<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CMS_Layout
{
	private $ci;
	
	public function __construct()
    {
        $this->ci =& get_instance();
    }
	
	public function admin_menu($prn = 0, $typeMenu = 'menu_section', $showHome = false){

		$this->ci->load->library('Template');
		$this->ci->load->model('MenuForm');
		$this->ci->load->model('ModuleForm');
		

        $leftNavHtml = '';
        if ($prn) {
            $dataRows = $this->ci->MenuForm->getAdminLeftMenu($prn);
			
            if ($dataRows) {
                $params = array('typeMenu' => $typeMenu, 'showHome' => $showHome, 'dataRows' => $dataRows);
                $leftNavHtml .=  $this->ci->template->load_view('partials/management/left-menu',$params);

            }
        } else {
            //$leftNavHtml = '<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">';
            foreach ($this->ci->MenuForm->getAdminLeftMenu($prn) as $key => $value) {
                $params = array('typeMenu' => $typeMenu, 'showHome' => (!$key ? true : $showHome), 'dataRow' => $value);
                $leftNavHtml .=  $this->ci->template->load_view('partials/management/left-menu',$params);
				
            }
            //$leftNavHtml .= '</div>';
        }
        return $leftNavHtml;
	}
	
}