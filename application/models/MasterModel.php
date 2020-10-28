<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterModel extends CI_Model {
    
    public function cek_login_admin($user,$password)
	{
		return $this->db->get_where('username',['username' => $user , 'password'=>$password])->result_array();
		//return $this->db->result_array();
    }
    
	public function get_admin($id = null)
	{
		if ($id == null) {
			$this->db->select('username, firstname, lastname, adminthumbnails');
			$this->db->from('admin');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('username, firstname, lastname, adminthumbnails');
			$this->db->from('admin');
			$this->db->where('username',$id);
			return $this->db->get()->result_array();
		}
	}

	public function post_pengguna($data)
	{
		$this->db->insert('pengguna',$data);
		return $this->db->affected_rows();
	}

	public function delete_pengguna($id = null)
	{
		$this->db->delete('pengguna',['usernm' => $id]);
		return $this->db->affected_rows();
	}

	public function put_pengguna($id,$data)
	{
		$this->db->update('pengguna',$data,['usernm'=>$id]);
		return $this->db->affected_rows();
	}
	
}