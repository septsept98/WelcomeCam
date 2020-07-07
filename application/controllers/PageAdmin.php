<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageAdmin extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    //validasi jika user belum login
	    if($this->session->userdata('masuk') == 'user'){
	        redirect('Page');
	    }elseif ($this->session->userdata('masuk') != 'admin') {
            $url=base_url();
	        redirect($url);
	    }
		// load Session Library
		$this->load->library('session');
			
		// load url helper
		$this->load->helper('url');

		$this->load->model('MAdmin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['sum_kategori'] = $this->db->count_all_results('kategori');
		$data['sum_user'] = $this->db->count_all_results('user');
		$data['sum_barang'] = $this->MAdmin->Sum('tb_barang', 'jumlah_barang');
 		$data['graph'] = $this->MAdmin->graph();
        $this->load->view("admin/index.php", $data);
	}

	// Profil
	public function profil(){
		$id = $this->session->userdata('id');
		$where = array('id'=> $id);
		$data['profil'] = $this->MAdmin->GetWhere('bag_gudang',$where);
		$this->load->view("admin/profil/profil", $data);
	}
	
	public function editProfil($id){
		$where = array('id'=> $id);
		$data['profil'] = $this->MAdmin->GetWhere('bag_gudang', $where);
		$this->load->view('admin/profil/ed_profil', $data);
	}

	public function up_profil(){
		$id = $_POST['id'];
		$nm = $_POST['nama'];
		$email = $_POST['email'];
		
		$data = array(
			'nama' => $nm,
			'email' => $email,
		);

		$where = array('id'=> $id);
		$this->session->set_userdata($data);
		$data['profil'] = $this->MAdmin->Update('bag_gudang', $data, $where);
      	$this->session->set_flashdata('msg_berhasil','Data Profil Berhasil Diupdate');
		redirect('PageAdmin/profil');
	}
}