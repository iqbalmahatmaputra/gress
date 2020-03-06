<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
parent::__construct();
$this->load->library('form_validation');
date_default_timezone_set("Asia/Jakarta");
    }
    public function index(){
        $data['title'] = 'User Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('user/index');
        $this->load->view('templates/auth_footer');
    }


}

    ?>