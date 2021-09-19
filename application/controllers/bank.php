<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('homePage_view');	
	}
	public function addBank($id = 0)
	{
		$this->load->library('session');
		if($this->session->userdata('user')) {
			if($id == 0)
			{
				$res=array ('id'=>0,'bank'=>"",'fix_interest'=>"",'12m_interest'=>"",'time_buy'=>"",'time_build'=>"",'time_consumer'=>"",'logo'=>"",'time_business'=>"");
				$res = array ('0'=>$res);
			}
			else {
				$this->load->model('bank_model');
				$res=$this->bank_model->getBankById($id);
			}
			$res=array ('data_value2'=>$res);

			$this->load->view('addBank_view', $res);
		}
		else
		{
			redirect('http://localhost/mvc/ezbank/index.php/bank/loginform');
		}
	}
	public function insertData($id = 0)
	{
		if($id == 0)
		{
			$bank = $this->input->post('bank');
			$fix = $this->input->post('fix_interest');
			$year = $this->input->post('12m_interest');
			$time_build = $this->input->post('time_build');
			$time_buy = $this->input->post('time_buy');
			$time_bs = $this->input->post('time_business');
			$time_consumer = $this->input->post('time_consumer');
			//upload
			$config['upload_path'] = './uploads_temp/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$config['file_name'] = strval(time());
			$logo = $config['file_name'];
			$up_folder = './uploads/';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo')){
				$error = array('error' => $this->upload->display_errors());
						echo "<pre>";
						print_r($error);
						echo "</pre>"; exit;
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				echo "success";
		
			}
			echo "<pre>";
			print_r($data);
			echo "</pre>"; 
			$this->load->model('bank_model');
			$id_insert = $this->bank_model->insertBank($bank, $fix, $year, $time_buy, $time_build,$time_consumer, $time_bs, $logo);
			if($id_insert)
			{
				$ext = $data['upload_data']['file_ext'];
				$newLogoName = strval($id_insert)."_".$logo.$ext;
				$old_path = $config['upload_path'].$logo.$ext;
				$new_path = $config['upload_path'].$newLogoName;
				$move_target = $up_folder.$newLogoName;
				$this->load->model('bank_model');
				if($this->bank_model->updateLogo($id_insert,$old_path,$new_path,$newLogoName, $move_target)) 
				{
					echo "upload và insert, đổi tên file thành công";
				}else 
				{
					echo "lỗi upload, insert đổi tên file";
				}
			}
		}else {
			$bank = $this->input->post('bank');
			$fix = $this->input->post('fix_interest');
			$year = $this->input->post('12m_interest');
			$time_build = $this->input->post('time_build');
			$time_buy = $this->input->post('time_buy');
			$time_bs = $this->input->post('time_business');
			$time_consumer = $this->input->post('time_consumer');
			//upload
			$config['upload_path'] = './uploads_temp/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$config['file_name'] = strval(time());
			$logo = $config['file_name'];
			$up_folder = './uploads/';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo')){
				$error = array('error' => $this->upload->display_errors());
				$logo = $this->input->post('logo2');
				$changeLogo = FALSE;
				$this->load->model('bank_model');
				$id_insert = $this->bank_model->updateBank($id, $bank, $fix, $year, $time_buy, $time_build,$time_consumer, $time_bs, $logo);
				if ($id_insert){
					header("location: http://localhost/mvc/ezbank/index.php/bank/addbank");
				}
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				echo "success";
				$changeLogo = TRUE;
		
			}

			$this->load->model('bank_model');
			$id_insert = $this->bank_model->updateBank($id, $bank, $fix, $year, $time_buy, $time_build,$time_consumer, $time_bs, $logo);
			if($id_insert && $changeLogo == TRUE)
			{
				$ext = $data['upload_data']['file_ext'];
				$newLogoName = strval($id_insert)."_".$logo.$ext;
				$old_path = $config['upload_path'].$logo.$ext;
				$new_path = $config['upload_path'].$newLogoName;
				$move_target = $up_folder.$newLogoName;
				$this->load->model('bank_model');
				if($this->bank_model->updateLogo($id_insert,$old_path,$new_path,$newLogoName, $move_target)) 
				{
					header("location: http://localhost/mvc/ezbank/index.php/bank/addbank");
				}
				else 
				{
					echo "lỗi upload, insert đổi tên file";
				}
			}
		}
	}
	public function listBank()
	{
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->model('bank_model');
			$res = $this->bank_model->getBank();
			$res = array ('data_bank'=>$res);
			$this->load->view('bankList_view', $res, FALSE);
		}else {
			redirect('http://localhost/mvc/ezbank/index.php/bank/loginform');
		}

	}
	public function xoaBank($id)
	{
		$this->load->model('bank_model');
		$res = $this->bank_model->deleteBank($id);
		if ($res){
			header("location: http://localhost/mvc/ezbank/index.php/bank/listBank");
		}
		else {echo "xoá bank error";}
	}
	//tạo function nếu còn session thì cho đăng nhập tiếp xài tiếp
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
			redirect('http://localhost/mvc/ezbank/index.php/bank/loginform');
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
				$this->load->model('bank_model');
				$res=$this->bank_model->getUserById($id);
			}
			$res=array ('data_value'=>$res);

			$this->load->view('addUser_view', $res);
		}
		else
		{
			redirect('http://localhost/mvc/ezbank/index.php/bank/loginform');
		}
		
	}
	public function insertUser($id = 0)
	{
		$name = $this->input->post('name');
		$user_name = $this->input->post('user_name');
		$pass = $this->input->post('pass');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		//re nhanh vo insert hay update
		if ($id == 0) {
			$this->load->model('bank_model');
			$res = $this->bank_model->insertBank($name,$user_name, $pass, $email, $phone);
			if ($res)
			{
				header("location: http://localhost/mvc/ezbank/index.php/bank/listUser");
			}
			else {echo "add usser bi loi";}
		}else {

			$this->load->model('bank_model');
			$old_data = $this->bank_model->getUserById($id);
			$old_pass = $old_data[0]['pass'];
			if ($pass != $old_pass){
				$pass = Sha1($pass);
			}
			$res = $this->bank_model->updateBank($id,$name,$user_name, $pass, $email, $phone);
			if ($res)
			{
				header("location: http://localhost/mvc/ezbank/index.php/bank/listUser");
			}
			else {echo "update usser bi loi";}
		}
	}
	public function listUser()
	{
		$this->load->library('session');
		if($this->session->userdata('user')){
			$this->load->model('bank_model');
			$data  = $this->bank_model->getUser();
			$data = array ('data_user'=>$data);
			$this->load->view('listUser_view', $data,FALSE);	
		}
		else 
		{
			redirect('http://localhost/mvc/ezbank/index.php/bank/loginform');
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
		$this->load->model('bank_model');
		$user_data = $this->bank_model->login_checker_model($user, $pass); //gọi model để kiểm tra đăng nhập và lấy thông tin user nếu đúng
		//khúc này copy trêng mạng -> đại loại là nếu đăng nhập đúng => trả về array -> $user_data sẽ có giá trị => thì tạo session cho user;
		if($user_data)
		{
			$this->session->set_userdata('user',$user_data);
			redirect('http://localhost/mvc/ezbank/index.php/bank/login');
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
		redirect('/');
	}
}


/* End of file  */
/* Location: ./application/controllers/ */