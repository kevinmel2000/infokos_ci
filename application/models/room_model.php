<?php

class Room_model extends CI_Model {

    var $table = 'rooms';

    function __construct() {
        parent::__construct();
    }

    function getRoomList($limit = 0, $offset = 0) {
        $this->db->select('
                        rooms.*,
                        kosts.name AS kost_name,
                        (SELECT location 
                        FROM image_rooms 
                        WHERE room_id = rooms.id ORDER BY RAND() LIMIT 1) AS location,
                        (SELECT price 
                        FROM room_prices 
                            LEFT JOIN periods 
                                ON periods.id = room_prices.period_id 
                        WHERE room_id = rooms.id 
                            AND periods.is_active = 1 
                        ORDER BY room_prices.type DESC 
                        LIMIT 1) AS price,
                        (SELECT type 
                        FROM room_prices 
                            LEFT JOIN periods 
                                ON periods.id = room_prices.period_id 
                        WHERE room_id = rooms.id 
                            AND periods.is_active = 1 
                        ORDER BY room_prices.type DESC 
                        LIMIT 1) AS type');
        $this->db->from('rooms');
        $this->db->join('kosts', 'kosts.id = rooms.kost_id', 'LEFT');
        $this->db->limit($limit, $offset);
        $data = $this->db->get();
        return $data->result();
    }

    function getRoom($id = NULL) {
        if (!empty($id)) {
            $this->db->where('rooms.id', $id);
        }

        $this->db->select('rooms.*,kosts.name AS kost_name');
        $this->db->from('rooms');
        $this->db->join('kosts', 'kosts.id = rooms.kost_id', 'LEFT');
        $data = $this->db->get();

        return $data->result();
    }

}