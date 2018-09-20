<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserForm extends CMS_Model {

    public $controller;
    public $tableName 		= 'main_user';
    public $tableUserModule = 'ap_usermodule';
    public $tableUserRule 	= 'ap_userrule';
    public $rowPerPage 		= 50;
    public $ttlRows 		= 0;
    public $scenario 		= '';
    private $_filter_group_id = 0;
    private $_filter_users_list_id = array();

    public function __construct() {
        parent::__construct();
        if ($this->config->item('tableRowPerPage')) {
            $this->rowPerPage = $this->config->item('tableRowPerPage');
        }
        $this->controller = & get_instance();
    }

    public function validate($scenario = 'cms') {
        $getID = trim($this->controller->input->get('sid', TRUE));
        $this->scenario = $scenario;
        switch ($scenario) {
            case 'profile':
                $getID = $this->m_cms->cms_user_id();
                $this->controller->form_validation->set_rules('email', 'mail address', array(
                    'trim',
                    'required',
                    'min_length[1]',
                    'max_length[100]',
                    'valid_email',
                    array('email_duplicate_validate_callable', array($this, 'email_duplicate_validate'))
                ));

                //$this->controller->form_validation->set_rules('uploadfile', 'upload file', 'trim');
                /* if ($this->controller->input->post('currpassword') || $this->controller->input->post('password') || $this->controller->input->post('retype_password')) {
                    $this->controller->form_validation->set_rules('currpassword', 'current password', array(
                        'trim',
                        'required',
                        'min_length[5]',
                        'max_length[100]',
                        'whitespace',
                        array('currpassword_validate_callable', array($this, 'currpassword_validate'))
                    ));

                    $this->controller->form_validation->set_rules('password', 'new password', array(
                        'trim',
                        'required',
                        'min_length[5]',
                        'max_length[100]',
                        'whitespace'
                    ));

                    $this->controller->form_validation->set_rules('retype_password', 'retype new password', array(
                        'trim',
                        'required',
                        'min_length[5]',
                        'max_length[100]',
                        'whitespace',
                        'matches[password]'
                    ));
                } */

                if ($this->session->identity->usertype == 'CLIENT') {
                    $this->controller->form_validation->set_rules('phone', 'phone number', array(
                        'trim',
                        'min_length[1]',
                        'max_length[255]'
                    ));

                   

                    $this->controller->form_validation->set_rules('city', 'city name', array(
                        'trim',
                        'min_length[1]',
                        'max_length[255]'
                    ));

                    $this->controller->form_validation->set_rules('state', 'state/region name', array(
                        'trim',
                        'min_length[1]',
                        'max_length[255]'
                    ));

                    $this->controller->form_validation->set_rules('country', 'country name', array(
                        'trim',
                        'min_length[1]',
                        'max_length[255]'
                    ));

                    $this->controller->form_validation->set_rules('zipcode', 'zip code', array(
                        'trim',
                        'min_length[1]',
                        'max_length[20]'
                    ));

                    $this->controller->form_validation->set_rules('address', 'address', array('trim'));
                }
                break;
            case 'client':
                $this->controller->form_validation->set_rules('real_name', 'client full name', array(
                    'trim',
                    'required',
                    'min_length[1]',
                    'max_length[255]'
                ));
                $this->controller->form_validation->set_rules('email', 'mail address', array(
                    'trim',
                    'required',
                    'min_length[1]',
                    'max_length[100]',
                    'valid_email',
                    array('email_duplicate_validate_callable', array($this, 'email_duplicate_validate'))
                ));
                $this->controller->form_validation->set_rules('user_name', 'user id', array(
                    'trim',
                    'required',
                    'min_length[5]',
                    'max_length[100]',
                    'whitespace',
                    array('username_duplicate_validate_callable', array($this, 'username_duplicate_validate'))
                ));

                if (!$getID) {
                    $this->controller->form_validation->set_rules('password', 'password', array(
                        'trim',
                        'required',
                        'min_length[5]',
                        'max_length[100]',
                        'whitespace'
                    ));
                } else {
                    $getPwd = trim($this->controller->input->post('password'));
                    if ($getPwd) {
                        $this->controller->form_validation->set_rules('password', 'password', array(
                            'trim',
                            'required',
                            'min_length[5]',
                            'max_length[100]',
                            'whitespace'
                        ));
                    }
                }

                $this->controller->form_validation->set_rules('phone', 'phone number', array(
                    'trim',
                    'min_length[1]',
                    'max_length[255]'
                ));

                $this->controller->form_validation->set_rules('mobilephone', 'mobile phone number', array(
                    'trim',
                    'min_length[1]',
                    'max_length[255]'
                ));

                $this->controller->form_validation->set_rules('city', 'city name', array(
                    'trim',
                    'min_length[1]',
                    'max_length[255]'
                ));

                $this->controller->form_validation->set_rules('state', 'state/region name', array(
                    'trim',
                    'min_length[1]',
                    'max_length[255]'
                ));

                $this->controller->form_validation->set_rules('country', 'country name', array(
                    'trim',
                    'min_length[1]',
                    'max_length[255]'
                ));

                $this->controller->form_validation->set_rules('zipcode', 'zip code', array(
                    'trim',
                    'min_length[1]',
                    'max_length[20]'
                ));

                $this->controller->form_validation->set_rules('address', 'address', array('trim'));
                break;
            default:

                $this->controller->form_validation->set_rules('real_name', 'user name', array(
                    'trim',
                    'required',
                    'min_length[1]',
                    'max_length[255]'
                ));
                $this->controller->form_validation->set_rules('email', 'alamat email', array(
                    'trim',
                    'required',
                    'min_length[1]',
                    'max_length[100]',
                    'valid_email',
                    array('email_duplicate_validate_callable', array($this, 'email_duplicate_validate'))
                ));
                $this->controller->form_validation->set_rules('user_name', 'user_name', array(
                    'trim',
                    'required',
                    'min_length[5]',
                    'max_length[100]',
                    'whitespace',
                    array('username_duplicate_validate_callable', array($this, 'username_duplicate_validate'))
                ));

                if (!$getID) {
                    $this->controller->form_validation->set_rules('password', 'password', array(
                        'trim',
                        'required',
                        'min_length[5]',
                        'max_length[100]',
                        'whitespace'
                    ));
                } else {
                    $getPwd = trim($this->controller->input->post('password'));
                    if ($getPwd) {
                        $this->controller->form_validation->set_rules('password', 'password', array(
                            'trim',
                            'required',
                            'min_length[5]',
                            'max_length[100]',
                            'whitespace'
                        ));
                    }
                }
                break;
        }
        return $this->controller->form_validation->run();
    }

    public function username_duplicate_validate($value) {
        $getID = trim($this->controller->input->get('sid', TRUE));
        $isUniq = ($this->db->limit(1)->get_where($this->tableName, array('user_id !=' => $getID, 'user_name' => strtolower($value)))->num_rows() === 0) ? TRUE : FALSE;
        if (!$isUniq) {
            $this->controller->form_validation->set_message('username_duplicate_validate_callable', 'The {field} has been used.');
        }
        return $isUniq;
    }

    public function email_duplicate_validate($value) {
        if ($this->scenario == 'profile') {
            $getID = $this->m_cms->cms_user_id();
        } else {
            $getID = trim($this->controller->input->get('sid', TRUE));
        }
        $isUniq = ($this->db->limit(1)->get_where($this->tableName, array('user_id !=' => $getID, 'email' => strtolower($value)))->num_rows() === 0) ? TRUE : FALSE;
        if (!$isUniq) {
            $this->controller->form_validation->set_message('email_duplicate_validate_callable', 'The {field} has been used.');
        }
        return $isUniq;
    }

    /* public function currpassword_validate($value) {
        $pwd = $this->controller->encrypt->decode($this->session->identity->password_hash, $this->session->identity->auth_key);
        if ($pwd != $value) {
            $this->controller->form_validation->set_message('currpassword_validate_callable', 'Invalid your {field}');
            return FALSE;
        }
        return TRUE;
    } */

    public function getRowByID($getID) {
        if (!$getID) {
            return array();
        }
        return $this->db->select()->get_where($this->tableName, array('user_id' => $getID))->row_array();
    }

    public function getPrivilegeAccess($getID) {
        if (!$getID) {
            return array();
        }

        return $this->db->select('module, read, insert, update, remove, publish')
                        ->get_where($this->tableUserModule, array('user' => $getID))
                        ->result_array();
    }

    public function getGroups($getID) {
        if (!$getID) {
            return array();
        }

        return $this->db->select()
                        ->get_where($this->tableUserRule, array('user' => $getID))
                        ->result_array();
    }

    public function getTotalRows($reset = TRUE) {
        if (!$reset)
            return $this->ttlRows;

        $getView = trim($this->controller->input->get('view', TRUE));
        $getSearch = trim($this->controller->input->get('search', TRUE));
        $getFilter = $this->getFilter();

        if ($getView) {
            switch ($getView) {
                case 'enable':
                    $this->db->where('active', 1);
                    $this->db->where('trash', 0);
                    break;
                case 'disable':
                    $this->db->where('active', 0);
                    $this->db->where('trash', 0);
                    break;
                case 'trash':
                    $this->db->where('trash', 1);
                    break;
                default:
                    $this->db->where('trash', 0);
                    break;
            }
        }

        if ($getSearch) {
            $this->db->where("(user_name LIKE '%" . $getSearch . "%' OR email LIKE '%" . $getSearch . "%')");
        }

        if ($getFilter) {
            $this->db->where_in('user_id', $getFilter);
        }

        //$this->db->where('usertype', $this->userType);
        $this->db->from($this->tableName);
        $this->ttlRows = $this->db->count_all_results();
        return $this->ttlRows;
    }

    public function getTotalStatus($value = 'all') {
        $getSearch = trim($this->controller->input->get('search', TRUE));
        $getFilter = $this->getFilter();

        switch ($value) {
            case 'enable':
                $this->db->where('active', 1);
                $this->db->where('trash', 0);
                break;
            case 'disable':
                $this->db->where('active', 0);
                $this->db->where('trash', 0);
                break;
            case 'trash':
                $this->db->where('trash', 1);
                break;
            default:
                $this->db->where('trash', 0);
                break;
        }

        if ($getSearch) {
            $this->db->where("(user_name LIKE '%" . $getSearch . "%' OR email LIKE '%" . $getSearch . "%')");
        }

        if ($getFilter) {
            $this->db->where_in('id', $getFilter);
        }

        //$this->db->where('usertype', $this->userType);
        $this->db->from($this->tableName);
        return $this->db->count_all_results();
    }

    public function getFilter() {
        $getFilter = json_decode(trim($this->controller->input->get('filter', TRUE)), TRUE);
        if ($getFilter) {
            if (isset($getFilter['group'])) {
                if (is_numeric($getFilter['group'])) {
                    if ($this->_filter_group_id != $getFilter['group']) {
                        $this->db->where('rule', $getFilter['group']);
                        $this->db->from($this->tableUserRule);
                        $records = $this->db->get()->result_array();
                        if ($records) {
                            $this->_filter_group_id = $getFilter['group'];
                            $this->_filter_users_list_id = array();
                            foreach ($records as $key => $value) {
                                $this->_filter_users_list_id[] = $value['user'];
                            }
                            return $this->_filter_users_list_id;
                        }
                    } else {
                        return $this->_filter_users_list_id;
                    }
                }
            }
        }

        $this->_filter_group_id = 0;
        $this->_filter_users_list_id = array();
        return FALSE;
    }

    public function getGroupFilter() {
        return $this->_filter_group_id;
    }

    public function getPage() {
        $getPage = trim($this->controller->input->get('page', TRUE));
        return $getPage ? (is_numeric($getPage) ? $getPage : 0) : 0;
    }

    public function getFetchData() {
        $getExport = trim($this->controller->input->get('export', TRUE));
        $getView = trim($this->controller->input->get('view', TRUE));
        $getSearch = trim($this->controller->input->get('search', TRUE));
        $getSort = json_decode(trim($this->controller->input->get('sort', TRUE)), TRUE);
        $getFilter = $this->getFilter();

        if ($getView) {
            switch ($getView) {
                case 'enable':
                    $this->db->where('active', 1);
                    $this->db->where('trash', 0);
                    break;
                case 'disable':
                    $this->db->where('active', 0);
                    $this->db->where('trash', 0);
                    break;
                case 'trash':
                    $this->db->where('trash', 1);
                    break;
                default:
                    $this->db->where('trash', 0);
                    break;
            }
        }

        if ($getSearch) {
            $this->db->where("(name LIKE '%" . $getSearch . "%' OR username LIKE '%" . $getSearch . "%' OR email LIKE '%" . $getSearch . "%')");
        }

        if ($getFilter) {
            $this->db->where_in('user_id', $getFilter);
        }

       // $this->db->where('usertype', $this->userType);
        $this->db->from($this->tableName);

        if (!$getExport) {
            $this->db->limit($this->rowPerPage, $this->getPage());
        }

        if ($getSort) {
            foreach ($getSort as $key => $value) {
                if (!in_array($key, array('name')))
                    continue;

                if (!in_array($value, array('asc', 'desc')))
                    continue;

                $this->db->order_by($key, $value);
            }
        }

        return $this->db->get()->result_array();
    }

    public function bulkAction($action = '', $postid = array()) {
        switch ($action) {
            case 'enable':
                $this->db->set('active', 1);
                $this->db->where_in('user_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'disable':
                $this->db->set('active', 0);
                $this->db->where_in('user_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'trash':
                $this->db->set('trash', 1);
                $this->db->where_in('user_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'restore':
                $this->db->set('trash', 0);
                $this->db->where_in('user_id', $postid);
                $this->db->update($this->tableName);
                break;
            case 'delete':
                $this->db->where_in('user_id', $postid);
                $this->db->delete($this->tableName);
                break;
        }
    }

    public function getAllClients() {
        return $this->db->select()->order_by('user_name', 'asc')->get_where($this->tableName, array('usertype' => 'CLIENT'))->result_array();
    }

    public function getUserRegistered() {
        $total = 0;
        $sql = "SELECT 
                    COUNT(*) as total 
                  FROM (
                    SELECT 
                      a.id as userid, b.id as quotid 
                    FROM 
                      ap_user a
                      LEFT JOIN product_quot b ON a.id=b.userid
                    WHERE
                      a.usertype = 'CLIENT'
                      AND DATE_FORMAT(a.created_at, '%Y%m')=DATE_FORMAT(CURRENT_DATE(), '%Y%m')
                      AND b.package_status IS NULL
                    GROUP BY
                      a.id, b.id, b.package_status
                  ) tmp";

        $row = $this->db->query($sql)->row_array();
        if ($row) {
            $total = $row['total'];
        }

        $sql = "SELECT 
                a.id as userid, b.package_status 
              FROM 
                ap_user a
                INNER JOIN product_quot b ON a.id=b.userid
              WHERE
                a.usertype = 'CLIENT'
                AND DATE_FORMAT(a.created_at, '%Y%m')=DATE_FORMAT(CURRENT_DATE(), '%Y%m')
              GROUP BY
                a.id, b.package_status
              ORDER BY
                package_status ASC";

        $rows = $this->db->query($sql)->result_array();
        if ($rows) {
            $UserIdByPass = array();
            foreach ($rows as $key => $value) {
                if ($value['package_status'] != 'request') {
                    if (in_array($value['userid'], $UserIdByPass)) {
                        continue;
                    } else {
                        $UserIdByPass[] = $value['userid'];
                    }
                } elseif (!in_array($value['userid'], $UserIdByPass)) {
                    $total = + 1;
                }
            }
        }

        return $total;
    }

    public function getUserClient() {
        $total = 0;
        $sql = "SELECT 
                    COUNT(*) as total 
                  FROM (
                      SELECT 
                        a.id
                      FROM 
                        ap_user a
                        INNER JOIN product_quot b ON a.id=b.userid
                      WHERE
                        a.usertype = 'CLIENT'
                        AND DATE_FORMAT(a.created_at, '%Y%m')=DATE_FORMAT(CURRENT_DATE(), '%Y%m')
                        AND b.package_status = 'approve'
                      GROUP BY
                        a.id
                  ) tmp";

        $row = $this->db->query($sql)->row_array();
        if ($row) {
            $total = $row['total'];
        }
        return $total;
    }

    public function getRFQ() {
        $total = 0;
        $sql = "SELECT 
                    COUNT(*) as total 
                  FROM 
                    product_quot
                  WHERE
                    DATE_FORMAT(request_date, '%Y%m')=DATE_FORMAT(CURRENT_DATE(), '%Y%m')";

        $row = $this->db->query($sql)->row_array();
        if ($row) {
            $total = $row['total'];
        }
        return $total;
    }
    
    public function getClaim() {
        $total = 0;
        $sql = "SELECT 
                    COUNT(*) as total 
                  FROM 
                    product_claim
                  WHERE
                    DATE_FORMAT(claim_date, '%Y%m')=DATE_FORMAT(CURRENT_DATE(), '%Y%m')";

        $row = $this->db->query($sql)->row_array();
        if ($row) {
            $total = $row['total'];
        }
        return $total;
    }
    
    public function getRFQByMonth() {
        $total = array();
        $string = '';
        $sql = "SELECT 
                    COUNT(*) as total,
                    DATE_FORMAT(request_date, '%m') as mth
                  FROM 
                    product_quot
                  WHERE
                    DATE_FORMAT(request_date, '%Y')=DATE_FORMAT(CURRENT_DATE(), '%Y')
                  GROUP BY
                    DATE_FORMAT(request_date, '%m')
                  ORDER BY
                    DATE_FORMAT(request_date, '%m')";

        $rows = $this->db->query($sql)->result_array();
        if ($rows) {
            foreach ($rows as $key => $value) {
                $total[$value['mth']] = $value['total'];
            }
            
            for($fx=1; $fx<=12; $fx++) {
                if($string!=='')
                    $string .= ',';
                
                if($fx<=9) {
                    if(isset($total['0'.$fx])) {
                        $string .= $total['0'.$fx];
                    } else {
                        $string .= '0';
                    }
                } else {
                    if(isset($total[$fx])) {
                        $string .= $total[$fx];
                    } else {
                        $string .= '0';
                    }
                }
            }
        }
        return $string;
    }
    
    public function getClaimByMonth() {
        $total = array();
        $string = '';
        $sql = "SELECT 
                    COUNT(*) as total,
                    DATE_FORMAT(claim_date, '%m') as mth
                  FROM 
                    product_claim
                  WHERE
                    DATE_FORMAT(claim_date, '%Y')=DATE_FORMAT(CURRENT_DATE(), '%Y')
                  GROUP BY
                    DATE_FORMAT(claim_date, '%m')
                  ORDER BY
                    DATE_FORMAT(claim_date, '%m')";

        $rows = $this->db->query($sql)->result_array();
        if ($rows) {
            foreach ($rows as $key => $value) {
                $total[$value['mth']] = $value['total'];
            }
            
            for($fx=1; $fx<=12; $fx++) {
                if($string!=='')
                    $string .= ',';
                
                if($fx<=9) {
                    if(isset($total['0'.$fx])) {
                        $string .= $total['0'.$fx];
                    } else {
                        $string .= '0';
                    }
                } else {
                    if(isset($total[$fx])) {
                        $string .= $total[$fx];
                    } else {
                        $string .= '0';
                    }
                }
            }
        }
        return $string;
    }
	
	
	 public function getPokja($getID) {
        if (!$getID) {
            return array();
        }
        return $this->db->select()
                        ->get_where($this->tableUserPokja, array('userid' => $getID))
                        ->result_array();
    }

}
