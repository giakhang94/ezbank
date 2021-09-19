<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('homePage_view');	
	}
	public function addBank($id = 0)
	{
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
				echo "<pre>";
				print_r($res);
				echo "</pre>";

		$this->load->view('addBank_view', $res);
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
				}else 
				{
					echo "lỗi upload, insert đổi tên file";
				}
			}
		}

		

	}
}


/* End of file  */
/* Location: ./application/controllers/ */