<?php

class Place_model extends CI_Model {

    var $table = 'places';

    function __construct() {
        parent::__construct();
    }

    function getRoomList($limit = 0, $offset = 0) {
        $this->db->select('');
        $this->db->from('rooms');
        $this->db->join('kosts', 'kosts.id = rooms.kost_id', 'LEFT');
        $this->db->limit($limit, $offset);
        $data = $this->db->get();
        return $data->result();
    }
    
    function getPlaceMaps($id = 'false', $place_id = NULL){
        if($id != 'false'){
            $condition = "(kosts.is_active = 1 OR kosts.is_active IS NULL) AND place_types.id =".$id;
        }  else {
            $condition = "(kosts.is_active = 1 OR kosts.is_active IS NULL)";
        }
        
        if(!empty($place_id)){
            $condition = 'places.id = '.$place_id;
        }
        
        $this->db->select('
                        places.id,
                        places.name AS place_name,
                        places.address,
                        places.longitude,
                        places.latitude,
                        place_types.name AS place_type_name,
                        place_types.image,
                        kosts.id AS kost_id,
                        kosts.name AS kost_name,
                        (SELECT room_prices.price
                            FROM room_prices
                                LEFT JOIN rooms
                                    ON rooms.id = room_prices.room_id
                                LEFT JOIN periods
                                    ON periods.id = room_prices.period_id
                            WHERE rooms.kost_id = places.kost_id
                                AND periods.is_active = 1
                            ORDER BY type DESC 
                            LIMIT 1) AS price,
                        (SELECT room_prices.type
                            FROM room_prices
                                LEFT JOIN rooms
                                    ON rooms.id = room_prices.room_id
                                LEFT JOIN periods
                                    ON periods.id = room_prices.period_id
                        WHERE rooms.kost_id = places.kost_id
                            AND periods.is_active = 1
                        ORDER BY type DESC 
                        LIMIT 1) AS type');
        $this->db->from('places');
        $this->db->join('place_types', 'place_types.id = places.place_type_id', 'LEFT');
        $this->db->join('kosts', 'kosts.id = places.kost_id', 'LEFT');
        $this->db->where($condition);
        $data = $this->db->get();
        return $data->result();
    }
}