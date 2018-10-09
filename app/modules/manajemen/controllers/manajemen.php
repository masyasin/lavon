<?php
class Manajemen extends CMS_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }
    //---------------------------------------------------------------------CLUSTER
    public function cluster()
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
            'title' => ' Manajemen Cluster'
        );
        $this->template->set_breadcrumb('Manajemen', false)
                       ->set_breadcrumb('Cluster', '');
        $this->view('cluster', $data, 'navi', $view_config);
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
    //---------------------------------------------------------------------CLUSTER
    public function fasilitas()
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
            'title' => ' Manajemen Fasilitas'
        );
        $this->template->set_breadcrumb('Manajemen', false)
                       ->set_breadcrumb('Fasilitas', '');
        $this->view('fasilitas', $data, 'navi', $view_config);
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
    //---------------------------------------------------------------------TENAN
    public function tenan()
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
            'title' => ' Manajemen Tenan'
        );
        $this->template->set_breadcrumb('Manajemen', false)
                       ->set_breadcrumb('Tenan', '');
        $this->view('tenan', $data, 'navi', $view_config);
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
    //---------------------------------------------------------------------MARCENDAISE
    public function marcendaise()
    {
        
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_subject('Marcendaise');
        $crud->set_theme('datatables');
      
        $crud->columns('gambar', 'nama', 'keterangan', 'redeem_poin');
        $crud->set_table('m_marcendaise');
        $crud->unset_read();
        $crud->field_type('keterangan', 'text');
        $crud->set_field_upload('gambar', 'public/assets/uploads/files/marcendaise');
        $crud->set_rules('redeem_poin', 'Nilai', 'integer');
        $crud->unset_texteditor('keterangan');
        $crud->required_fields('gambar', 'nama', 'keterangan', 'redeem_poin');
        $crud->fields('gambar', 'nama', 'keterangan', 'redeem_poin');
        $crud->unique_fields('nama');

        $crud->callback_before_insert(array($this, 'before_insert_marcendaise'));
        $crud->callback_after_update(array($this, 'after_update_marcendaise'));

        $data = $crud->render();

        $view_config = array(
            'title' => ' Manajemen Marcendaise'
        );
        $this->template->set_breadcrumb('Manajemen', false)
                       ->set_breadcrumb('Marcendaise', '');
        $this->view('marcendaise', $data, 'navi', $view_config);
    }
    private function before_insert_marcendaise($post_array)
    {
        $post_array['tgl_dibuat'] = date('Y-m-d H:i:s');
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
    private function after_update_marcendaise($post_array)
    {
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
    //---------------------------------------------------------------------TENAN
}
