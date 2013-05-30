<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('Member_model', '', TRUE);
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $member = $this->Member_model->validate($username, $password);
            if (!empty($member)) {
                $data = $this->__setSessionDataLogin($member[0]);
                $this->session->set_userdata($data);
                redirect('page/home');
            } else {
                $this->session->set_flashdata('message', 'Maaf, Email atau Password Anda salah');
                redirect('member/login');
            }
        } else {
            $data['title'] = 'Login Pelanggan';
            $data['content'] = $this->router->class . '/' . $this->router->method;
            $this->load->view('layout/default', $data);
        }
    }

    function __setSessionDataLogin($data = array()) {
        $data = array(
            'id' => $data->id,
            'name' => $data->name,
            'email' => $data->email,
            'login' => TRUE
        );
        return $data;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('member/login');
    }

    public function register() {
        $this->load->library('form_validation');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './webroot/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1024000';

            $this->load->library('upload', $config);
            $this->upload->do_upload('photo');
            
            $data = $this->input->post();
            $image = $this->upload->data();
            $data['photo'] = $image['file_name'];
            $data['password'] = md5($data['password']);
            unset($data['conf_password']);
            
            $result = $this->Member_model->register($data);
            redirect('member/login');
        } else {
            $data['title'] = 'Register Pelanggan';
            $data['content'] = $this->router->class . '/' . $this->router->method;
            $this->load->view('layout/default', $data);
        }
    }

    public function profile() {
        $data['title'] = 'Profil Pelanggan';
        $data['content'] = $this->router->class . '/' . $this->router->method;
        $data['member'] = $this->db->get_where('members', array('id' => $this->session->userdata('id')))->result();
        $this->load->view('layout/default', $data);
    }

    public function edit() {
        $data['title'] = 'Edit Data Pelanggan';
        $data['content'] = $this->router->class . '/' . $this->router->method;
        $data['member'] = $this->db->get_where('members', array('id' => $this->session->userdata('id')))->result();
        $this->load->view('layout/default', $data);
    }

}