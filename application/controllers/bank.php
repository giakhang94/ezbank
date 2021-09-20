<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CI_Controller {

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
			redirect('http://localhost/mvc/ezbank/index.php/admin/loginform');
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
			redirect('http://localhost/mvc/ezbank/index.php/admin/loginform');
		}

	}
	public function insertData($id = 0)
	{

		$this->form_validation->set_rules('bank','Tên ngân hàng','required|max_length[50]');
		$this->form_validation->set_rules('fix_interest', 'Lãi cố định','required');
		$this->form_validation->set_rules('12m_interest','lãi ưu đãi','required');
		$this->form_validation->set_rules('time_buy','Thời gian vay mua nhà','required');
		$this->form_validation->set_rules('time_build','Thời gian vay sửa nhà','required');
		$this->form_validation->set_rules('time_business','Thời gian vay kinh doanh','required');
		$this->form_validation->set_rules('time_consumer','Thời gian vay tiêu dùng','required');
		
		if ($this->form_validation->run() == FALSE)
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
        	return $this->load->view('addBank_view',$res);
        } 
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
	
	public function xoaBank($id)
	{
		$this->load->model('bank_model');
		$res = $this->bank_model->deleteBank($id);
		if ($res){
			header("location: http://localhost/mvc/ezbank/index.php/bank/listBank");
		}
		else {echo "xoá bank error";}
	}	
	public function caculate()
	{
		$mucdich = $this->input->post('mucdich');
		$sotien = $this->input->post('sotien');
		$time = $this->input->post('time');
		$loai_ls = $this->input->post('loai_laisuat');
		$loai_ls = floatval($loai_ls);
		$time =floatval($time);
		$sotien=floatval($sotien);
		$mucdich =floatval($mucdich);
		//tính loại sản phẩm vay
		if ($mucdich == 1) {
			$spvay = 'Vay Mua Nhà';
		}else if ($mucdich == 2) {
			$spvay = 'Vay Sửa Nhà';
		}else if ($mucdich == 3) {
			$spvay = 'Vay Kinh doanh';
		}else {
			$spvay = 'Vay tiêu dùng';
		}
		$this->load->model('bank_model');
		$data = $this->bank_model->getBank();
		$data2['mucdich'] = $mucdich;
		$data2['sotien']=$sotien;
		$data2['time']=$time;
		$data2['loai_ls'] = $loai_ls;
		$data2['spvay']=$spvay;

		$data = array ('data_homepage'=>$data, 'datapost'=>$data2);


				// echo "<pre>";
				// var_dump($data);
				// echo "</pre>";exit;

		$this->load->view('homePage_result_view', $data, FALSE);
	}
	public function excel($id, $sotien, $tgian, $mucdich, $spvay, $laisuat)
	{
		$this->load->model('bank_model');
		$res = $this->bank_model->getBankById($id);
		$data['sotien']=$sotien;
		$data['tgian']=$tgian;
		$data['spvay']=$spvay;
		$data['mucdich']=$mucdich;
		$data['laisuat']=$laisuat;
		$res = array ('data_getbyid'=> $res, 'data_excel'=>$data);
		$this->load->view('excel_view', $res, FALSE);
	}
}


/* End of file  */
/* Location: ./application/controllers/ */