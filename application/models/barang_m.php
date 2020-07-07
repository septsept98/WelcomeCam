<?php

Class barang_M extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('tb_barang');
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$param = array(
			'nama' => $data['nama'], //'nama(database)' => $data['nama(nama didalam field)'],
			'kode' => $data['kode'],
			'jenis' => $data['jenis'],
			'jumlah' => $data['jumlah'],
		);
		$this->db->insert('tb_barang', $param);
	}

	public function edit($data)
	{
		$param = array(
			'nama' => $data['nama'], //'nama(database)' => $data['nama(nama didalam field)'],
			'kode' => $data['kode'],
			'jenis' => $data['jenis'],
			'jumlah' => $data['jumlah'],
		);
		$this->db->set($param);
		$this->db->where('id_barang', $data['id']);
		$this->db->update('tb_barang');
	}

	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('tb_barang');
	}
}