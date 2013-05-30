<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kost extends CI_Controller {
    
    var $limit = 10;

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Daftar Kost';
        $data['content'] = $this->router->class . '/' . $this->router->method;

        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);
        
        $this->load->model('Kost_model');
        $data['kost'] = $this->Kost_model->getKostList($this->limit, $offset);
        
        $config['base_url'] = site_url($this->router->class . '/' . $this->router->method);
        $config['total_rows'] = $this->db->count_all('kosts');
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['facilities'] = $this->db->get('facilities');

        $this->load->view('layout/default', $data);
    }
    
    public function detail(){
        $id = $this->uri->segment(3);
        $data['content'] = $this->router->class . '/' . $this->router->method;
        
        $this->load->model('Kost_model');
        $kost = $this->Kost_model->getKost($id);
        $data['kost'] = $kost[0];
        
        $data['image_kosts'] = $this->db->get_where('image_kosts', array('kost_id' => $id, 'is_active' => 1));
        
        $this->load->model('Facilities_model');
        $data['facilities'] = $this->Facilities_model->getKostFacilities($id);
        
        $this->load->model('Room_model');
        $uri_segment = 4;
        $offset = $this->uri->segment($uri_segment);
        $data['rooms'] = $this->Room_model->getRoomList($this->limit, $offset);
        $config['base_url'] = site_url($this->router->class . '/' . $this->router->method.'/'.$id);
        $this->db->where('kost_id', $id);
        $config['total_rows'] = $this->db->count_all_results('rooms');
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['title'] = 'Detail Kost '.$data['kost']->name;
        $this->load->view('layout/default', $data);
    }
    
    public function search(){
        $data['title'] = 'Kost';
        $data['content'] = $this->router->class . '/index';

        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);
        
        $this->load->model('Kost_model');
        $conditions = $this->input->post();
        $data['kost'] = $this->Kost_model->searchKostList($this->limit, $offset, $conditions);
        
        $config['base_url'] = site_url($this->router->class . '/' . $this->router->method);
        $config['total_rows'] = $this->Kost_model->countSearchKostList($conditions);
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['facilities'] = $this->db->get('facilities');

        $this->load->view('layout/default', $data);
    }

}