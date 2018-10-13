<?php

/**
 *
 */
class Unit extends CMS_Controller
{
    
    public function __construct()
    {
        parent::__construct();
       
        $this->load->driver('session');
        $this->theme = $this->cms_get_config('site_theme');
        $this->template->set_theme($this->theme);
    }
    public function index()
    {
        $this->cms_guard_page('manajemen_unit');
        $crud = $this->new_crud();
        $crud->unset_jquery();
       
        
        if (! $this->input->is_ajax_request()) {
            $crud->set_theme_config(['crud_paging' => true ]);
        }


        $crud->set_theme('datatables');
        $crud->columns('card_number', 'unit_number', 'id_cluster');
        $crud->set_table('m_unit');
        $crud->unset_read();
        $crud->set_subject('Unit');
        $crud->display_as('id_cluster', 'Cluster');
        $crud->display_as('unit_number', 'Nomor Unit');
        
        $crud->display_as('is_active', 'Aktif');
        $crud->field_type('is_active', 'dropdown', ['1'=>'Ya','0'=>'Tidak']);

        $crud->set_relation('id_cluster', 'm_cluster', 'nama');

        $crud->required_fields('unit_number', 'id_cluster', 'max_member', 'tgl_berlaku', 'tgl_berakhir', 'is_active');
        $crud->fields('unit_number', 'id_cluster', 'max_member', 'tgl_berlaku', 'tgl_berakhir', 'is_active');
        $crud->unique_fields('card_number', 'unit_number');

        $crud->callback_before_insert(array($this, 'before_insert_unit'));
        $crud->callback_after_update(array($this, 'after_update_unit'));

        
        
        $data = $crud->render();

        

        $view_config = array(
            'title' => ' Manajemen Unit'
        );
        $this->template->set_breadcrumb('Manajemen', false)
                       ->set_breadcrumb('Unit', '');
         $this->view('unit', $data, 'manajemen_unit', $view_config);
    }
    private function before_insert_unit($post_array)
    {
        $post_array['tgl_dibuat'] = date('Y-m-d H:i:s');
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
    private function after_update_unit($post_array)
    {
        $post_array['tgl_diubah'] = date('Y-m-d H:i:s');
        
        return $post_array;
    }
}
