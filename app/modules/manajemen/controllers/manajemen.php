<?php
class Manajemen extends CMS_Controller
{
    
    //---------------------------------------------------------------------CLUSTER
    public function cluster()
    {
        $this->cms_guard_page('manajemen_cluster');
        
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
        $this->view('cluster', $data, 'manajemen_cluster', $view_config);
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
        $this->cms_guard_page('manajemen_fasilitas');
        $crud = $this->new_crud();
        $crud->unset_jquery();
        $crud->set_subject('Fasilitas');
        $crud->set_theme('datatables');
        $crud->display_as('id_tenan', 'Tenan');
        $crud->set_relation('id_tenan', 'm_tenan', 'nama');
        $crud->columns('gambar', 'nama', 'keterangan', 'id_tenan', 'ppa1', 'ppa2', 'ppa3', 'ppa4', 'ppa5');
        $crud->set_table('m_fasilitas');
        $crud->unset_read();
        $crud->field_type('keterangan', 'text');
        $crud->set_field_upload('gambar', 'public/assets/uploads/files/fasilitas');
        $crud->set_rules('nilai_poin', 'Nilai', 'integer');
        $crud->unset_texteditor('keterangan');
        $crud->required_fields('gambar', 'nama', 'keterangan', 'id_tenan', 'ppa1', 'ppa2', 'ppa3', 'ppa4', 'ppa5');
        $crud->fields('gambar', 'nama', 'keterangan', 'id_tenan', 'ppa1', 'ppa2', 'ppa3', 'ppa4', 'ppa5');
        
        $crud->set_rules('ppa1', 'ppa1', 'integer');
        $crud->set_rules('ppa2', 'ppa2', 'integer');
        $crud->set_rules('ppa3', 'ppa3', 'integer');
        $crud->set_rules('ppa4', 'ppa4', 'integer');
        $crud->set_rules('ppa5', 'ppa5', 'integer');

        $crud->unique_fields('nama');

        $crud->callback_before_insert(array($this, 'before_insert_fasilitas'));
        $crud->callback_after_update(array($this, 'after_update_fasilitas'));

        $data = $crud->render();

        $view_config = array(
            'title' => ' Manajemen Fasilitas'
        );
        $this->template->set_breadcrumb('Manajemen', false)
                       ->set_breadcrumb('Fasilitas', '');
        $this->view('fasilitas', $data, 'manajemen_fasilitas', $view_config);
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
        $this->cms_guard_page('manajemen_tenan');
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
        $this->view('tenan', $data, 'manajemen_tenan', $view_config);
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
        $this->cms_guard_page('manajemen_marcendaise');
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
        $this->view('marcendaise', $data, 'manajemen_marcendaise', $view_config);
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
    //---------------------------------------------------------------------unit-poin
    public function unit_poin()
    {
        $this->cms_guard_page('manajemen_unit_poin');
        
        $data = [];

        $view_config = array(
            'title' => ' Manajemen Unit Poin'
        );
        $this->template->set_breadcrumb('Manajemen', false)
                       ->set_breadcrumb('Unit Poin', '');
        $this->view('unit_poin', $data, 'manajemen_unit_poin', $view_config);
    }
}
