<?php

class Member_model extends CI_Model {

    var $table = 'members';

    function __construct() {
        parent::__construct();
    }

    function validate($username = NULL, $password = NULL) {
        $data = $this->db->get_where($this->table, array('email' => $username, 'password' => md5($password), 'is_active' => 1));
        return $data->result();
    }
    
    function register($data = array()){
        $data['is_active'] = 1;
        $return = $this->db->insert($this->table, $data);
        return $return;
    }

}