<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct(){
        parent::__construct();
        if(!$this->session->userdata('name')){
			redirect('auth');
		}
		$this->load->helper('url');
		$this->load->model('menu_model', 'menu');
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('form_validation');

	}
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['title'] = 'Menu Management';
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if($this->form_validation->run() == false){
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('menu/index', $data); //MENAMPILKAN KE HALAMAN profiel LIST BESERTA DATA YANG TELAH DITANGKAP
            $this->load->view('templates/footer.php');
        } else {
            $this->db->insert('user_menu', ['menu' =>$this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Baru berhasil dibuat!</div> ');
            redirect('menu');
        }



        
    }
    public function hapus_menu($id){
        $this->db->where('id', $id);
		$this->db->delete('user_menu');
		redirect('menu/index');
    }
    public function edit_menu($id){
	$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['title'] = 'Ubah Menu';
		$where = array('id' => $id);
        $data['user_menu'] = $this->menu->edit_data($where,'user_menu')->result();
         $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
        $this->load->view('menu/edit_menu',$data);
         $this->load->view('templates/footer.php', $data);
    }
    function update(){
		$id = $this->input->post('id');
		$menu = $this->input->post('menu');
		
		$data = array(
			'id' => $id,
			'menu' => $menu,
		
		);
	 
		$where = array(
			'id' => $id
		);
		// var_dump($where);
		// die;
	 
		$this->menu->update_data($where,$data,'user_menu');

	}

    public function submenu(){
        $data['user']  = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['title'] = 'Submenu Management';

        // $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if($this->form_validation->run() == false){

            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('menu/submenu', $data); //MENAMPILKAN KE HALAMAN profiel LIST BESERTA DATA YANG TELAH DITANGKAP
            $this->load->view('templates/footer.php');
        } else{
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Baru berhasil dibuat!</div> ');
            redirect('menu/submenu');
        }
    }
    public function hapus_sub_menu($id){
        $this->db->where('id', $id);
		$this->db->delete('user_sub_menu');
		redirect('menu/submenu');
    }
    public function edit_sub_menu($id){
	$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['title'] = 'Ubah Sub Menu';
		$where = array('id' => $id);
        $data['user_sub_menu'] = $this->menu->edit_data($where,'user_sub_menu')->result();
         $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
        $this->load->view('menu/edit_sub_menu',$data);
         $this->load->view('templates/footer.php', $data);
    }
    function update_sub_menu(){
		$id = $this->input->post('id');
		$menu_id = $this->input->post('menu_id');
		$title = $this->input->post('title');
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		$is_active = $this->input->post('is_active');
        
		$data = array(
			'id' => $id,
            'menu_id' => $menu_id,
			'title' => $title,
			'url' => $url,
			'icon' => $icon,
			'is_active' => $is_active,
            
		
		);
	 
		$where = array(
			'id' => $id
		);
		// var_dump($where);
		// die;
	 
		$this->menu->update_data($where,$data,'user_sub_menu');

	}

    
    

}