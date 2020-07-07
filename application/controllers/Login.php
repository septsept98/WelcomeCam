

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('MLogin');
		$this->load->library('form_validation');
    }

    public function index()
	{
		    $data['token_generate'] = $this->token_generate();
			$this->session->set_userdata($data);
			$this->load->view('login/login',$data);
	}

	public function token_generate(){
		return $tokens = md5(uniqid(rand(), true));
	}

	public function proses_login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == TRUE){
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);

			if($this->session->userdata('token_generate') === $this->input->post('token'))
			{
				$cek =  $this->MLogin->cek_user('bag_gudang',$username);
				$cek_user =  $this->MLogin->cek_user('user',$username);
				if($cek->num_rows() == 1 || $cek_user->num_rows() == 1){

					$isi = $cek->row();
					$isi_user = $cek_user->row();
					if(password_verify($password,$isi->password) === TRUE){
						$data_session = array(
										'id' => $isi->id,
										'username' => $username,
										'email' => $isi->email,
										'nama' => $isi->nama,
										'masuk' => 'admin'
						);

						$this->session->set_userdata($data_session);
						redirect('PageAdmin');

					}elseif(password_verify($password,$isi_user->password) === TRUE){
						$data_session = array(
										'id' => $isi_user->id,
										'username' => $username,
										'email' => $isi_user->email,
										'nama' => $isi_user->nama,
										'masuk' => 'user'
						);

						$this->session->set_userdata($data_session);
						redirect('Page');
					}else {
						$this->session->set_flashdata('msg','Username Dan Password Salah');
						redirect('login');
					}
				}else {

					$this->session->set_flashdata('msg','Username Belum Terdaftar Silahkan Register Dahulu');
					redirect('login');
				}
			}else {
				redirect(site_url());
			}
		}
	}
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
}