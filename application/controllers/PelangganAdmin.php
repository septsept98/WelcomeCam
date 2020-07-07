<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganAdmin extends CI_Controller {
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
		$this->load->model('MLogin');
		$this->load->library('form_validation');
	}

  	private function hash_password($password){
    	return password_hash($password,PASSWORD_DEFAULT);
  	}

	// Pelanggan
	public function index(){
		$data['pelanggan'] = $this->MAdmin->Get('user');
		$this->load->view('admin/pelanggan/pelanggan', $data);
	}

	public function editPelanggan($id){
		$where = array('id'=> $id);
		$data['pelanggan'] = $this->MAdmin->GetWhere('user',$where);
		$this->load->view('admin/pelanggan/ed_pelanggan', $data);

	}

	public function up_pelanggan(){
		$id = $_POST['id'];
		$nm = $_POST['nama'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		
		
		if($this->MLogin->cek_password('user',$password)){
			$data = array(
				'nama' => $nm,
				'email' => $email,
				'username' => $username,
			);
		}else{
			$data = array(
				'nama' => $nm,
				'email' => $email,
				'username' => $username,
				'password' => $this->hash_password($password),
			);			
		}
		
		$where = array('id'=> $id);
		$this->MAdmin->Update('user', $data, $where);

      	$this->session->set_flashdata('msg_berhasil','Data Pelanggan Berhasil Diupdate');
        redirect(site_url('PelangganAdmin/editPelanggan/'.$id));
	}

	public function hapusPelanggan($id){
		$where = array('id' => $id);
		$this->MAdmin->Delete('user', $where);
      	$this->session->set_flashdata('msg_berhasil','Data Pelanggan Berhasil Dihapus');
		redirect('PelangganAdmin');
	}
}