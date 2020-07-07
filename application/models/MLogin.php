<?php
class MLogin extends CI_Model{

    public function insert($tabel,$data){
        $this->db->insert($tabel,$data);
    }

    public function cek_username($tabel,$username){
        return $this->db->select('username')
                ->from($tabel)
                ->where('username',$username)
                ->get()->result();
    }

    public function cek_password($tabel,$password){
        return $this->db->select('password')
                ->from($tabel)
                ->where('password',$password)
                ->get()->result();
    }

    public function cek_user($tabel,$username){
        return  $this->db->select('*')
                ->from($tabel)
                ->where('username',$username)
                ->get();
    }
 
}