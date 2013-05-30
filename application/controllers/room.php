<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room extends CI_Controller {
    
    var $limit = 10;

    function __construct() {
        parent::__construct();
    }

    public function detail(){
        $id = $this->uri->segment(3);
        $data['content'] = $this->router->class . '/' . $this->router->method;
        
        $this->load->model('Room_model');
        $room = $this->Room_model->getRoom($id);
        $data['room'] = $room[0];
        
        $this->load->model('Kost_model');
        $kost = $this->Kost_model->getKost($data['room']->kost_id);
        $data['kost'] = $kost[0];
        
        $data['image_rooms'] = $this->db->get_where('image_rooms', array('room_id' => $id, 'is_active' => 1));
        
        $this->load->model('Room_price_model');
        $data['room_prices'] = $this->Room_price_model->getActivePrice($id);
        
        $this->load->model('Facilities_model');
        $data['facilities'] = $this->Facilities_model->getKostFacilities($data['room']->kost_id);
                
        $data['title'] = 'Detail Kamar '.$data['kost']->name;
        $this->load->view('layout/default', $data);
    }
}