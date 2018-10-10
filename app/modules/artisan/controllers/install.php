<?php

class Install extends CMS_Controller
{
    
    public function status()
    {
        $response = [
            'active'=>true,
            'old'=>false,
            'version'=>1,
            'old_version'=>'1'
        ];
        echo json_encode($response);
    }
}
