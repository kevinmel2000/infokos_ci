<?php

class Room_price_model extends CI_Model {

    var $table = 'room_prices';

    function __construct() {
        parent::__construct();
    }
    
    function getActivePrice($id = NULL){
        $this->db->select('room_prices.*');
        $this->db->from('room_prices');
        $this->db->join('periods', 'periods.id = room_prices.period_id', 'LEFT');
        $this->db->where('room_prices.room_id', $id);
        $this->db->where('periods.is_active', 1);
        return $this->db->get();
    }

}