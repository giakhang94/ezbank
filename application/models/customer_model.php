<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertCustomerDemand($name, $email, $phone, $demand, $income,$HK, $CIC, $honNhan)
	{
		$object = array (
			'name' => $name,
			'email' => $email,
			'sdt' => $phone,
			'demand' => $demand,
			'incom' => $income,
			'HK' => $HK,
			'CIC'=> $CIC,
			'status'=>$honNhan
		);	
		$this->db->insert('customer', $object);
		return $this->db->insert_id();
	}
	public function insertChangeBank($oldbank, $duno, $CMND, $TSTC, $giatriTS, $newbank, $name, $sdt,$income, $HK, $CIC, $honNhan)
	{
		$object = array (
			'hoTen' => $name,
			'sdt' => $sdt,
			'CL' => $duno,
			'incom' => $income,
			'hoKhau' => $HK,
			'CIC'=> $CIC,
			'currentBank'=>$oldbank,
			'CMND'=>$CMND,
			'targetBank'=>$newbank,
			'phapLy'=>$honNhan,
			'TSTC'=>$TSTC,
			'giatriTTSTC'=>$giatriTS,
		);	
		$this->db->insert('daohan', $object);
		return $this->db->insert_id();
	}

}

/* End of file customer_model.php */
/* Location: ./application/models/customer_model.php */