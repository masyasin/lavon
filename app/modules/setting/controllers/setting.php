<?php
class Setting extends CMS_Controller
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
        redirect('setting/grid');
    }

    public function grid()
    {
        
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_subject('Config');
        $crud->set_theme('datatables');
        $crud->display_as('config_name', 'Title');
        $crud->display_as('description', 'Keterangan');
        // $crud->set_relation('id_tenan', 'm_tenan', 'nama');
        $crud->columns('config_name', 'value', 'description');
        $crud->set_table('main_config');
        $crud->unset_read();
        $crud->field_type('description', 'text');
        // $crud->set_field_upload('gambar', 'public/assets/uploads/files/fasilitas');
        // $crud->set_rules('nilai_poin', 'Nilai', 'integer');
        $crud->unset_texteditor('description', 'value');
        $crud->required_fields('config_name', 'value', 'description');
        $crud->fields('config_name', 'value', 'description');
        $crud->unique_fields('config_name');

        // $crud->callback_before_insert(array($this, 'before_insert_fasilitas'));
        // $crud->callback_after_update(array($this, 'after_update_fasilitas'));

        $data = $crud->render();

        $view_config = array(
            'title' => 'Setting'
        );

  //
 
       // print_r($output);
        $this->view('index', $data, 'navi', $view_config);
    }
}
