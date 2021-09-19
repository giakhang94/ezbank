<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->model('user_model');
			$data  = $this->user_model->getUser();
			$data = array ('data_user'=>$data);
			$this->load->view('listUser_view', $data,FALSE);	
		}
		else 
		{
			redirect('http://localhost/mvc/ezbank/index.php/admin/loginform');
		}	
	}
	public function addUser($id = 0)
	{
		$this->load->library('session');
		if ($this->session->userdata('user'))
		{
			if($id == 0)
			{
				$res=array ('id'=>0,'name'=>"",'user_name'=>"",'pass'=>"",'email'=>"",'phone'=>"");
				$res = array ('0'=>$res);
			}
			else {
				$this->load->model('user_model');
				$res=$this->user_model->getUserById($id);
			}
			$res=array ('data_value'=>$res);

			$this->load->view('addUser_view', $res);
		}
		else
		{
			redirect('http://localhost/mvc/ezbank/index.php/admin/loginform');
		}
		
	}
	public function insertUser($id = 0)
	{
		$this->form_validation->set_rules('name','Tên người dùng','required|max_length[50]');
		$this->form_validation->set_rules('user_name', 'ID người dùng khống được để trống','required');
		$this->form_validation->set_rules('pass','mật khẩu khống được để trống','required');
		$this->form_validation->set_rules('email','địa chỉ email khống được để trống','required');
		$this->form_validation->set_rules('phone','Số điện thoại k được để trống','required');
		
		if ($this->form_validation->run() == FALSE)
    	{
            if($id == 0)
			{
				$res=array ('id'=>0,'name'=>"",'user_name'=>"",'pass'=>"",'email'=>"",'phone'=>"");
				$res = array ('0'=>$res);
			}
			else {
				$this->load->model('user_model');
				$res=$this->bank_model->getUserById($id);
			}
			$res=array ('data_value'=>$res);
        	return $this->load->view('addUser_view',$res);
        } 
		$name = $this->input->post('name');
		$user_name = $this->input->post('user_name');
		$pass = $this->input->post('pass');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		//re nhanh vo insert hay update
		if ($id == 0) {
			$this->load->model('user_model');
			$res = $this->user_model->insertUser($name,$user_name, $pass, $email, $phone);
			if ($res)
			{
				header("location: http://localhost/mvc/ezbank/index.php/user/listUser");
			}
			else {echo "add usser bi loi";}
		}else {

			$this->load->model('user_model');
			$old_data = $this->user_model->getUserById($id);
			$old_pass = $old_data[0]['pass'];
			if ($pass != $old_pass){
				$pass = Sha1($pass);
			}
			$res = $this->user_model->updateUser($id,$name,$user_name, $pass, $email, $phone);
			if ($res)
			{
				header("location: http://localhost/mvc/ezbank/index.php/user/listUser");
			}
			else {echo "update usser bi loi";}
		}
	}
	
	public function listUser()
	{
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->model('user_model');
			$data  = $this->user_model->getUser();
			$data = array ('data_user'=>$data);
			$this->load->view('listUser_view', $data,FALSE);	
		}
		else 
		{
			redirect('http://localhost/mvc/ezbank/index.php/admin/loginform');
		}

	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */