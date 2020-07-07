<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MLogin');
    $this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('login/register');
	}

  private function hash_password($password){
    return password_hash($password,PASSWORD_DEFAULT);
  }

  public function proses_register(){

    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');

    if($this->form_validation->run() == TRUE){
      $nama = $this->input->post('nama',TRUE);
      $username = $this->input->post('username',TRUE);
			$email    = $this->input->post('email',TRUE);
      $password = $this->input->post('password',TRUE);
  
      if($this->MLogin->cek_username('bag_gudang',$username) || $this->MLogin->cek_username('user',$username)){
				$this->session->set_flashdata('msg','Username Telah Digunakan');
				redirect(site_url('Register'));

      }else{
        $data = array(
              'id'=> '',
              'username' => $username,
              'email'    => $email,
							'nama' 	 => $nama,
              'password' => $this->hash_password($password)
        );

        $this->MLogin->insert('user',$data);

				$this->session->set_flashdata('msg_terdaftar','Anda Berhasil Register');
        redirect(site_url('Register'));
      }
    }else {
        $this->session->set_flashdata('msg','Password tidak cocok');
        redirect(site_url('Register'));
    }
  }
}

?>
