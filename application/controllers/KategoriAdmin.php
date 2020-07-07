<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriAdmin extends CI_Controller {
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
		$this->load->library('datatables');
			
		// load url helper
		$this->load->helper('url');

		$this->load->model('MAdmin');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['kategori'] = $this->MAdmin->Get('kategori');
		// $data['kategori'] = $this->MAdmin->json('kategori');
		$this->load->view("admin/kategori/index.php", $data);
	}

	public function tambahkat(){
		$this->load->view("admin/kategori/in_kat.php");
	}

	public function in_kategori(){
      	$kategori = $this->input->post('kategori',TRUE);

		move_uploaded_file($_FILES["gambar"]["tmp_name"], "assets/frontend/images/".time().$_FILES["gambar"]["name"]);
		$gambar = time().$_FILES["gambar"]["name"];

        $data = array(
              'id'=> '',
              'img_kat'=> $gambar,
              'kategori' => $kategori
        );

        $this->MAdmin->Insert('kategori',$data);

		$this->session->set_flashdata('msg_berhasil','Data Berhasil Ditambah');
        redirect(site_url('KategoriAdmin/tambahkat'));
	}

	public function editkat($id){
		$where = array('id'=> $id);
		$data['kategori'] = $this->MAdmin->GetWhere('kategori',$where);
		$this->load->view('admin/kategori/ed_kat.php', $data);
	}

	public function up_gambar(){
      	$id = $this->input->post('id',TRUE);

		move_uploaded_file($_FILES["gambar"]["tmp_name"], "assets/frontend/images/".time().$_FILES["gambar"]["name"]);
		$gambar = time().$_FILES["gambar"]["name"];

		$where = array('id'=> $id);
		$row = $this->db->get_where('kategori',$where)->row();
		if($row->img_kat != null){
			unlink(FCPATH."assets/frontend/images/".$row->img_kat);
		}
		$data = array('img_kat'=> $gambar);
		$this->MAdmin->Update('kategori', $data, $where);


		$this->session->set_flashdata('msg_berhasil','Gambar Berhasil Diedit');
        redirect(site_url('KategoriAdmin/editkat/'.$id));
	}

	public function up_kategori(){
      	$id = $this->input->post('id',TRUE);
      	$kategori = $this->input->post('kategori',TRUE);

        $data = array(
              'kategori' => $kategori
        );

		$where = array('id'=> $id);
        $this->MAdmin->Update('kategori',$data,$where);

		$this->session->set_flashdata('msg_berhasil','Data Berhasil Diedit');
        redirect(site_url('KategoriAdmin/editkat/'.$id));
	}

	public function hapuskat($id){
		$where = array('id'=> $id);
		$row = $this->db->get_where('kategori',$where)->row();
		if($row->img_kat != null){
			unlink(FCPATH."assets/frontend/images/".$row->img_kat);
		}
		$this->MAdmin->Delete('kategori',$where);
		$this->session->set_flashdata('msg_berhasil','Data Berhasil Dihapus');
        redirect(site_url('KategoriAdmin'));
	}
	
	function get_produk_json() { //data data produk by JSON object
    	header('Content-Type: application/json');
    	echo $this->MAdmin->get_all_produk();
  	}
}