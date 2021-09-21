<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{	
		$this->load->view('formInfo_view');
	}
	public function insertFormInfo()
	{
		$name = $this->input->post('hoTen');
		$email = $this->input->post('email');
		$phone = $this->input->post('sdt');
		$demand = $this->input->post('nhuCau');
		$income = $this->input->post('thuNhap');
		$HK = $this->input->post('hoKhau');
		$CIC = $this->input->post('CIC');
		$honNhan = $this->input->post('honNhan'); 
		$this->load->model('Customer_model');
		$res = $this->Customer_model->insertCustomerDemand($name, $email, $phone, $demand, $income,$HK, $CIC, $honNhan);
		if($res){
			$location = "location: ".base_url()."index.php/customer/form_success";
			header($location);
		}
		else {
			echo "thao tác thêm thông tin nhu cầu lỗi";
		}
	}
	public function changebank()
	{
		$this->load->view('changeBank_view');
	}
	public function insertChangeBank()
	{
		$oldbank = $this->input->post('bankDangVay');
		$duno = $this->input->post('duNo');
		$CMND = $this->input->post('CMND');
		$sdt = $this->input->post('sdt');
		$TSTC = $this->input->post('TSTC');
		$giatriTS = $this->input->post('GiaTriTS');
		$newbank = $this->input->post('targetBank');
		$name = $this->input->post('hoTen');
		$income = $this->input->post('thuNhap');
		$HK = $this->input->post('hoKhau');
		$CIC = $this->input->post('CIC');
		$honNhan = $this->input->post('phapLy'); 
		$this->load->model('Customer_model');
		$res = $this->Customer_model->insertChangeBank($oldbank, $duno, $CMND, $TSTC, $giatriTS, $newbank, $name, $sdt,$income, $HK, $CIC, $honNhan);
		if($res){
			$location = "location: ".base_url()."index.php/customer/form_success";
			header($location);
		}
		else {
			echo "thao tác thêm thông tin nhu cầu lỗi";
		}
	}
	public function form_success()
	{
		$this->load->view('form_succes_view');
	}
}

/* End of file customer.php */
/* Location: ./application/controllers/customer.php */