<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function home() {
        $data['title'] = 'Beranda';
        $data['content'] = $this->router->class.'/'.$this->router->method;
        
        $this->load->model('Kost_model');
        $data['kost'] = $this->Kost_model->getKostList(6,0,TRUE);
        
        $this->load->view('layout/default', $data);
    }
    
    public function payment(){
        $data['title'] = 'Cara Pembayaran';
        $data['content'] = $this->router->class.'/'.$this->router->method;
        
        $conditions = array(
            'is_active' => 1
        );
        $data['banks'] = $this->db->get_where('banks', $conditions);
        
        $this->load->view('layout/default', $data);
    }
    
    public function about_us(){
        $data['title'] = 'Tentang Kami';
        $data['content'] = $this->router->class.'/'.$this->router->method;
        $this->load->view('layout/default', $data);
    }

}