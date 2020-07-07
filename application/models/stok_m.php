<?php

Class stok_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('tb_stok');
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$param = array(
			'digital' => $data['digital'], //'nama(database)' => $data['nama(nama didalam field)'],
			'slr' => $data['slr'],
			'mirrorles' => $data['mirrorles'],
			'drone' => $data['drone'],
			'aksesoris' => $data['aksesoris'],
			'lensa' => $data['lensa'],
		);
		$this->db->insert('tb_stok', $param);
	}

	public function edit($data)
	{
		$param = array(
			'digital' => $data['digital'], //'nama(database)' => $data['nama(nama didalam field)'],
			'slr' => $data['slr'],
			'mirrorles' => $data['mirrorles'],
			'drone' => $data['drone'],
			'aksesoris' => $data['aksesoris'],
			'lensa' => $data['lensa'],
		);
		$this->db->set($param);
		$this->db->where('id_stok', $data['id']);
		$this->db->update('tb_stok');
	}

	public function delete($id)
	{
		$this->db->where('id_stok', $id);
		$this->db->delete('tb_stok');
	}
}