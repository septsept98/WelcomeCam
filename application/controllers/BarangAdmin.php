<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangAdmin extends CI_Controller {
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
        $data['barang'] = $this->MAdmin->GetKategori();
        $this->load->view("admin/barang/index.php",$data);
	}

	public function tambahbarang()
	{
        // load view admin/overview.php
        $this->load->view("admin/barang/in_barang.php");
	}

	public function tambahbarangbaru()
	{
        $data['kategori'] = $this->MAdmin->Get('kategori');
        $this->load->view("admin/barang/in_barang.php",$data);
	}

	public function in_barangbaru(){
      	$nm_brg = $this->input->post('nm_brg',TRUE);
      	$kategori = $this->input->post('kategori',TRUE);
      	$jumlah_brg = $this->input->post('jumlah_brg',TRUE);
      	$harga_brg = $this->input->post('harga_brg',TRUE);
      	$ket_brg = $this->input->post('ket_brg',TRUE);

		move_uploaded_file($_FILES["gambar"]["tmp_name"], "images/barang/".time().$_FILES["gambar"]["name"]);
		$gambar = time().$_FILES["gambar"]["name"];


		$data = array(
			'id' => '',
			'nm_barang' => $nm_brg,
			'id_kategori' => $kategori,
			'jumlah_barang' => 0,
			'harga_barang' => $harga_brg,
			'ket_barang' => $ket_brg,
			'gambar' => $gambar
		);
        $this->MAdmin->Insert('tb_barang',$data);

		$pg = $this->db->insert_id();
		$c_date=date("Y-m-d H:i:s");
		$detail = array(
			'id' => '',
			'id_barang' => $pg,
			'tgl_masuk' => $c_date,
			'jumlah' => $jumlah_brg
		);
		$this->MAdmin->Insert('barang_masuk', $detail);

		$this->session->set_flashdata('msg_berhasil','Data Berhasil Ditambah');
        redirect(site_url('BarangAdmin/tambahbarangbaru'));
	}

	public function tambahstokbarang()
	{
		$data['barang'] = $this->MAdmin->Get('tb_barang');
        $this->load->view("admin/barang/in_stokbarang.php",$data);
	}

	public function in_stokbarang(){
      	$barang = $this->input->post('barang',TRUE);
      	$jumlah_brg = $this->input->post('jumlah_brg',TRUE);

		$c_date=date("Y-m-d H:i:s");
		$data = array(
			'id' => '',
			'id_barang' => $barang,
			'tgl_masuk' => $c_date,
			'jumlah' => $jumlah_brg
		);
        $this->MAdmin->Insert('barang_masuk',$data);

		$this->session->set_flashdata('msg_berhasil','Data Berhasil Ditambah');
        redirect(site_url('BarangAdmin/tambahstokbarang'));
	}

	public function editbarang($id)
	{
		$where = array('id'=> $id);
		$data['barang'] = $this->MAdmin->GetWhere('tb_barang', $where);
		$data['kategori'] = $this->MAdmin->Get('kategori');
        $this->load->view("admin/barang/ed_barang.php", $data);
	}

	public function detailbarang($id)
	{
		$data['barang_masuk'] = $this->MAdmin->GetBarangMasuk($id);
		$data['barang'] = $this->MAdmin->GetKategoriWhere($id);
        $this->load->view("admin/barang/detail_barang.php", $data);
	}

	public function up_gambar(){
      	$id = $this->input->post('id',TRUE);

		move_uploaded_file($_FILES["gambar"]["tmp_name"], "images/barang/".time().$_FILES["gambar"]["name"]);
		$gambar = time().$_FILES["gambar"]["name"];

		$where = array('id'=> $id);
		$row = $this->db->get_where('tb_barang',$where)->row();
		if($row->gambar != null){
			unlink(FCPATH."images/barang/".$row->gambar);
		}
		$data = array('gambar'=> $gambar);
		$this->MAdmin->Update('tb_barang', $data, $where);


		$this->session->set_flashdata('msg_berhasil','Gambar Berhasil Diedit');
        redirect(site_url('BarangAdmin/editbarang/'.$id));
	}

	public function up_barang(){
      	$id = $this->input->post('id',TRUE);
      	$nm_brg = $this->input->post('nm_barang',TRUE);
      	$id_kategori = $this->input->post('id_kategori',TRUE);
      	$jumlah = $this->input->post('jumlah',TRUE);
      	$harga_brg = $this->input->post('harga_brg',TRUE);
      	$ket_brg = $this->input->post('ket_brg',TRUE);

		$where = array('id'=> $id);
		$data = array('nm_barang'=> $nm_brg,
						'id_kategori'=> $id_kategori,
						'jumlah_barang'=> $jumlah,
						'harga_barang'=> $harga_brg,
						'ket_barang'=> $ket_brg
					);

		$this->MAdmin->Update('tb_barang', $data, $where);

		$this->session->set_flashdata('msg_berhasil','Data Berhasil Diedit');
        redirect(site_url('BarangAdmin/editbarang/'.$id));
	}

	public function hapusbarang($id)
	{
		$where = array('id'=> $id);
		$row = $this->db->get_where('tb_barang',$where)->row();
		if($row->gambar != null){
			unlink(FCPATH."images/barang/".$row->gambar);
		}
		$this->MAdmin->Delete('tb_barang',$where);

		$this->session->set_flashdata('msg_berhasil','Data Berhasil Dihapus');
        redirect(site_url('BarangAdmin'));
	}
}