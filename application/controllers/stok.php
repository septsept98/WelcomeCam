<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stok extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('stok_m', 'stk');
	}
	
	public function index()
	{
		$query = $this->stk->get();
		$data = array(
				'title' => 'Tampil Data stok',
				'isi' => $query->result(),
			);
		$this->load->view('front/stok', $data);

	}

	public function add()
	{
		$data = array(
				'title' => 'Tambah Data stok'
				
			);
		$this->load->view('front/tambah_stok', $data);
	}

	public function edit($id = null)
	{
		$query = $this->stk->get($id);
		$data = array(
				'title' => 'Edit Data stok',
				'stok' => $query->row()
				
			);
		$this->load->view('front/edit_stok', $data);
	}

	public function proses()
	{
		if (isset($_POST['add'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->stk->add($inputan);
		} elseif (isset($_POST['edit'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->stk->edit($inputan);
		}
		redirect('stok');
	}

	public function delete($id)
	{
		$this->stk->delete($id);
		redirect('stok');
	}
}
