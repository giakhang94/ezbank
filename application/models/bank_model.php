<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertBank($bank, $fix, $year, $t_buy, $t_build, $t_cums, $t_bs,$logo)
	{
		$object = array (
			'bank'=>$bank,
			'fix_interest'=>$fix,
			'12m_interest'=>$year,
			'time_buy'=>$t_buy,
			'time_build'=>$t_build,
			'time_consumer'=>$t_cums,
			'time_business'=>$t_bs,
			'logo'=>$logo
		);
		$this->db->insert('bank', $object);
		$res = $this->db->insert_id();
		return $res;
	}
	public function updateLogo($id,$old_path,$new_path,$newLogoName,$move_target)
	{
		$object = array (
			'logo'=>$newLogoName
		);
		rename($old_path,$new_path);
		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('bank', $object);
		if($res){
			copy($new_path,$move_target);
			unlink($new_path);
		}
		return $res;

	}
	public function getBankById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$res= $this->db->get('bank');
		$res = $res->result_array();
		return $res;
	}
	public function updateBank($id,$bank, $fix, $year, $t_buy, $t_build, $t_cums, $t_bs,$logo)
	{
		$object = array (
			'bank'=>$bank,
			'fix_interest'=>$fix,
			'12m_interest'=>$year,
			'time_buy'=>$t_buy,
			'time_build'=>$t_build,
			'time_consumer'=>$t_cums,
			'time_business'=>$t_bs,
			'logo'=>$logo
		);
		$this->db->select('*');
		$this->db->where('id',$id);
		$res = $this->db->update('bank', $object);
		return $res;
	}

}

/* End of file bank_model.php */
/* Location: ./application/models/bank_model.php */