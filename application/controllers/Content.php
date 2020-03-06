<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	function __construct(){
        parent::__construct();
        if(!$this->session->userdata('name')){
			redirect('auth');
		}
		$this->load->helper('url');
		$this->load->model('Content_model', 'content');
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('form_validation');
    }
    public function index(){
       	$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['title'] = 'Content Management';
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

    
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('content/index', $data); //MENAMPILKAN KE HALAMAN profiel LIST BESERTA DATA YANG TELAH DITANGKAP
            $this->load->view('templates/footer.php');
 
}

}

// letak di controller masalah untuk ambil data session
// // di funciotn index 
// $data['user'] = $this->db->get_where('user', ['name' => 
// $this->session->userdata('name')])->row_array();
// echo 'Selama datang' .$data['user']['name'];