<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
    public function __construct(){
parent::__construct();
$this->load->library('form_validation');
date_default_timezone_set("Asia/Jakarta");
$this->load->model('Content_model');
    }
    public function index(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
$data['user'] = $this->db->get_where('user', ['name' => 
$this->session->userdata('name')])->row_array();
echo 'Selamat datang ' .$data['user']['name'];
        // $data['title'] = 'Login Page';
        // $this->load->view('templates/auth_header', $data);
    // $this->load->view('auth/login');
        // $this->load->view('templates/auth_footer');
   
}

}

// letak di controller masalah untuk ambil data session
// // di funciotn index 
// $data['user'] = $this->db->get_where('user', ['name' => 
// $this->session->userdata('name')])->row_array();
// echo 'Selama datang' .$data['user']['name'];