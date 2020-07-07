<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('masuk') == 'admin'){
      redirect('PageAdmin');
    }elseif ($this->session->userdata('masuk') != 'user') {
      $url=base_url();
      redirect('login');
    }

    // load Session Library
    $this->load->library('session');
      
    // load url helper
    $this->load->helper('url');

    $this->load->model('MAdmin');
    $this->load->library('form_validation');
  }
 
  function index(){
    $data['kategori'] = $this->MAdmin->GetOrder('kategori','kategori','asc');
    $this->load->view('front/index',$data);
  }

  function barang($id){
    $where = array('id'=> $id);
    $data['kat'] = $this->MAdmin->GetWhere('kategori',$where);
    $data['barang'] = $this->MAdmin->GetWhereKategori($id);
    $this->load->view('front/barang',$data);
  }

  function detail($id){
    $where = array('id' => $id);
    $data['barang'] = $this->MAdmin->GetKategoriWhere($id);
    $this->load->view('front/detail_digital', $data);
  }

  function profil(){
    $id = $this->session->userdata('id');
    $where = array('id'=> $id);
    $data['profil'] = $this->MAdmin->GetWhere('user',$where);
    $this->load->view('front/profil', $data);
  }

  function editProfil($id){
    $where = array('id'=> $id);
    $data['profil'] = $this->MAdmin->GetWhere('user',$where);
    $this->load->view('front/editProfil', $data);
  }

  public function up_profil(){
    $id = $_POST['id'];
    $nm = $_POST['nama'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    
    $data = array(
      'nama' => $nm,
      'username' => $user,
      'email' => $email,
    );

    $where = array('id'=> $id);
    $this->session->set_userdata($data);
    $data['profil'] = $this->MAdmin->Update('user', $data, $where);
    redirect('Page/profil');
  }

  function editpw($id){
    $where = array('id'=> $id);
    $data['profil'] = $this->MAdmin->GetWhere('user',$where);
    $this->load->view('front/editPW', $data);
  }
  
  private function hash_password($password){
    return password_hash($password,PASSWORD_DEFAULT);
  }

  public function up_pw(){
    $id = $_POST['id'];
    $password = $_POST['password'];
    
    $data = array(
      'password' => $this->hash_password($password)
    );

    $where = array('id'=> $id);
    $this->session->set_userdata($data);
    $data['profil'] = $this->MAdmin->Update('user', $data, $where);
    redirect('Page/profil');
  }
}