<?php
class Grup extends CMS_Controller
{
    function __construct()
    {
        # code...
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }
    public function index()
    {
        redirect('grup/grid');
    }
    public function grid()
    {
        //$data = $crud->render();

        $view_config = array(
            'title' => 'Grup'
        );

  //
 
       // print_r($output);
        $this->view('grid', $data, 'navi', $view_config);
    }

    public function table_ajax()
    {
        /*
        {"data":[],"draw":0,"recordsTotal":178,"recordsFiltered":178}
        */
        $iTotalRecords = $this->db->count_all('main_group');
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $status_list = array("danger","success" );
        $status_txt = array("Inaktif","Aktif" );
        $records = array();
        $records["data"] = array();
        
        $rs = $this->db->select('group_id,group_name,description,status')->get('main_group')->result_array();
        $i=$iDisplayStart;
        foreach ($rs as $r) {
            $row = array(
            '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$r['group_id'].'"/><span></span></label>');
            $status = $r['status'];
            unset($r['status']);
            $row=array_merge($row, array_values($r), array('<span class="label label-sm label-'.($status_list[$status]).'">'.($status_txt[$status]).'</span>',
            '<a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-pencil"></i> Edit</a>'));
      
            $records["data"][] = $row;
        }
        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
            $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }
}
