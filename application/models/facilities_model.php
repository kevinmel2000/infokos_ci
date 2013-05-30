<?php

class Facilities_model extends CI_Model {

    var $table = 'facilities';

    function __construct() {
        parent::__construct();
    }
    
    function getKostFacilities($id = NULL){
        $this->db->select('facilities.*');
        $this->db->join('facilities', 'facilities.id = kost_facilities.facilities_id', 'LEFT');
        $this->db->from('kost_facilities');
        $this->db->where('kost_facilities.kost_id', $id);
        return $this->db->get();
    }

}