<?php

class Files
{
    public function upload($upload_path, $input_file_name = 'userfile', $submit_name = 'upload')
    {
        $ci =& get_instance();
        $data = array(
            "uploading" => true,
            "success" => false,
            "message" => ""
        );
        if (isset($_POST[$submit_name])) {
            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = 'zip';
            $config['max_size']      = 8 * 1024;
            $config['overwrite']     = true;
            $ci->load->library('upload', $config);
            if (!$ci->upload->do_upload($input_file_name)) {
                $data['uploading'] = true;
                $data['success']   = false;
                $data['message']   = $ci->upload->display_errors();
            } else {
                $ci->load->library('unzip');
                $upload_data = $ci->upload->data();
                $ci->unzip->extract($upload_data['full_path']);
                unlink($upload_data['full_path']);
                $data['uploading'] = true;
                $data['success']   = true;
                $data['message']   = '';
            }
        } else {
            $data['uploading'] = false;
            $data['success']   = false;
            $data['message']   = '';
        }
        return $data;
    }

    public function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
    
    public function rrmdir($dir)
    {
        foreach (glob($dir . '/*') as $file) {
            if (is_dir($file)) {
                $this->rrmdir($file);
            } else {
                unlink($file);
            }
        }
        unlink($dir.'/.htaccess');
        rmdir($dir);
    }
}
