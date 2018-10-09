<?php
class Cluster extends CMS_Controller
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
        redirect('manajemen/cluster/grid');
    }
    public function grid()
    {
        
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_subject('Cluster');
        $crud->set_theme('datatables');
        $crud->columns('nama', 'kode');
        $crud->set_table('m_cluster');
        $crud->unset_read();
        $crud->required_fields('nama', 'kode');
        $crud->fields('nama', 'kode');
        $crud->unique_fields('nama', 'kode');

        $crud->callback_before_insert(array($this, 'before_insert_cluster'));
        $crud->callback_after_update(array($this, 'after_update_cluster'));

        $data = $crud->render();

        $view_config = array(
            'title' => 'Cluster'
        );

  //
 
       // print_r($output);
        $this->view('index', $data, 'navi', $view_config);
    }
    private function before_insert_cluster($post_array)
    {
        $post_array['tgl_dibuat'] = date('Y-m-d H:i:s');
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
    private function after_update_cluster($post_array)
    {
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
}
