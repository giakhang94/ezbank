<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			$this->load->view('loginAdmin');
		}
		else{
			// $this->load->view('loginform_fail_view');
			redirect('http://localhost/mvc/ezbank/index.php/admin/loginform');
		}
	}
	public function login()
	{
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			$this->load->view('loginAdmin');
		}
		else{
			// $this->load->view('loginform_fail_view');
			redirect('http://localhost/mvc/ezbank/index.php/admin/loginform');
		}
	}


	
	public function loginForm($value='')
	{
		$this->load->view('loginform_view');
	}
	public function loginChecker()
	{
		$this->load->library('session');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$this->load->model('user_model');
		$user_data = $this->user_model->login_checker_model($user, $pass); //gọi model để kiểm tra đăng nhập và lấy thông tin user nếu đúng
		//khúc này copy trêng mạng -> đại loại là nếu đăng nhập đúng => trả về array -> $user_data sẽ có giá trị => thì tạo session cho user;
		if($user_data)
		{
			$this->session->set_userdata('user',$user_data);
			redirect('http://localhost/mvc/ezbank/index.php/admin/login');
		}else 
		{
			$this->load->view('loginform_fail_view');
			// echo "<a class='alert alert-danger' href='http://localhost/mvc/ezbank/index.php/bank/login'>Sai thông tin đăng nhập </a>";
			$this->session->set_flashdata('error','Invalid login. User not found');
		}
	}

 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('http://localhost/mvc/ezbank/index.php/bank');
	}

	

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */