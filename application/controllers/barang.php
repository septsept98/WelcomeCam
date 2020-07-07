<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('barang_m', 'jb');
    	$this->load->model('MAdmin');
	}
	
	public function index()
	{
	    $data['kategori'] = $this->MAdmin->Get('kategori');
	    $this->load->view('front/index',$data);
	}

	public function add()
	{
		$data = array(
				'title' => 'Tambah barang'
				
			);
		$this->load->view('front/tambah_barang', $data);
	}

	public function edit($id = null)
	{
		$query = $this->jb->get($id);
		$data = array(
				'title' => 'Edit barang',
				'barang' => $query->row()
				
			);
		$this->load->view('front/edit_barang', $data);
	}

	// Proses disini bisa memproses untuk fungsi tambah dan edit
	// makanya di function proses terdapat percabangan if else 
	public function proses()
	{
		if (isset($_POST['add'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->jb->add($inputan);
		} elseif (isset($_POST['edit'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->jb->edit($inputan);
		}
		redirect('barang');
	}

	public function delete($id)
	{
		$this->jb->delete($id);
		redirect('barang/');
	}
}
