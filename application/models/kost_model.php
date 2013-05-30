<?php

class Kost_model extends CI_Model {

    var $table = 'kosts';

    function __construct() {
        parent::__construct();
    }

    function getKostList($limit = 0, $offset = 0, $rand = FALSE) {
        if ($rand) {
            $this->db->order_by('id', 'RANDOM');
        }

        $this->db->select('
                        kosts.*,
                        owners.phone,
                        (SELECT ImageKost.location 
                        FROM image_kosts AS ImageKost
                        WHERE ImageKost.kost_id = kosts.id
                        AND ImageKost.type = "cover" LIMIT 1) AS location,
                        (SELECT RoomPrice.price
                            FROM room_prices AS RoomPrice
                                LEFT JOIN rooms AS Room
                                    ON Room.id = RoomPrice.room_id
                                LEFT JOIN periods AS Period
                                    ON Period.id = RoomPrice.period_id
                            WHERE Room.kost_id = kosts.id
                                AND Period.is_active = 1
                            ORDER BY type DESC 
                            LIMIT 1) AS max_price,
                        (SELECT RoomPrice.type
                            FROM room_prices AS RoomPrice
                                LEFT JOIN rooms AS Room
                                    ON Room.id = RoomPrice.room_id
                                LEFT JOIN periods AS Period
                                    ON Period.id = RoomPrice.period_id
                            WHERE Room.kost_id = kosts.id
                                AND Period.is_active = 1
                            ORDER BY type DESC 
                            LIMIT 1) AS room_type,
                        (SELECT COUNT(Room.id)
                            FROM rooms AS Room
                            WHERE Room.kost_id = kosts.id
                                AND Room.gender = "F") AS female,
                        (SELECT COUNT(Room.id)
                            FROM rooms AS Room
                            WHERE Room.kost_id = kosts.id
                                AND Room.gender = "M") AS male');
        $this->db->from('kosts');
        $this->db->join('owners', 'owners.id = kosts.owner_id', 'LEFT');
        $this->db->limit($limit, $offset);
        $data = $this->db->get();
        return $data->result();
    }
    
    function __setCondition($condition = array()){
        if (isset($condition['name']) && !empty($condition['name'])) {
            $this->db->like('kosts.name', $condition['name']);
        }

        if (isset($condition['jenis'])) {
            if (count($condition['gender']) == 1) {
                $this->db->where('gender', $condition['gender']);
            } elseif (count($_POST['jenis']) == 2) {
                $this->db->where('(SELECT COUNT(DISTINCT rooms.gender) FROM rooms WHERE rooms.kost_id = kosts.id)', 2);
            }
        }

        if (isset($condition['address']) && !empty($condition['address'])) {
            $this->db->like('kosts.address', $condition['address']);
        }

        if (isset($condition['facilities'])) {
            foreach ($condition['facilities'] as $val) {
                $facilities[] = $val;
            }
            $this->db->where_in('kost_facilities.facilities_id', $facilities);
        }

        if (isset($condition['type']) && isset($condition['price']) && $condition['type'] != '0' && $condition['price'] != '0') {
            $harga = explode('-', $condition['price']);
            $this->db->where('room_prices.price >=', $harga[0]);
            $this->db->where('room_prices.type', $condition['type']);
            if (isset($harga[1])) {
                $this->db->where('room_prices.price <=', $harga[1]);
            }
        }
        
        $this->db->join('rooms', 'kosts.id = rooms.kost_id', 'LEFT');
        $this->db->join('room_prices', 'room_prices.room_id = rooms.id', 'LEFT');
        $this->db->join('kost_facilities', 'kost_facilities.kost_id = kosts.id', 'LEFT');
    }

    function searchKostList($limit = 0, $offset = 0, $condition = array()) {
        $this->__setCondition($condition);
        $this->db->distinct();
        return $this->getKostList($limit, $offset);
    }
    
    function countSearchKostList($condition = array()){
        $this->__setCondition($condition);
        $this->db->select('COUNT(DISTINCT kosts.id) AS count');
        $this->db->from('kosts');
        $data = $this->db->get()->result();
        return $data[0]->count;
    }
    
    function getKost($id = NULL){
        if(!empty($id)){
            $this->db->where('kosts.id', $id);
        }
        
        $this->db->select('kosts.*,owners.name AS owner_name, owners.phone, owners.email');
        $this->db->from('kosts');
        $this->db->join('owners','owners.id = kosts.owner_id', 'LEFT');
        $data = $this->db->get();
        
        return $data->result();
    }

}