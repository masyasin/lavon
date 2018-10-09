<?php
class Fasilitas extends CMS_Controller
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
        redirect('manajemen/fasilitas/grid');
    }
    public function grid()
    {
        
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_subject('Fasilitas');
        $crud->set_theme('datatables');
        $crud->display_as('id_tenan', 'Tenan');
        $crud->set_relation('id_tenan', 'm_tenan', 'nama');
        $crud->columns('gambar', 'nama', 'keterangan', 'id_tenan', 'nilai_poin');
        $crud->set_table('m_fasilitas');
        $crud->unset_read();
        $crud->field_type('keterangan', 'text');
        $crud->set_field_upload('gambar', 'public/assets/uploads/files/fasilitas');
        $crud->set_rules('nilai_poin', 'Nilai', 'integer');
        $crud->unset_texteditor('keterangan');
        $crud->required_fields('gambar', 'nama', 'keterangan', 'id_tenan', 'nilai_poin');
        $crud->fields('gambar', 'nama', 'keterangan', 'id_tenan', 'nilai_poin');
        $crud->unique_fields('nama');

        $crud->callback_before_insert(array($this, 'before_insert_fasilitas'));
        $crud->callback_after_update(array($this, 'after_update_fasilitas'));

        $data = $crud->render();

        $view_config = array(
            'title' => 'Fasilitas'
        );

  //
 
       // print_r($output);
        $this->view('index', $data, 'navi', $view_config);
    }
    private function before_insert_fasilitas($post_array)
    {
        $post_array['tgl_dibuat'] = date('Y-m-d H:i:s');
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
    private function after_update_fasilitas($post_array)
    {
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
}
