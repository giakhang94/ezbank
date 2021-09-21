<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getUserById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$res= $this->db->get('user');
		$res = $res->result_array();
		return $res;
	}
	public function insertUser($name, $user, $pass, $email, $phone)
	{
		$object = array (
			'name'=>$name,
			'user_name'=>$user,
			'pass'=>sha1($pass),
			'email'=>$email,
			'phone'=>$phone
		);
		$this->db->insert('user', $object);
		return $this->db->insert_id();
	}
	public function updateUser($id,$name, $user, $pass, $email, $phone)
	{
		$object = array (
			'name'=>$name,
			'user_name'=>$user,
			'pass'=>$pass,
			'email'=>$email,
			'phone'=>$phone
		);
		$this->db->select('*');
		$this->db->where('id',$id);
		return  $this->db->update('user', $object);
		
	}
	public function getUser()
	{
		$this->db->select('*');
		$res = $this->db->get('user');
		$res = $res->result_array();
		return $res;
	}
	public function login_checker_model($user, $pass)
	{
		$query = $this->db->get_where('user', array('user_name' => $user, 'pass'=>sha1($pass)));
		$query = $query->result_array();
		return $query;
	}
	public function deleteUser($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */