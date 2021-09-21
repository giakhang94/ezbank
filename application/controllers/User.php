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
			$this->load->model('User_model');
			$data  = $this->User_model->getUser();
			$data = array ('data_user'=>$data);
			$this->load->view('listUser_view', $data,FALSE);	
		}
		else 
		{
			$redirect = base_url().'index.php/admin/loginform';
			redirect($redirect);
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
				//tao set_value
				$data_value['name'] = "";
				$data_value['user_name']="";
				$data_value['pass']="";
				$data_value['email']="";
				$data_value['phone']="";
				//xong set_value
			}
			else {
				$this->load->model('User_model');
				$res=$this->User_model->getUserById($id);
				//tao set_value
				$data_value['name'] = $res[0]['name'];
				$data_value['user_name']=$res[0]['user_name'];
				$data_value['pass']=$res[0]['pass'];
				$data_value['email']=$res[0]['email'];
				$data_value['phone']=$res[0]['phone'];
				//xong set_value
			}
			$res=array ('data_value'=>$res, 'data_set_value'=>$data_value);

			$this->load->view('addUser_view', $res);
		}

		else
		{
			$redirect = base_url().'index.php/admin/loginform';
			redirect($redirect);
		}
		
	}
	public function insertUser($id = 0)
	{
		if(!$this->input->post()){
			header(base_url()."index.php/user/addUser");
		}
		$this->load->library('session');
		if($this->session->userdata('user')){
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
					//tao set_value
					$data_value['name'] = "";
					$data_value['user_name']="";
					$data_value['pass']="";
					$data_value['email']="";
					$data_value['phone']="";
					//xong set_value
				}
				else {
					$this->load->model('User_model');
					$res=$this->bank_model->getUserById($id);
					//tao set_value
					$data_value['name'] = $res[0]['name'];
					$data_value['user_name']=$res[0]['user_name'];
					$data_value['pass']=$res[0]['pass'];
					$data_value['email']=$res[0]['email'];
					$data_value['phone']=$res[0]['phone'];
					//xong set_value
				}
				$res=array ('data_value'=>$res,'data_set_value'=>$data_value);
	        	return $this->load->view('addUser_view',$res);
	        } 
			$name = $this->input->post('name');
			$user_name = $this->input->post('user_name');
			$pass = $this->input->post('pass');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			//re nhanh vo insert hay update
			$location ="location: ".base_url().'index.php/user/listUser';
			if ($id == 0) {
				$this->load->model('User_model');
				$res = $this->User_model->insertUser($name,$user_name, $pass, $email, $phone);
				if ($res)
				{
					header($location);
				}
				else {echo "add usser bi loi";}
			}else {

				$this->load->model('User_model');
				$old_data = $this->User_model->getUserById($id);
				$old_pass = $old_data[0]['pass'];
				if ($pass != $old_pass){
					$pass = Sha1($pass);
				}
				
				if ($this->User_model->updateUser($id,$name,$user_name, $pass, $email, $phone))
				{
					header($location);
				}
				else {echo "update usser bi loi";}
			}
			}
			else {
				$redirect = base_url().'index.php/admin/loginform';
				redirect($redirect);
			}
			
	}
	
	public function listUser()
	{
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->model('User_model');
			$data  = $this->User_model->getUser();
			$data = array ('data_user'=>$data);
			$this->load->view('listUser_view', $data,FALSE);	
		}
		else 
		{
			$redirect = base_url().'index.php/admin/loginform';
			redirect($redirect);
		}

	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */