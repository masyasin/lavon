<?php
class Tenan extends CMS_Controller
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
        redirect('manajemen/tenan/grid');
    }
    public function grid()
    {
        
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_subject('Tenan');
        $crud->set_theme('datatables');
        $crud->columns('nama');
        $crud->set_table('m_tenan');
        $crud->unset_read();
        $crud->required_fields('nama');
        $crud->fields('nama');
        $crud->unique_fields('nama');

        $crud->callback_before_insert(array($this, 'before_insert_tenan'));
        $crud->callback_after_update(array($this, 'after_update_tenan'));

        $data = $crud->render();

        $view_config = array(
            'title' => 'Tenan'
        );

  //
 
       // print_r($output);
        $this->view('index', $data, 'navi', $view_config);
    }
    private function before_insert_tenan($post_array)
    {
        $post_array['tgl_dibuat'] = date('Y-m-d H:i:s');
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
    private function after_update_tenan($post_array)
    {
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
}
